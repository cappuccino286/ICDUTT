<?php include 'menuTop.php';
// include("$_SERVER['DOCUMENT_ROOT']ICDUTT/app/components/home/login.php");
// if (isset($_SESSION['login_user'])) {
//     if ($_SESSION['login_user'] == "syhung") {
//         header("location: app/components/admin/index.php");
//     } else {
//         header("location: app/components/chercheur/index.php");
//     }
// }
?>

<div id="home" class="jumbotron">
	<div class="container">
	    <div class="text-center" id="jumbo1">
	        <h1>Institut Charles Delaunay</h1>
	        <h2>Le programme de recherche de l'Université de technologie de Troyes</h2>
	        <img class="hidden-xs hidden-sm" src="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/img/about.png" alt="ava" id="zeplin">
	    </div>
	    <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/img/img_jumbo2.jpg" class="img-responsive">
	    <div class="scroll-down petit"><a href="#equipe" class="direction"><i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i></a></div>
	</div>
</div>
<div id="equipe" class="jumbotron">
	<div equipe></div>
</div>
<div id="articles">
	<div articles></div>
</div>
<div id="statistique" class="jumbotron">
	<div statistique ng-controller="statistiqueCtrl"></div>
</div>
<div id="about" class="jumbotron">
	<div about></div>
</div>
<?php include 'menuBottom.php';?>