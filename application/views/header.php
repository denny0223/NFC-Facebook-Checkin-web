<div id="header">
<?php 
	$this->load->helper('form');
	echo form_open('logout');
?>
	<div id="logout" align="right">
		<input type="submit" name="logout" value="Logout">
	</div>
<?php
	echo form_close();
?>
</div>
