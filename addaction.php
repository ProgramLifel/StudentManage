<?php
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
} catch (PDOException $e) {
	die("数据库连接失败" . $e->getMessage());
}
//2.防止中文乱码
$pdo->query("SET NAMES 'UTF8'");
//3.通过action的值进行对应操作
		$ssid=$_POST['ssid'];
        $name = $_POST['sname'];
        $sex = $_POST['ssex'];
        $age = $_POST['sage'];
		$password=$_POST['password'];
		$ssid=(int)$ssid;
		$age=(int)$age;
		$pdo->query("SET NAMES 'latin1'");
        //写sql语句
        $sql = "INSERT INTO student VALUES ($ssid,'$name','$sex',$age);";
        $rw = $pdo->exec($sql);
		$sql = "INSERT INTO user VALUES ($ssid,'$password');";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('增加成功');
                            window.location='admin.php'; //跳转到首页
                 </script>";
        } else {
            echo "<script> alert('增加失败');
                            window.history.back(); //返回上一页
                 </script>";
        }
?>