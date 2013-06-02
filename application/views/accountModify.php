<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>Account Modify</title>
		
	</head>
	<body>
		<?php require_once('header.php'); ?>

		<div align="center">
			<?php echo form_open('admin/account/' . $id); ?>

			<table class="table table-nonfluid">
				<tr>
					<th>Username</th>
					<td><?php echo htmlspecialchars($username); ?>
				</tr>
				<tr>
					<th>Current password<font color="red">*</font></th>
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
							if(set_value('email')) echo set_value('email');
							else echo htmlspecialchars($email);
						?>">
					</td>
				</tr>
<?php if($this->session->userdata('username') != 'mgr') { ?>
				<tr>
					<th>Google account</th>
					<td><?php echo htmlspecialchars($google_account_id); ?></td>
				</tr>
<?php } ?>
			</table>
<?php if($this->session->userdata('username') != 'mgr') { ?>
			<h6>if you want to set or change your google account, please mail us</h6>
<?php } ?>

			<?php echo validation_errors('<div style="font-size: small; color: red;">'); ?>
			
			<input type="submit" name="submit" value="Submit" class="btn">
			&nbsp;&nbsp;
			<input type="submit" name="cancel" value="Cancel" class="btn">
			<?php echo form_close(); ?>

		</div>
	</body>
</html>
