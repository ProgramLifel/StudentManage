<html>
<head>
    <title>学生信息管理</title>
</head>
<body>
<center>
    <?php include_once "menu.php"; ?>
    <h3>增加学生信息</h3>
    <form id="addstu" name="addstu" method="post" action="addaction.php">
        <table>
		<tr>
                <td>学号</td>
                <td><input id="sid" name="ssid" type="text"/></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="sname" type="text"/></td>
            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="ssex" value="男"/>&nbsp;男
                    <input type="radio" name="ssex" value="女"/>&nbsp;女
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="sage" id="age"/></td>
            </tr>
			<tr>
                <td>密码</td>
                <td><input id="password" name="password" type="password"/></td>
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