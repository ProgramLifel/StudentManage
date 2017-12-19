<?php
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
} catch (PDOException $e) {
	die("数据库连接失败" . $e->getMessage());
}
//3.通过action的值进行对应操作
		$id = $_POST['sid'];
        $name = $_POST['sname'];
        $sex = $_POST['ssex'];
        $age = $_POST['sage'];
		$id=(int)$id;
		$age=(int)$age;
        $sql = "UPDATE student SET sname='$name',ssex='$sex',sage=$age WHERE sid=$id;";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='student.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }