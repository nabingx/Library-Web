<html>
<head>
	<title>User Request</title>
</head>
<body>
	<form action="request_control.php" method="post">
		<table>
			<tr>
				<td colspan="2">Form Request</td>
			</tr>	
			<tr>
				<td>Tên người dùng :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="email" id="email" name="email"></td>
			</tr>
			<tr>
				<td>Nội dung Request :</td>
				<td><input type="text" id="content" name="content"></td>
			</tr>
			<tr>
                <button type="submit" name="submit" class="btn-submit">Add Category</button>
			</tr>

		</table>
		
	</form>
</body>
</html>