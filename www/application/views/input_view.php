<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>
		input_arr
	</title>
</head>

<body>
	<form action="/index.php/excelinput/select" method="post">
		<table>
		<?php 
//		var_dump($query);
//		echo count($query);
/* 		echo '<tr>';
		echo '<td>序号</td><td>用户ID</td><td>姓名</td><td>密码</td><td>公司</td><td>电话</td>';
		echo '</tr>'; */
		
		echo '<tr>';
		echo '<td>序号</td><td>药品名</td><td>单位</td><td>价格</td><td>状态</td><td>导入时间</td>';
		echo '</tr>';
		/* CI中向视图传递的参数都是对象，必须通过$query[$i]->Id的格式取值，
		 * 而不能用$query[$i][%j]的格式取值，否则会报错 */
		for ($i=0;$i<count($query);$i++){
			echo '<tr>';
			echo 	'<td>'.$query[$i]->DrugId.'</td>';
			echo 	'<td>'.$query[$i]->DrugName.'</td>';
			echo 	'<td>'.$query[$i]->DrugUnit.'</td>';
			echo 	'<td>'.$query[$i]->DrugPrice.'</td>';
			if($query[$i]->IsCheck)
				echo 	'<td>'.'已审核'.'</td>';
			else 
				echo	'<td>'.'未审核'.'</td>';
			echo 	'<td>'.$query[$i]->InputDate.'</td>';
			echo '</tr>';
		}
		?>
		</table>
	</form>
</body>
</html>