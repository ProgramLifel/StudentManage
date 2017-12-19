<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>学生信息管理</title>
    <script>
        function doDel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'deleteaction.php?id='+id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php
	include_once "menu2.php";
	session_start();
	 //1.连接数据库
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        //2.解决中文乱码问题
        $pdo->query("SET NAMES 'latin1'");
		//$sid=$_GET['user_name'];
		//$sid=(int)$sid;
		$sid2=$_SESSION['sid'];
		// echo "<script language=javascript>alert({$_SESSION['sid']});</script>";
		$sid2=(int)$sid2;
		//echo "<script language=javascript>alert($sid2);</script>";
		?>
<?php
		// echo "<script language=javascript>alert($sid);</script>";
        //3.执行sql语句，并实现解析和遍历
        $sql = "select sid,sname,ssex,sage from student where sid=$sid2;";
?>
    <h3>浏览学生信息</h3>
    <table width="600" border="1">
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>操作</th>
        </tr>
        <?php
        foreach($pdo->query($sql) as $row)
		{
            echo "<tr>";
            echo "<td>{$row['sid']}</td>";
            echo "<td>{$row['sname']}</td>";
            echo "<td>{$row['ssex']}</td>";
            echo "<td>{$row['sage']}</td>";
            echo "<td>
                    <a href='studentedit.php?id={$row['sid']}'>修改</a>
                  </td>";
            echo "</tr>";
		}
        ?>
    </table>
</center>
</body>
</html>