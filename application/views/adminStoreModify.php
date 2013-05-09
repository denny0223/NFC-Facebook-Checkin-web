<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>StoreModify</title>
		
	</head>
	<body>

		<?php require_once('header.php'); ?>

		<div align="center">

			<?php echo form_open('admin/store/' . $id); ?>

			<table border="1">
				<tr>
					<th>店家名稱</th>
					<td><?php echo htmlspecialchars($store_name); ?></td>
				</tr>
				<tr>
					<th>訊息</th>
					<td>
						<textarea name="msg"><?php echo htmlspecialchars(stripslashes($coupon_msg)); ?></textarea>
					</td>
				</tr>
				<tr>
					<th>問卷連結</th>
					<td align="center">
						<?php echo anchor_popup($feedback_url, 'link'); ?>
					</td>
				</tr>
				<tr>
					<th>問卷結果</th>
					<td align="center">
						<?php echo anchor_popup($feedback_result_url, 'link'); ?>
					</td>
				</tr>
			</table>

			<br>

			<?php echo validation_errors('<div style="font-size: small; color: red;">'); ?>
			
			<input type="submit" name="cancel" value="Cancel">
			<input type="submit" name="submit" value="Submit">
			<?php echo form_close(); ?>

		</div>
	</body>
</html>
