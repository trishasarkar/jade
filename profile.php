<?php
include 'connection.php';
session_start();
$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM user_details WHERE user_id = '$id'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query)
?>


<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bay View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <style type="text/css">
       
       body {
		background-image: url('images/bg11.jpg');
		background-position: right;
	}

	a:link,
	a:visited {
		color: #f3d8e6;
		font-size: 16px;
	}

	a:hover,
	a:active {
		color: white;
	}

	.dropdown-menu {
		background-color: black;
	}

	.form1 {
		background-color: #faeaf3;
		width: 40%;
		margin: auto;
		display: block;
		padding: 20px;
		margin-top: 30px;
		text-align: center;
	}

	h3 {
		margin-bottom: 15px;
	}

	label {
		font-weight: 500;
		margin-left: 20px;
	}

	input {
		border: none;
		background: white;
		width: 100%;
		margin-bottom: 5px;
		margin-left: 60px;
	}

	td {
		padding: 10px;
	}

	.btn1 {
		background-color: #c33c82;
		color: white;
		width: 30%;
		margin: auto;
		display: block;
		margin-top: 10px;
		margin-bottom: 20px
	}

	.btn1:hover {
		background-color: #404040;
	}

	.form1 a {
		color: black;
	}

	footer .fa {
		padding: 15px;
		font-size: 20px;
		width: 50px;
		text-align: center;
		text-decoration: none;
		margin: 5px 5px;
		border-radius: 50%;
	}

	.t2 {
		background-color: #c33c82;
		padding: 0.5px;
		margin-bottom: 20px;
		width: 40%;
		margin: auto;
		display: block;
		margin-bottom: 25px;
	}

	footer .fa hover {
		opacity: 0.7;
	}

	.fa-facebook {
		background: #3B5998;
		color: white;
	}

	.fa-twitter {
		background: #55ACEE;
		color: white;
	}

	.fa-instagram {
		background: #e95950;
		color: white;
	}

	footer {
		margin-top: 30px;
		color: white;
		background-color: #353135;
	}

	footer p {
		font-size: 14px;
	}
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="form1">

        <div class="header">
            <h2>USER PROFILE</h2>
        </div>
        <div class="profile-input-field">
            <form method="post">
                <table>
                    <tr>
                        <div class="form-group">
                            <td><label>Full Name</label></td>
                            <td><input type="text" name="fname" style="width: 20em" placeholder="Enter your Fullname" value="<?php echo $row['user_name']; ?>" required /></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td><label>Address</label></td>
                            <td><input type="text" name="address" style="width: 20em" placeholder="Enter your Address" value="<?php echo $row['user_address']; ?>" required /></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td><label>Email</label></td>
                            <td><input type="text" name="email" style="width: 20em" placeholder="Enter your Email" value="<?php echo $row['user_emailid']; ?>" required /></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td><label>Mobile Number</label></td>
                            <td><input type="text" name="number" style="width: 20em" placeholder="Enter your Address" value="<?php echo $row['user_mobilenumber']; ?>" required /></td>
                        </div>
                    </tr>
                </table>
                <input type="submit" name="submit" class="btn btn1">
            </form>
        </div>

    </div>

    <?php
    include("footer.php");
    ?>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</html>
<?php
if (isset($_POST['submit'])) {
    # code...
    $fullname = $_POST['fname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $query = "UPDATE user_details SET user_name='$fullname', user_address = '$address', user_emailid='$email', user_mobilenumber = '$number' WHERE user_id = '$id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
    <script type="text/javascript">
        alert("Update Successfull");
        window.location = 'index.php';
    </script>

<?php
}
?>