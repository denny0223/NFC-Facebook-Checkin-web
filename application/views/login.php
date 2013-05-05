<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>Login</title>
	</head>
	<body>
		
		<div align="center">

			<?php echo form_open('login'); ?>

			<table border="0">
				<tr>
					<th>Username</th>
					<td>
						<input type="text" name="username" value="<?php echo set_value('username'); ?>" />
					</td>
				</tr>
				<tr>
					<th>Password</th>
					<td>
						<input type="password" name="password" value="" />
					</td>
				</tr>
			</table>

			<div><input type="submit" name="login" value="Login" /></div>

			<?php form_close(); ?>

			<?php echo validation_errors('<div style="font-size: small; color: red;">', '</div>'); ?>

		</div>

	</body>
</html>
