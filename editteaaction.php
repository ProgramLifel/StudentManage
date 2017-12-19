<?php
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
} catch (PDOException $e) {
	die("数据库连接失败" . $e->getMessage());
}
//3.通过action的值进行对应操作
		$id = $_POST['tid'];
        $name = $_POST['tname'];
        $title = $_POST['ttitle'];
        $salary = $_POST['tsalary'];
		$id=(int)$id;
		$salary=(int)$salary;
        $sql = "UPDATE teacher SET tname='$name',ttitle='$title',tsalary=$salary WHERE tid=$id;";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='teacher.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }