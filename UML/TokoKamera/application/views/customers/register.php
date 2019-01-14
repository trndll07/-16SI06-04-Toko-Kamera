
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<?php echo form_open('Customers/register'); ?>
					<br>
					<span class="login100-form-title p-b-10">
						Sign Up
					</span>
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate = "Enter fullname">
						<input class="input100" type="text" name="fullname" placeholder="Fullname">
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter phone">
						<input class="input100" type="phone" name="phone" placeholder="Phone">
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter address">
						<input class="input100" type="address" name="address" placeholder="Address">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Sign-up
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>