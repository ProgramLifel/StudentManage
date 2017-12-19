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
    $sql = "SELECT * FROM sc WHERE cid =".$_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if($stmt->rowCount()>0){
        $sc = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
    }else{
        die("没有要修改的数据！");
    }
    ?>
    <form id="sc" name="editgrade" method="post" action="editgradeaction.php">
       
        <table>
			<tr>
                <td>课程号</td>
                <td><input id="cid" name="cid" type="text" value="<?php echo $sc['cid']?>"/></td>
            </tr>
            <tr>
                <td>学  号</td>
                <td><input id="name" name="sid" type="text" value="<?php echo $sc['sid']?>"/></td>
            </tr>
            <tr>
                <td>成  绩</td>
                <td><input id="frction" name="sgrade" type="text" value="<?php echo $sc['sgrade']?>"/></td>
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