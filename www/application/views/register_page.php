<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>
		register page
	</title>
</head>

<body>
	<form action="/index.php/sys_manager/user_add" method="post" id="">
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="UserId"></td>
                                <td><?php echo form_error('userid'); ?></td>
			</tr>
			<tr>
				<td>姓    名：</td>
				<td><input type="text" name="UserName"></td>
			</tr>
			<tr>
				<td>密     码：</td>
				<td><input type="password" name="Password"></td>
			</tr>
			<tr>
				<td>公    司：</td>
				<td><input type="text" name="UserCompany"></td>
			</tr>
			<tr>
				<td>手    机：</td>
				<td><input type="text" name="MobilePhone"></td>
			</tr>
			<tr>
				<td><input type="submit" value="注册"></td>
				<td><input type="reset" value="重置"></td>
			</tr>
		</table>
	</form>
</body>
</html>