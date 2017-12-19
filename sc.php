<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>学生信息管理</title>
</head>
<body>
<center>
    <?php
    include_once "menu.php";
    ?>
    <h3>浏览学生选课信息</h3>
    <table width="600" border="1">
        <tr>
            <th>课程号</th>
            <th>学  号</th>
			<th>成  绩</th>
			<th>操  作</th>
        </tr>
        <?php
        //1.连接数据库
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=STM;", "root", "");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        //2.解决中文乱码问题
        $pdo->query("SET NAMES 'latin1'");
        //3.执行sql语句，并实现解析和遍历
        $sql = "select cid,sid,sgrade from sc";
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['cid']}</td>";
            echo "<td>{$row['sid']}</td>";
            echo "<td>{$row['sgrade']}</td>";
			 echo "<td>
                    <a href='editgrade.php?id={$row['cid']}'>修改</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</center>
</body>
</html>