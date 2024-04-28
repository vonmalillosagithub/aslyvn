<div?php
	session_start();
	if(isset($_SESSION['login_id'])){
		header('location: home.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.php' ?>
	<meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="indx.css">
	<title>DEJA BREW CAFE</title>
</head>
<body>
	<div id="main" class="bg-info">
		<div class="container">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="card login-field">
							<div class="card-header">
								<header>Employee's Website</header>
							</div>
							<div class="card-body">
								<form id="login-frm">
									<div class="form-group">
										<label class="control-label">Username</label>
										<input type="text" name="username" class="form-control" required />
									</div>
									<div class="form-group">
										<label class="control-label">Password</label>
										<input type="password" maxlength="20" name="password" class="form-control" required />
									</div>
									<br />
									<button type="submit" class="btn btn-primary btn-block">Login</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	$(document).ready(function(){
		$('#login-frm').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: 'login.php',
				method: 'POST',
				data: $(this).serialize(),
				error: function(err) {
					console.log(err);
				},
				success: function(resp) {
					if(resp == true) {
						location.replace('home.php');
					}
				}
			});
		});
	});
</script>
</html>
