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
					<td align="center">
						<table border="0">
							<tr>
								<td>
									<img src="https://graph.facebook.com/<?php echo $page_id; ?>/picture?width=25&height=25" />
								</td>
								<td>
									<?php echo anchor_popup('http://www.facebook.com/' . $page_id,
													htmlspecialchars($store_name)); ?>
								</td>
							</tr>
						</table>
					</td>
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
			
			<input type="submit" name="submit" value="Submit">
			<input type="submit" name="cancel" value="Cancel">
			<?php echo form_close(); ?>

		</div>
	</body>
</html>
