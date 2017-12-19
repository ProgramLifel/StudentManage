<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
</head>
<body>
<center>
    <?php
    include_once"menu.php";
    //1.连接数据库
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=STM;","root","");
    }catch(PDOException $e){
        die("数据库连接失败".$e->getMessage());
    }
    //2.防止中文乱码
    $pdo->query("SET NAMES 'latin1'");
    //3.拼接sql语句，取出信息
    $sql = "SELECT * FROM teacher WHERE tid =".$_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if($stmt->rowCount()>0){
        $tea = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
    }else{
        die("没有要修改的数据！");
    }
    ?>
    <form id="addtea" name="edittea" method="post" action="editteaaction.php">
        <input type="hidden" name="tid" id="id" value="<?php echo $tea['tid'];?>"/>
        <table>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="tname" type="text" value="<?php echo $tea['tname']?>"/></td>
            </tr>
            <tr>
                <td>职称</td>
                <td><input id="title" name="ttitle" type="text" value="<?php echo $tea['ttitle']?>"/></td>
            </tr>
            <tr>
                <td>工资</td>
                <td><input type="text" name="tsalary" id="tsalary" value="<?php echo $tea['tsalary']?>"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="修改"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>