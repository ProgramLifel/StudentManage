<html>
<head>
    <title>学生信息管理</title>
</head>
<body>
<center>
    <?php include_once "menu.php"; ?>
    <h3>增加课程信息</h3>
    <form id="addclass" name="addclass" method="post" action="addclassaction.php">
        <table>
		<tr>
                <td>课程号</td>
                <td><input id="cid" name="cid" type="text"/></td>
            </tr>
            <tr>
                <td>课程名</td>
                <td><input id="name" name="cname" type="text"/></td>
            </tr>
            <tr>
                <td>学分数</td>
                <td><input type="text" name="cfraction" id="fraction"/></td>
            </tr>
			<tr>
                <td>授课老师工号</td>
                <td><input id="tid" name="tid" type="text"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="增加"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>