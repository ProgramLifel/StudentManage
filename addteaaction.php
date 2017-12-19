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
		$id=$_POST['tid'];
        $name = $_POST['tname'];
        $title = $_POST['ttitle'];
        $salary = $_POST['tsalary'];
		$id=(int)$id;
		$salary=(int)$salary;
		$pdo->query("SET NAMES 'latin1'");
        //写sql语句
        $sql = "INSERT INTO teacher VALUES ($id,'$name','$title',$salary);";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('增加成功');
                            window.location='teacher.php'; //跳转到首页
                 </script>";
        } else {
            echo "<script> alert('增加失败');
                            window.history.back(); //返回上一页
                 </script>";
        }
?>