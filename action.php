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
switch ($_GET['action']) {
    case 'add':{   //增加操作
		$ssid=$_POST['ssid'];
        $name = $_POST['sname'];
        $sex = $_POST['ssex'];
        $age = $_POST['sage'];
		$ssid=(int)$ssid;
        //写sql语句
        $sql = "INSERT INTO student VALUES ('{$ssid}' ,'{$name}','{$sex}','{$age}')";
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
        break;
    }
    case "del": {    //1.获取表单信息
        $id = $_POST['id'];
        $sql = "DELETE FROM stu WHERE id={$id}";
        $pdo->exec($sql);
        header("Location:index.php");//跳转到首页
        break;
    }
    case "edit" :{   //1.获取表单信息
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $classid = $_POST['classid'];
        $age = $_POST['age'];

        $sql = "UPDATE stu SET name='{$name}',sex='{$sex}',age='{$age}',classid='{$classid}' WHERE id='{$id}'";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='index.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }


        break;
    }

}