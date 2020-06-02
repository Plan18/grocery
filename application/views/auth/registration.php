<!-- BEGIN REGISTRATION FORM -->
<form class="register-form" style="display:block" action="<?php echo base_url("register")?>" method="post">
		<h3 class="form-title text-center">Sign Up</h3>
		<?php //echo validation_errors()?>
		<p>Enter your personal details below:</p>
		<div class="form-group <?= form_error('fName') ? 'has-error':''?>">
			<label class="control-label visible-ie8 visible-ie9">First Name</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="fName" value="<?= set_value('fName')?>" aria-invalid="true" aria-describedby="fName-error" required/>
			</div>
			<span id="fName-error" class="help-block"><?= strip_tags(form_error('fName'))?></span>
		</div>
		<div class="form-group <?= form_error('lName') ? 'has-error':''?>">
			<label class="control-label visible-ie8 visible-ie9">Last Name</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="lName"  value="<?= set_value('lName')?>" aria-invalid="true" aria-describedby="lName-error" required/>
			</div>
			<span id="lName-error" class="help-block"><?= strip_tags(form_error('lName'))?></span>
		</div>
		<div class="form-group <?= form_error('email') ? 'has-error':''?>">
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"  value="<?= set_value('email')?>"  aria-invalid="true" aria-describedby="email-error" />
			</div>
			<span id="email-error" class="help-block"><?= strip_tags(form_error('email'))?></span>
		</div>
		<div class="form-group <?= form_error('username') ? 'has-error':''?>">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"  value="<?= set_value('username')?>" aria-invalid="true" aria-describedby="username-error" />
			</div>
			<span id="username-error" class="help-block"><?= strip_tags(form_error('username'))?></span>
		</div>
		<div class="form-group <?= form_error('mobile') ? 'has-error':''?>">
			<label class="control-label visible-ie8 visible-ie9">Mobile</label>
			<div class="input-icon">
				<i class="fa fa-phone"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Mobile" name="mobile" required  value="<?= set_value('mobile')?>" aria-invalid="true" aria-describedby="mobile-error" />
			</div>
			<span id="mobile-error" class="help-block"><?= strip_tags(form_error('mobile'))?></span>
		</div>		
		<div class="form-group <?= form_error('password') ? 'has-error':''?>">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" aria-invalid="true" aria-describedby="password-error" />
			</div>
			<span id="password-error" class="help-block"><?= strip_tags(form_error('password'))?></span>
		</div>
		<div class="form-group <?= form_error('rpassword') ? 'has-error':''?>">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" aria-invalid="true" aria-describedby="rpassword-error" />
				</div>
			</div>
			<span id="rpassword-error" class="help-block"><?= strip_tags(form_error('rpassword'))?></span>
		</div>
		<div class="form-actions">
			<a href="<?= base_url()?>" class="btn btn-default">
			<i class="m-icon-swapleft"></i> Back </a>
			<button type="submit" id="register-submit-btn" class="btn blue pull-right">
			Sign Up <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->