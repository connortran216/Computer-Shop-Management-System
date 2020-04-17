<?php
session_start();
include_once 'database.php';
if(isset($_POST['submit']))
{
    $user_email = $_POST['user_email'];
    $result = mysqli_query($conn,"SELECT * FROM users where email='" . $_POST['user_email'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['email'];
	$email_id=$row['email'];
	$password=$row['password'];
	
	if($user_email==$fetch_user_id) {
				
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: cnh_shop@gmail.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid userid';
				}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email: </td><td><input type='text' name='user_email'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>