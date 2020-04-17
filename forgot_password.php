<html>
	<body>
		<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
		<h1>Forgot Password?</h1>
			<?php if(!empty($success_message)) { ?>
			<div class="success_message"><?php echo $success_message; ?></div>
			<?php } ?>

			<div id="validation-message">
				<?php if(!empty($error_message)) { ?>
			<?php echo $error_message; ?>
			<?php } ?>
			</div>
			
			<div class="field-group">
				
				<div><label for="email">Email</label></div>
				<div><input type="text" name="user-email" id="user-email" class="input-field" placeholder="Email"></div>
			</div>
			
			<div class="field-group">
				<br>
				<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
			</div>
			<?php
				if(!empty($_POST["forgot-password"])){
					$conn = mysqli_connect("localhost", "root", "", "shop_mangement");
					
					$condition = "";
					if(!empty($_POST["user-login-name"])) 
						$condition = " member_name = '" . $_POST["user-login-name"] . "'";
					if(!empty($_POST["user-email"])) {
						if(!empty($condition)) {
							$condition = " and ";
						}
						$condition = " member_email = '" . $_POST["user-email"] . "'";
					}
					
					if(!empty($condition)) {
						$condition = " where " . $condition;
					}

					$sql = "Select * from users " . $condition;
					$result = mysqli_query($conn,$sql);
					$user = mysqli_fetch_array($result);
					
					if(!empty($user)) {
						require_once("forgot-password-recovery-mail.php");
					} else {
						$error_message = 'No User Found';
					}
				}
			?>
		</form>
	</body>	
</html>