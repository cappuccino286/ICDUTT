<?php 
include '../../../menuTop.php';
include('Chercheur.php');
include("$_SERVER[DOCUMENT_ROOT]/config.php");
?>
<?php echo "<script>history.pushState('', document.title, window.location.pathname);</script>"; ?>
<div ng-controller="pubCtrl">
    <div class="jumbotron" >
        <div class="container">
            <div class="text-center">
                <h1>BIENVENUE</h1>
                <p>Institut Charles Delaunay</p>
            </div>
            <div class="row text-center" ng-init="isShow=1">
                <div class="col-md-4">
                    <div class="scroll-down">
                        <a ng-click="show(1)" href=""><i class="fa fa-child fa-4x" aria-hidden="true"></i></a>
                    </div>  
                    <h3>Ajoute Utilisateur</h3>
                </div>
                <div class="col-md-4">
                    <div class="scroll-down">
                        <a ng-click="show(2)" href=""><i class="fa fa-plus fa-4x" aria-hidden="true"></i></i></a>
                    </div> 
                    <h3>Ajoute Pub</h3>
                </div>
                <div class="col-md-4">
                    <div class="scroll-down">
                        <a ng-click="show(3)" href=""><i class="fa fa-spinner fa-pulse fa-4x" aria-hidden="true"></i></a>
                    </div> 
                    <h3>Modifier Pub</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron" id="showJumbo">
        <div class="container">
            <div ng-show="isShowed(1)" ajoute-utilisateur></div>
            <div ng-show="isShowed(2)" ajoute-pub></div>
            <div ng-show="isShowed(3)" modifier-pub></div>
            <?php
                $conn=new config();
                $chercheur = new Chercheur($conn->_db);
                if (isset($_POST['submitUser'])) {
                    $chercheur->creer();
                }
                if (isset($_POST['submitPUB'])) {
                    $chercheur->add();
                }
                if (isset($_POST['updatePub'])) {
                    $chercheur->update();
                }
            ?>
        </div>
    </div>
</div>
<?php include '../../../menuBottom.php';?>