<div id="anomalies"><br/><br/>
    <h2 class="text-center">Anormalies</h2>
    <h3 class="page-header">Même Titre</h3>
    <ol>
        <?php
        include("$_SERVER[DOCUMENT_ROOT]/config.php");
        $conn = new config();
        $q = $conn->_db->query("SELECT p1.Titre FROM publication AS p1, publication AS p2 WHERE p1.Titre = p2.Titre and p1.NoPub>p2.NoPub");
        while ($titre = $q->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li ng-repeat="x in pub|filter:{'Titre': '<?php echo $titre['Titre']; ?>'}">
                <span info-general></span>
            </li>
            <?php
        }
        ?>
    </ol>
    <h3 class="page-header">Même Document</h3>
    <ol>
        <?php
        $q = $conn->_db->query("SELECT p1.Document FROM publication AS p1, publication AS p2 WHERE p1.Document = p2.Document and p1.Document!='VIDE' and p1.NoPub>p2.NoPub");
        while ($document = $q->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li ng-repeat="x in pub|filter:{'Document': '<?php echo $document['Document']; ?>'}">
                <span info-general></span>
            </li>
            <?php
        }
        ?>
    </ol>
</div>