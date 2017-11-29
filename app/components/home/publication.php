<?php include "$_SERVER[DOCUMENT_ROOT]/menuTop.php";?>
<div id="publication" class="jumbotron" ng-controller="pubCtrl">
    <div class="container">
        <form class="form-inline text-center">
            <div class="form-group">
                <input id="tacgia" ng-model="query" class="form-control" type="text" placeholder="Saisir information" size="40">
            </div>
            <div class="form-group">
                <label>De: </label>
                <select class="form-control" ng-model="nam">
                    <option value="" selected></option>
                    <option ng-repeat="n in [2010,2011,2012,2013,2014,2015,2016] track by $index" value="{{n}}">{{n}}</option>
                </select>
            </div>
            <div class="form-group">
                <label>Labo: </label>
                <select class="form-control" ng-model="labo">
                    <option value="" selected></option>
                    <option ng-repeat="lab in laboratoire" value="{{lab}}">{{lab}}</option>
                </select>
            </div>
        </form><br/>
    </div>
    <div id="pub" class="container">    
        <div id="RI">
            <h3 class="page-header">Article dans des Revues Internationales</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'RI'}|filter:{'Labo':labo}| filter:query|since:nam ">
                <span info-general></span>
            </li></ol>
        </div>
        <div id="CI">
            <h3 class="page-header">Article dans des Conférences Internationales</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'CI'}|filter:{'Labo':labo} |filter:query|since:nam">
                <span info-general></span>
            </li></ol>
        </div>
        <div id="RF">
            <h3 class="page-header">Article dans des Revues Françaises</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'RF'}|filter:{'Labo':labo} |filter:query |since:nam">
                <span info-general></span>
            </li></ol>
        </div>
        <div id="CF">
            <h3 class="page-header">Article dans des Conférences Françaises</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'CF'}|filter:{'Labo':labo} |filter:query|since:nam">
                <span info-general></span>
            </li></ol>
        </div>
        <div id="OS">
            <h3 class="page-header">Ouvrage Scientifique (Chapitre de Livre, ...)</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'OS'}|filter:{'Labo':labo} |filter:query|since:nam">
                <span info-general></span>
            </li></ol>
        </div>
        <div id="TD">
            <h3 class="page-header">Thèse de Doctorat</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'TD'}|filter:{'Labo':labo} |filter:query|since:nam">
                <span info-general></span>
            </li></ol>
        </div>  
        <div id="BV">
            <h3 class="page-header">Brevet</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'BV'}|filter:{'Labo':labo} |filter:query|since:nam">
                <span info-general></span>
            </li></ol>
        </div>
        <div id="AP">
            <h3 class="page-header">Autre Production</h3>
            <ol><li ng-repeat="x in pub|orderBy:'-Annee'| filter:{'Categorie':'AP'}|filter:{'Labo':labo} |filter:query|since:nam">
                <span info-general></span>
            </li></ol>
        </div>
    </div>      
</div>
<?php include "$_SERVER[DOCUMENT_ROOT]/menuBottom.php";?>