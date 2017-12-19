<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>学生信息管理</title>
    <script>
        function doDel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'delteaaction.php?id='+id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php
    include_once "menu.php";
    ?>
    <h3>浏览老师信息</h3>
    <table width="600" border="1">
        <tr>
            <th>工号</th>
            <th>姓名</th>
			<th>职称</th>
            <th>工资</th>
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
        $sql = "select tid,tname,ttitle,tsalary from teacher";
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['tid']}</td>";
            echo "<td>{$row['tname']}</td>";
            echo "<td>{$row['ttitle']}</td>";
            echo "<td>{$row['tsalary']}</td>";
            echo "<td>
		<a href='javascript:doDel({$row['tid']})'>删除</a>
                    <a href='editTeacher.php?id=({$row['tid']})'>修改</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</center>
</body>
</html>