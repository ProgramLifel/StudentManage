<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>学生信息管理</title>
    <script>
        function doDel(id) {
			confirm(id);
            if (confirm("确定要删除么？")) {
                window.location = 'delclassaction.php?id='+id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php
    include_once "menu.php";
    ?>
    <h3>浏览课程信息</h3>
    <table width="600" border="1">
        <tr>
            <th>课程号</th>
            <th>课程名</th>
			<th>学分数</th>
            <th>授课老师工号</th>
			<th>操作</th>
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
        $sql = "select cid,cname,cfraction,tid from classes";
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['cid']}</td>";
            echo "<td>{$row['cname']}</td>";
            echo "<td>{$row['cfraction']}</td>";
            echo "<td>{$row['tid']}</td>";
            echo "<td>
		<a href='javascript:doDel({$row['cid']})'>删除</a>
                    <a href='editclass.php?id=({$row['cid']})'>修改</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</center>
</body>
</html>