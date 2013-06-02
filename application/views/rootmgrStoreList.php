<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>StoreList</title>
		
	</head>
	<body>
		<?php require_once('header.php'); ?>
		<div align="center">
			<table width="50%" border="0">
				<tr>
					<td align="center"><?php echo anchor('/rootmgr/user', 'Manage Users'); ?></td>
					<td align="center"><?php echo anchor('/rootmgr/addstore', 'Add Store'); ?></td>
				</tr>
			</table>
		</div>
		<br>
		<div align="center">
			<table border="1" class="table table-striped table-nonfluid">
				<tr>
					<th>店家名稱</th>
					<th>管理者</th>
					<th>NFC Tag ID</th>
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
						<img src="https://graph.facebook.com/<?php echo $stores[$i]['page_id']; ?>/picture?width=25&height=25" />
						<?php echo anchor_popup('http://www.facebook.com/' . $stores[$i]['page_id'],
										htmlspecialchars($stores[$i]['store_name'])); ?>
					</td>
					<td align="center">
						<?php echo htmlspecialchars($stores[$i]['username']); ?>
					</td>
					<td align="center">
						<?php echo htmlspecialchars($stores[$i]['tag_id']); ?>
					</td>
					<td align="center">
						<?php echo htmlspecialchars(stripslashes($stores[$i]['coupon_msg'])); ?>
					</td>
					<td align="center">
						<?php echo anchor($stores[$i]['feedback_url'], 'Link', 'target="_blank" class="btn btn-info"'); ?>
					</td>
					<td align="center">
						<?php echo anchor($stores[$i]['feedback_result_url'], 'Link', 'target="_blank" class="btn btn-info"'); ?>
					</td>
					<td align="center">
						<?php
						echo anchor('/rootmgr/storemodify/' . $stores[$i]['id'], 'Edit', 'class="btn btn-primary"');
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
