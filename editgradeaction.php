<?php
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
} catch (PDOException $e) {
	die("数据库连接失败" . $e->getMessage());
}
//3.通过action的值进行对应操作
		$id = $_POST['cid'];
		echo "<script>alert($id);</script>";
        $sid = $_POST['sid'];
        echo "<script>alert($sid);</script>";
		$grade = $_POST['sgrade'];
		$id=(int)$id;
		echo "<script>alert($id);</script>";
		$sid=(int)$sid;
		$grade=(int)$grade;
        $sql = "UPDATE sc SET sgrade=$grade WHERE cid=$id and sid=$sid;";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='sc.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }