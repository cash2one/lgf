<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>
		login page
	</title>
</head>

<body>
	<form action="/index.php/login/checklogin" method="post">
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="UserId"></td>
			</tr>
			<tr>
				<td>密     码：</td>
				<td><input type="password" name="Password"></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
				<td><input type="submit" value="重置"><a href='/index.php/register'>注册</a></td>
			</tr>
		</table>
	</form>
</body>
</html>