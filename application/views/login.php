<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>Login</title>

		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div align="center">

			<h1>NFC 快速打卡後台管理系統</h1>
			<br><br>

			<?php echo form_open('login'); ?>

				<strong>Username</strong>
				<input type="text" name="username" value="<?php echo set_value('username'); ?>" />
				<br>
				<strong>Password</strong>
				<input type="password" name="password" value="" />

			<div><input type="submit" name="login" value="Login" class="btn btn-primary" /></div>

			<?php echo form_close(); ?>

			<?php echo validation_errors('<div style="font-size: small; color: red;">', '</div>'); ?>

		</div>

	</body>
</html>
