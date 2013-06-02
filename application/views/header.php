<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<style type="text/css">
	.table-nonfluid {
		width: auto;
	}
</style>
<div id="header">
<?php 
	$this->load->helper('form');
	echo form_open('logout');
?>
	<div id="logout" align="right">
		<table border="0">
			<tr>
				<td>
					<img src="http://www.gravatar.com/avatar/<?php echo md5($this->session->userdata('email')); ?>?s=25" />
				</td>
				<td>
					<?php echo anchor('/admin/account/' . $this->session->userdata('userId'), $this->session->userdata('username')); ?>
					&nbsp;&nbsp;
				</td>
				<td>
					<input class="btn btn-link" type="submit" name="logout" value="Logout">
				</td>
			</tr>
		</table>
	</div>
<?php
	echo form_close();
?>
</div>
<?php
	$resmsg = $this->session->flashdata('resmsg');
	if(!empty($resmsg)){
?>
		<div align="center" style="font-size: small; color: red;">
			<?php echo $resmsg; ?>
		</div>
		<br>
<?php
	}
?>
