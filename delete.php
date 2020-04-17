<?php
session_start();
include 'mydbconnect.php';

if (isset($_POST['add']))
{
	$call=openDatabase();

	$PID=$_POST['ID'];

	$q2="delete from products where id='$PID' ";
	
	$result=useDatabase($q2);
	if($result)
	{
		echo "<script>
		alert('Delete product successfully!');
		window.location.href='delete.php';
		</script>" ;
	}
	else
	{
		echo "<script>
		alert('Error is in running query. ');
		window.location.href='delete.php';
		</script>" ;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add product page </title>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css" >
	</head>
	<body>
		<img src="images/p4.jpg" id="bg" >
		<div id="col-md-12 col-md-offset-0">
			<ul class="nav nav-tabs" id="color1">
				<li role="presentation" ><a href="sold.php" id="lic1">Home</a></li>
				<li role="presentation"><a href="register.php" id="lic2">New account</a></li>
				<li role="presentation" class="active"><a href="product.php" id="lic3" >Add product</a></li>

				<div class="btn-group " style="float:right;" >
					<button type="button" class="btn-link dropdown-toggle"id='dp' data-toggle="dropdown"><?php echo $_SESSION['username']; ?><span class="caret red"></span></button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li><a href="#">Your profile</a></li>
						<li><a href="outofstock.php">Items out of stock <span class="badge"><?php print $_SESSION['count']; ?></span></a></li>
						<li><a href="profits.php">Profit</a></li>

						<li class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</ul>
		</div>
		<div "col-md-4 col-md-offset-0">
			<h1 class="ph1"> &#9997 Delete The Product</h1>
			<form  id="Fm1" method="post">
				<div class="row">
					<div class="span" >
						<label for="inputText3" class="col-sm-1 control-label" id="F3" required >ProductID</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="inputText3" name="ID"placeholder="Product ID" required>
						</div>
					</div>
				

				</div>
				<br>
				<br>
				<br>
				</div>
				
				<br><br>
				<div class="row">
					<div class="col-sm-1"></div>
						<div class="col-sm-3 control-label" >
							<button type="submit" class="btn btn-primary" name="add" >Delete</button>
						</div>
					<div class="col-sm-3 control-label" >
						<a href="product.php" class="btn btn-danger">Cancel</a></button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
