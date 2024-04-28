<!DOCTYPE html>
<?php
	require_once 'auth.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'header.php' ?>
    <link rel="stylesheet" type="text/css" href="login2.css">
    <title>Log In</title>
</head>
<body>
<?php include 'nav_bar.php' ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="flex">
    <h2>Log in</h2>
</div>
<div class="container">
    <form>
        <div class="form-group">
            <label for="username">Username</label>
            <input placeholder="Enter Username" type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input placeholder=" Enter Password" type="password" name="password" id="password" required>
        </div>

         <div class="form-group">
            <button type="submit" formaction="users.php">Log In</button>
        </div>
    </form>
</div>

</body>
</html>