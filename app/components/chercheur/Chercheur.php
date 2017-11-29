<?php

class Chercheur {

    private $_db;

    public function __construct(PDO $_db) {
        $this->_db = $_db;
    }

    public function creer() {
        $q = $this->_db->prepare('INSERT INTO login SET username=:username,password=:password,nom=:nom,prenom=:prenom,organisation=:organisation,equipe=:equipe');
        $q->bindValue(':username', $_POST['username']);
        $q->bindValue(':password', md5($_POST['password']));
        $q->bindValue(':nom', $_POST['nom']);
        $q->bindValue(':prenom', $_POST['prenom']);
        $q->bindValue(':organisation', $_POST['organisation']);
        if (isset($_POST['equipe']) && $_POST['equipe']!='Autre') {
            $q->bindValue(':equipe', $_POST['equipe']);  
        } else {
            $q->bindValue(':equipe', $_POST['equipeX']);
        }
        $q->execute();
    }

    public function update() {
        $noPub = $_POST['id'];
        $q = $this->_db->prepare('UPDATE publication SET titre=:titre,domaine=:domaine,editeur=:editeur,annee=:annee,url=:url,categorie=:categorie,resume=:resume WHERE id=:id');
        $q->bindValue(':id', $noPub);
        $q->bindValue(':titre', trim($_POST['titre']));
        $q->bindValue(':domaine', trim($_POST['domaine']));
        $q->bindValue(':editeur', trim($_POST['editeur']));
        $q->bindValue(':annee', trim($_POST['annee']));
        $q->bindValue(':url', trim($_POST['url']));
        $q->bindValue(':categorie', $_POST['categorie']);
        $q->bindValue(':resume', trim($_POST['resume']));
        $q->execute();
    }

    public function add() {
        $noPub = $_POST['ID'];
        foreach ($_POST['labo'] as $value) {
            $l=$this->_db->prepare('INSERT INTO labo SET idPub=:idPub,Labo=:labo');
            $l->bindValue(':idPub', $noPub);
            $l->bindValue(':labo', $value);
            $l->execute();
        }
        foreach ($_POST['auteurs'] as $value) {
            $l=$this->_db->prepare('INSERT INTO auteur SET idPub=:idPub,Auteur=:auteur');
            $l->bindValue(':idPub', $noPub);
            $l->bindValue(':auteur', $value);
            $l->execute();
        }
        $q = $this->_db->prepare('INSERT INTO publication SET titre=:titre,domaine=:domaine,editeur=:editeur,annee=:annee,url=:url,categorie=:categorie,resume=:resume,document=:document');
        $q->bindValue(':titre', trim($_POST['titre']));
        $q->bindValue(':domaine', trim($_POST['domaine']));
        $q->bindValue(':editeur', trim($_POST['editeur']));
        $q->bindValue(':annee', trim($_POST['annee']));
        $q->bindValue(':url', trim($_POST['url']));
        $q->bindValue(':categorie', $_POST['categorie']);
        $q->bindValue(':resume', trim($_POST['resume']));
        $document = "";
        for ($i = 0; $i < count($_FILES["fileUpload"]["name"]); $i++) {
            $target_dir = "../../../assets/documents/";

            $target_file = $target_dir . basename($_FILES["fileUpload"]["name"][$i]);
            $uploadOK = 1;
            $documentFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($documentFileType != "doc" && $documentFileType != "docx" && $documentFileType != "pdf" && $documentFileType != "txt") {
                $uploadOK = 0;
                if ($documentFileType != "") {
                    echo "<h3 class='text-center'>Error upload: file " . $i . " - Only DOC,DOCX,PDF and TXT files</h3>";
                    echo "<h3 class='text-center'>Your file was not uploaded</h3>";
                }
            }
            if ($uploadOK != 0) {
                echo "<h3 class='text-center'>Success</h3>";
                move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$i], $target_file);
                $document = $_FILES["fileUpload"]["name"][$i];
            }
            $q->bindValue(':document', $document);
            $q->execute();            
        }
    }
}

?>