<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>Account Modify</title>
		
	</head>
	<body>
		<?php require_once('header.php'); ?>

		<div align="center">
			<?php echo form_open('admin/account/' . $id); ?>

			<table border="1">
				<tr>
					<th>Username</th>
					<td><?php echo htmlspecialchars($username); ?>
				</tr>
				<tr>
					<th>Current password</th>
					<td><input type="password" name="curpwd" value=""></td>
				</tr>
				<tr>
					<th>New password</th>
					<td><input type="password" name="newpwd" value=""></td>
				</tr>
				<tr>
					<th>New password confirm</th>
					<td><input type="password" name="newpwdconf" value=""></td>
				</tr>
				<tr>
					<th>E-mail</th>
					<td><input type="email" name="email" value="<?php
							$svemail = set_value('email');
							if(!empty($svemail)) echo $svemail;
							else echo htmlspecialchars($email);
						?>">
					</td>
				</tr>
				<tr>
					<th>Google account</th>
					<td><?php echo htmlspecialchars($google_account_id); ?></td>
				</tr>
			</table>
			<h6>if you want to set or change your google account, please mail us</h6>

			<?php echo validation_errors('<div style="font-size: small; color: red;">'); ?>
			
			<input type="submit" name="submit" value="Submit">
			<input type="submit" name="cancel" value="Cancel">
			<?php echo form_close(); ?>

		</div>
	</body>
</html>
