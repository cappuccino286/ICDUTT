<?php
include("$_SERVER[DOCUMENT_ROOT]/app/components/home/login.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Institut Charles Delaunay</title>
        <link href="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/img/about.png" rel="shortcut icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body ng-app="myApp">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myBar" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand direction" href="#home">ICDUTT</a>
                </div>
                <div class="collapse navbar-collapse" id="myBar">
                <?php
                if(!isset($_SESSION['login_user'])){
                ?>
                    <ul class="nav navbar-nav">
                        <li><a href="#equipe" class="direction">EQUIPE</a></li>
                        <li><a href="#articles" class="direction">PUBLICATION</a></li>
                        <li><a href="#statistique" class="direction">STATISTIQUE</a></li>      
                        <li><a href="#about" class="direction">ABOUT</a></li>              
                    </ul>
                <?php }?>
                    <ul class="nav navbar-nav navbar-right">
                        <?php 
                            if(!isset($_SESSION['login_user'])){
                        ?>
                        <li>
                            <a type="button" href="" data-toggle="modal" data-target="#loginModal" style="color:#ee6723">
                                LOGIN <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                            </a>
                        </li>
                        <?php } else { ?>
                        <script>window.location.href.split('#')[0]</script>
                        <li><a id="user">Bienvenue <?php echo $_SESSION['login_user']?></a></li>
                        <li>
                            <a type="button" href="<?php $_SERVER['DOCUMENT_ROOT']?>/app/shared/logout.php">
                                LOGOUT <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        
