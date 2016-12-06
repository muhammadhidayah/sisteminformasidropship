<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<fieldset>
		<?php echo validation_errors();?>
		<?php echo $this->session->flashdata('notification')?>
		<?php echo form_open('auth/login')?>
			Username: <input type="text" name="username" value="<?php echo set_value('username')?>"/> <br />
			Password: <input type="password" name="password" value="<?php echo set_value('password')?>"><br />
			<br />
			<input type="submit" name="masuk" value="Login"><br />
		</form>
	</fieldset>
</body>
</html>