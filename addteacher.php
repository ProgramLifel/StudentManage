<html>
<head>
    <title>学生信息管理</title>
</head>
<body>
<center>
    <?php include_once "menu.php"; ?>
    <h3>增加老师信息</h3>
    <form id="addtea" name="addtea" method="post" action="addteaaction.php">
        <table>
		<tr>
                <td>工号</td>
                <td><input id="sid" name="tid" type="text"/></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="tname" type="text"/></td>
            </tr>
            <tr>
                <td>职称</td>
                <td><input type="text" name="ttitle" id="title"/></td>
            </tr>
			<tr>
                <td>工资</td>
                <td><input id="salary" name="tsalary" type="text"/></td>
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