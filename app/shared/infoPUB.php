<div>
    <span class="title">Auteurs: </span>
    <span ng-repeat="x in info.Auteur">
        <button class="btn btn-success btn-xs">{{x}}</button>
    </span>
</div>
<div>
    <span class="title">Titre: </span><span style="color:#E57373; font-weight: 700;">{{info.Titre}}</span>
</div>
<div>
    <span class="title">Domaine: </span>{{info.Domaine}}
</div>
<div>
    <span class="title">Editeur: </span>{{info.Editeur}}
</div>
<div>
    <span class="title">Annee: </span>{{info.Annee}}
</div>
<div>
    <span class="title">Url chez l'editeur: </span><a href="{{info.Url}}">{{info.Url}}</a>
</div>
<div>
    <span class="title">Categorie: </span>{{info.Categorie}}
</div>
<div>
    <span class="title">Labo: </span>
    <span ng-repeat="y in info.Labo">
        {{y}} 
    </span>
</div>
<div>
    <div class="title">Resume: </div>{{info.Resume}}
</div>
<div>
    <span class="title">Document: </span><a href="../../../assets/documents/{{info.Document}}">{{info.Document}}</a>
</div>