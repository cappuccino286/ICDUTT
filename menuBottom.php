	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal"><img src="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/img/close_icon.png"></span>
				</div>
				<div class="modal-body text-center">
					<div style="width:75px;height:75px;border:3px solid #4a90e2; color:#4a90e2; border-radius: 50%;margin: auto"><i class="fa fa-sign-in" aria-hidden="true" style="font-size: 49px;line-height: 71.5px;"></i></div><br/>
					<form role="form" method="POST" action="">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-primary btn-login form-control" value="Sign in">
						</div>
					</form>
					<div id="other-login"><span id="content-other-login">OR</span></div>
					<button type="button" name="loginFacebook" class="btn btn-primary btn-login form-control">
						<span style="margin-right: 8px"><i class="fa fa-facebook" aria-hidden="true"></i></span> Sign in with Facebook 
					</button>
					<button type="button" name="loginGoogle" class="btn btn-login form-control">
						<span style="margin-right: 8px"><i class="fa fa-google" aria-hidden="true"></i></span> Sign in with Google
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="information" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal"><img src="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/img/close_icon.png"></span>
				</div>
				<div class="modal-body">
					<div ng-view></div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    
    <script src="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/libs/angular-route.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/js/script.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT']?>/app/app.routes.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT']?>/app/shared/sharedCtrl.js"></script>
	</body>
</html>