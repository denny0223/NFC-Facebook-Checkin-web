<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>StoreList</title>
		
	</head>
	<body>
		<div align="center">
			<table border="1">
				<tr>
					<th>店家名稱</th>
					<th>訊息</th>
					<th>問卷連結</th>
					<th>問卷結果</th>
					<th></th>
				</tr>
<?php
			for ($i = 0; $i < count($stores); $i++) {
?>
				<tr>
					<td align="center">
						<?php echo htmlspecialchars($stores[$i]['store_name']); ?>
					</td>
					<td align="center">
						<?php echo htmlspecialchars($stores[$i]['coupon_msg']); ?>
					</td>
					<td align="center">
						<?php echo anchor_popup($stores[$i]['feedback_url'], 'link'); ?>
					</td>
					<td align="center">
						<?php echo anchor_popup($stores[$i]['feedback_result_url'], 'link'); ?>
					</td>
					<td align="center">
						<?php
						echo anchor('/admin/store/' . $stores[$i]['id'], 'edit');
						?>
					</td>
				</tr>
<?php
			}
?>
			</table>
		</div>
	</body>
</html>
