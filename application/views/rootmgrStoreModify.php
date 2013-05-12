<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	
		<title>StoreModify</title>
		
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script>
			$(function() {
				var availableTags = [ <?php echo '"' . @implode("\",\"", $users) . '"'; ?> ];
				$( "#username" ).autocomplete({
					source: availableTags
				});
			});
		</script>
		<script>
			function ref(){
				$.get("https://graph.facebook.com/"+$("#page_id")[0].value, function(a) {
					if(a.likes === undefined){
						$("#store_name")[0].textContent = "";
						alert('Not a page ID');
						return;
					}
					$("#store_avatar")[0].src="https://graph.facebook.com/" + $("#page_id")[0].value + "/picture?width=25&height=25";
					$("#store_name")[0].textContent=a.name;
				})
				.fail(function() {
					$("#store_name")[0].textContent = "";
					alert("ID not available");
				});
			}
		</script>
	</head>
	<body>

		<?php require_once('header.php'); ?>

		<div align="center">

			<?php echo form_open('rootmgr/storemodify/' . $id); ?>

			<table border="1">
				<tr>
					<th>店家名稱</th>
					<td align="center">
						<table border="0">
							<tr>
								<td>
									<img id="store_avatar" src="https://graph.facebook.com/<?php echo $page_id; ?>/picture?width=25&height=25" />
								</td>
								<td>
									<?php echo anchor('http://www.facebook.com/' . $page_id,
													htmlspecialchars($store_name), 'target="_blank" id="store_name"'); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th>粉絲團ID</th>
					<td align="center">
						<input id="page_id" type="text" name="page_id" value="<?php echo htmlspecialchars($page_id); ?>">
						<input type="button" name="some_name" value="Refresh" onclick="ref();">
					</td>
				</tr>
				<tr>
					<th>管理者</th>
					<td align="center">
						<input id="username" type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
					</td>
				</tr>
				<tr>
					<th>NFC Tag ID</th>
					<td align="center">
						<input type="text" name="tag_id" value="<?php echo htmlspecialchars($tag_id); ?>">
					</td>
				</tr>
				<tr>
					<th>訊息</th>
					<td>
						<textarea name="msg" rows="4" cols="30"><?php echo htmlspecialchars(stripslashes($coupon_msg)); ?></textarea>
					</td>
				</tr>
				<tr>
					<th>問卷連結</th>
					<td>
						<?php echo anchor_popup($feedback_url, 'link'); ?><br>
						<textarea name="feedback_url" rows="4" cols="30"><?php echo $feedback_url; ?></textarea>
					</td>
				</tr>
				<tr>
					<th>問卷結果</th>
					<td>
						<?php echo anchor_popup($feedback_result_url, 'link'); ?><br>
						<textarea name="feedback_result_url" rows="4" cols="30"><?php echo $feedback_result_url; ?>"</textarea>
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
