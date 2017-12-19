<?php
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
} catch (PDOException $e) {
	die("数据库连接失败" . $e->getMessage());
}
//3.通过action的值进行对应操作
		$id=$_GET['id'];
		$id=(int)$id;
        $sql = "DELETE FROM teacher WHERE tid=$id";
        $pdo->exec($sql);
        header("Location:teacher.php");//跳转到首页