<?php
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
} catch (PDOException $e) {
	die("数据库连接失败" . $e->getMessage());
}
//3.通过action的值进行对应操作
		$id = $_POST['cid'];
        $name = $_POST['cname'];
        $fraction = $_POST['cfraction'];
        $tid = $_POST['tid'];
		$id=(int)$id;
		$fraction=(int)$fraction;
		$tid=(int)$tid;
        $sql = "UPDATE classes SET cname='$name',cfraction=$fraction,tid=$tid WHERE cid=$id;";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='class.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }