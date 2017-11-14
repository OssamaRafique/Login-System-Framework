<!DOCTYPE html>


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php echo $website_name; ?> | <?php echo @$pageName; ?></title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/themesdefault.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link href='https://fonts.googleapis.com/css?family=Muli:400,300italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Questrial|Roboto+Condensed|Stalemate" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="assets/js/style.js"></script>

		

</head>

<body>

<div class="navbar navbar-default navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<a href="index" class="navbar-brand"><b><?php echo $website_name; ?></b></a>
<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="navbar-collapse collapse" id="navbar-main">
<ul class="nav navbar-nav">


<li><a href="secure-page"><i class="glyphicon glyphicon-check"></i> &nbsp;Secure-Page</a></li>

<?php if(checkAdmin() == true){?><li><a href="admin"><i class="glyphicon glyphicon-eye-open"></i> &nbsp; Admin</a></li><?php } ?>

</ul>

<ul class="nav navbar-nav navbar-right">

<?php

if(UserLoggedIn() == true) {
?>

<?php if(settings("showProfiles") == 1) {?><li><a href="profile?username=<?php echo $_SESSION['user_name']; ?>"><i class="glyphicon glyphicon-bookmark"></i> &nbsp; Profile</a></li><?php } ?>
<li><a href="edit-profile"><i class="glyphicon glyphicon-wrench"></i> &nbsp; Edit Profile</a></li>
<li><a href="?logout"><i class="glyphicon glyphicon-off"></i> &nbsp; Logout</a></li>
<?php
$usern=$_SESSION['user_name'];
   $sql = "SELECT * FROM users WHERE user_name ='$usern'";
   $result = mysqli_query($con,$sql);
   
   $user_data = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   mysqli_free_result($result);
?>
<?php

} else {
	
?>

<li><a href="login"><i class="glyphicon glyphicon-user"></i> &nbsp; Login</a></li>
<li><a href="register"><i class="glyphicon glyphicon-book"></i> &nbsp; Register</a></li>

<?php	

}

?>

</ul>

</div>

</div>
</div>

<div id="wrapper">

<?php

if(empty($core_system_messages) == false) {

foreach($core_system_messages as $message) {

echo '<div class="container">
<div class="alert alert-dismissable alert-info">
' . $message . '
</div>
</div>';

}

}

?>