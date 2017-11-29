<?php include '../../../menuTop.php';?>
<?php
$urlAdmin =  'http://'.$_SERVER["SERVER_NAME"].'/app/components/admin/index.php';

echo "<script>
history.pushState('', document.title, window.location.pathname);
</script>"; ?>
<div ng-controller="pubCtrl">
	<div class="jumbotron">
		<div class="container">
			<div class="text-center">
				<h1>BIENVENUE</h1>
				<p>Institut Charles Delaunay</p>
			</div>
			<div class="row text-center">
				<div class="col-md-4">
					<div class="scroll-down">
						<a ng-click="show(1)" href=""><i class="fa fa-child fa-4x" aria-hidden="true"></i></a>
					</div>  
					<h3>UTILISATEURS</h3>
				</div>
				<div class="col-md-4">
					<div class="scroll-down">
						<a ng-click="show(2)" href=""><i class="fa fa-info fa-4x" aria-hidden="true"></i></i></a>
					</div> 
					<h3>Statistique</h3>
				</div>
				<div class="col-md-4">
					<div class="scroll-down">
						<a ng-click="show(3)" href=""><i class="fa fa-cog fa-spin fa-4x" aria-hidden="true"></i></a>
					</div> 
					<h3>Gerer Anomalies</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="jumbotron" id="showJumbo">
		<div class="container">
			<div ng-show="isShowed(1)" list-user></div>
			<div ng-show="isShowed(2)" statistique ng-controller="statistiqueCtrl"></div>
			<div ng-show="isShowed(3)" anomalies></div>
		</div>
	</div>
</div>
<?php include '../../../menuBottom.php';?>