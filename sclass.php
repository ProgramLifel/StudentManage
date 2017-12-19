<?php
session_start();
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
} catch (PDOException $e) {
	die("数据库连接失败" . $e->getMessage());
}
//3.通过action的值进行对应操作
		$id = $_GET['id'];
		$sid=$_SESSION['sid'];
        $id=(int)$id;
		$sid=(int)$sid;
		echo "<script>alert($id);</script>";
        $sql = "INSERT INTO sc VALUES ($id,$sid,NULL);";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('选课成功');window.location='studentsc.php'</script>";
        }else{
            echo "<script>alert('选课失败');window.history.back()</script>";
        }