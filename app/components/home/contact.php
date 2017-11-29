<div class='row'>
    <div class='col-xs-2'></div>
    <div class='col-xs-10'>
        <h4 class="text-center">CONTACT</h4><br/>
        <form action="" method="POST">
            <div class="form-group">
                <label  for="civil">Civilité:</label>
                <input type="radio"  name="civil" value='Madame'>Madame</input>
                <input type="radio"  name="civil" value='Monsieur'>Monsieur</input>
            </div>
            <div class="form-group">
                <label for="nom">Nom: </label>
                <input type="text" class="form-control" name="nom" required></input>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control" id="email" required></input>
            </div>
            <div class="form-group">
                <label for="header">Téléphone: </label>
                <input type="text" class="form-control" id="header" required></input>
            </div>
            <div class="form-group">
                <label for="message">Votre message: </label>
                <textarea class="form-control"  rows="4" name="message" required></textarea>
            </div>
            <div class="form-group pull-right">
                <input type="submit" name="submit" class="btn btn-primary" value="Envoyer">
            </div>
        </form>
    </div>
</div>
