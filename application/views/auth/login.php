	<form class="login-form" action="<?php echo base_url("login")?>" method="post">
		<h3 class="form-title text-center">Login</h3>
		<div class="alert alert-danger <?= validation_errors() || isset($errors) ? '':'display-hide	' ?>">
			<button class="close" data-close="alert"></button>
			<span>
			<?php if(validation_errors()) validation_errors('<span>', '</span>');
			else if(isset($errors)) echo $errors;
			else echo 'Enter any username and password' ?>
			</span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>
			<button type="submit" class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click <a href="<?php echo base_url("forgetpassword")?>" id="forgetpassword">
				here </a>
				to reset your password.
			</p>
		</div>
		<div class="create-account">
			<p>
				 Don't have an account yet ?&nbsp; <a href="<?php echo base_url("registration")?>" id="register">
				Create an account </a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->