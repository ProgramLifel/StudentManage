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
    $sql = "SELECT * FROM student WHERE sid =".$_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if($stmt->rowCount()>0){
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
    }else{
        die("没有要修改的数据！");
    }
    ?>
    <form id="addstu" name="editstu" method="post" action="editaction.php">
        <input type="hidden" name="sid" id="id" value="<?php echo $stu['sid'];?>"/>
        <table>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="sname" type="text" value="<?php echo $stu['sname']?>"/></td>
            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="ssex" value="男" <?php echo ($stu['ssex']=="男")? "checked" : ""?>/>&nbsp;男
                    <input type="radio" name="ssex" value="女"  <?php echo ($stu['ssex']=="女")? "checked" : ""?>/>&nbsp;女
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="sage" id="age" value="<?php echo $stu['sage']?>"/></td>
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