
<?php
if(!isset($_SESSION['id'])) {session_start();}
if(!isset($_SESSION['id'])){?>
<meta http-equiv="refresh" content="0;URL=Connection.php">
<?php
}
else{?>
<html>
<head>
    <?php require_once("../back/bddconnect.php");?>
</head>
<body>
<h1>Competances</h1>
<h2>Ajout</h2>
<form action="index.php" method="post">
<label for="nom_comp">entrée le nom d'une nouvelle compétence</label>
<input type="text" name="nom_comp">
<label for="niveau">votre niveau :</label>

<select name="niveau">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    <option value=5>5</option>
</select>
<button type="submit" name="submitAjoutComp">Ajoute</button>
</form>
<?php
if(isset($_POST['submitAjoutComp'])){
    if($_POST['nom_comp'] == ''){
        $_POST['nom_comp'] = NULL;
    }
if(isset($_POST['nom_comp']) && isset($_POST['niveau']) ) {
$nomComp = htmlspecialchars($_POST['nom_comp']);
$level = htmlspecialchars($_POST['niveau']);
$rqt = $db->prepare('SELECT * FROM competences WHERE comp = ?');
$rqt->execute(array($nomComp));
$compExists = $rqt->rowcount();
if($compExists == 0){
$rqt = $db->prepare('INSERT INTO competences(comp,niveau) VALUES (?, ?)');
$rqt->execute(array($nomComp,$level));
$messageAdd='La compétence a bien été ajoutée';
}
else{$messageAdd='Une compétence similaire existe déjà.';}
}
else{$messageAdd='<script>alert("Veuillez remplir tous les champs")</script>';}
    echo ($messageAdd);
}

?>

<h2>Supression</h2>
<form action="index.php" method="post">
    <label for="niveau">votre niveau :</label>

    <select name="id_comp">
        <?php
        $rqtcp = $db->prepare('SELECT * FROM competences');
        $rqtcp->execute();
        while($datas = $rqtcp->fetch()) {
            echo "<option value='" . $datas['id_comp']  . "'>" . $datas['comp'] . "</option>";
        }
        ?>
    </select>
    <button type="submit" name="submitSupComp">Suprimmé</button>
</form>
<?php
if(isset($_POST['submitSupComp'])){
if(isset($_POST['id_comp'])){
$idCompetance=$_POST['id_comp'];
$rqt = $db->prepare('DELETE FROM competences WHERE id_comp = ?');
$rqt->execute(array($idCompetance));
$messageDel = "La compétence a bien été supprimée.";
}else{$messageDel='<script>alert("Veuillez sélectionner une compétence à supprimer")</script>';}
}
?>

<h1>Experiences</h1>
<form action="index.php" method="post">
    <label for="nom_experiance">entrée le nom du poste</label>
    <input type="text" name="nom_experiance">
    <label for="description">expliquer votre poste</label>
    <textarea name="description"></textarea>
    <label for="nomEntreprise">Où vous avez travaillé ?</label>
    <input type="text" name="nomEntreprise">
    <label for="dateDebut">Quand avez vous commencé ?</label>
    <input type="date" name="dateDebut">
    <label for="dateFin">Quand avez vous fini ?</label>
    <input type="date" name="dateFin">
    <button type="submit" name="submitAjoutExp">Ajoute</button>
</form>
<?php
if(isset($_POST['submitAjoutExp'])){
    if($_POST['nom_experiance'] == ''){$_POST['nom_experiance'] = NULL;}
    if($_POST['description'] == ''){$_POST['description'] = NULL;}
    if($_POST['nomEntreprise'] == ''){$_POST['nomEntreprise'] = NULL;}
    if($_POST['dateDebut'] == ''){$_POST['dateDebut'] = NULL;}
    if($_POST['dateFin'] == ''){$_POST['dateFin'] = NULL;}
    if(isset($_POST['nom_experiance']) && isset($_POST['description']) && isset($_POST['nomEntreprise']) && isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
        $nomExp = htmlspecialchars($_POST['nom_experiance']);
        $description = htmlspecialchars($_POST['description']);
        $nomEntreprise = htmlspecialchars($_POST['nomEntreprise']);
        $dateDebut = ($_POST['dateDebut']);
        $dateFin = ($_POST['dateFin']);
        $rqt = $db->prepare('SELECT * FROM experiences WHERE exp = ? AND nomEntreprise = ?');
        $rqt->execute(array($nomExp,$description));
        $ExpExists = $rqt->rowcount();
        if($ExpExists == 0){
            $rqt = $db->prepare('INSERT INTO experiences(exp,description,nomEntreprise,dateDebut,dateFin) VALUES (?, ?, ?, ?, ?)');
                $rqt->execute(array($nomExp,$description,$nomEntreprise,$dateDebut,$dateFin));
                $messageAdd1='L éxperiance a bien été ajoutée';}
        else{$messageAdd1='Une éxperiance similaire existe déjà.';}
    }
    else{$messageAdd1='<script>alert("Veuillez remplir tous les champs")</script>';}
     echo ($messageAdd1);
}
?>
<h2>Suppression</h2>
<form action="index.php" method="post">
    <label for="experiance">Selectionné une expériance</label>

    <select name="id_exp">
        <?php
        $rqtexp = $db->prepare('SELECT * FROM experiences');
        $rqtexp->execute();
        while($data = $rqtexp->fetch()) {
            var_dump($data);
            echo "<option value='" . $data['id_exp']  . "'>" . $data['exp'] . "</option>";
        }
        ?>
    </select>
    <button type="submit" name="submitSupExp">Suprimmé</button>
</form>
        <?php
        if(isset($_POST['submitSupExp'])){
            if(isset($_POST['id_exp'])){
                $idExperiance = $_POST['id_exp'];
                $rqt = $db->prepare('DELETE FROM experiences WHERE id_exp = ?');
                $rqt->execute(array($idExperiance));
                $messageDel = "L'experiance a bien été supprimée.";
            }else{$messageDel='<script>alert("Veuillez sélectionner une experiance à supprimer")</script>';}
        }
        ?>

<h1>Projet </h1>
<form action="index.php" method="post">
    <label for="nom_projt">entrée le nom du projet</label>
    <input type="text" name="nom_projet">
    <label for="description">Texte dans votre projet</label>
    <textarea name="description"></textarea>
    <label for="lien-git">lien git?</label>
    <input type="text" name="lien-git">
    <label for="image">entrée une image</label>
    <input type="file" name="imageProjet" accept="image/jpg">

    <button type="submit" name="submitAjoutProjet">Ajoute</button>
</form>
<?php
if(isset($_POST['submitAjoutProjet'])){
    if(isset($_POST['nom_projet']) && isset($_POST['description']) && isset($_POST['lien-git'])) {
        $nomProjet = htmlspecialchars($_POST['nom_projet']);
        var_dump($nomProjet);
        $description = htmlspecialchars($_POST['description']);
        $lien = ($_POST['lien-git']);
        $uploadDir = "../image/";
        $nameFile = mb_strtolower($_POST['nom_projet']);
        $uploaddirfile = $uploadDir . $nameFile . ".jpg";
        $rqt = $db->prepare('SELECT * FROM projet WHERE titre = ?');
        $rqt->execute(array($_POST['nom_projet']));
        $proExists = $rqt->rowcount();
        var_dump($nomProjet);
        if ($proExists == 0) {
            move_uploaded_file($_FILES['imageProjet'], $uploaddirfile);
            $rqt = $db->prepare('INSERT INTO projet(titre,texte,image,lien,dateAjout) VALUES (?, ?, ?, ?, NOW())');
            $rqt->execute(array($nomProjet, $description, $uploaddirfile, $lien));
            $newPage = fopen( "../".$nameFile . ".php", "w");
            $messageAdd = "L'expérience a bien été ajoutée";
            $pageproject = "<?php{session_start();} ?><!DOCTYPE html><html lang='fr' dir='ltr'><head><meta charset='UTF-8'><title>SEPTEMBRE Alexandre</title><link rel='stylesheet' type='text/css' href='style.css'><link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'><script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script><script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script></head><body><?php require_once('nav.php'); ?><div id='content' class='container'></div><div class='container.fluide'><div class='row'><div class='col-sm-6 back-ap-d'><img class='imgphoto' src='image/$uploaddirfile' alt='image projet'></div><div class='col-sm-6 backd'><div class='centreY'><div class='center'><h1>$nomProjet</h1><br><br>$description<br><br><a href='$lien' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>GITHUB</a></div></div></div></div></div></body><?php require_once('footer.php'); ?><?php require_once('js.php'); ?></html>";
            fwrite($newPage, $pageproject);
            fclose($newPage);
        }
    }
       }
?>
<h2>Suppression</h2>
<form action="index.php" method="post">
    <label for="projet">Selectionné un projet </label>

    <select name="id_projet">
        <?php
        $rqtpro = $db->prepare('SELECT * FROM projet');
        $rqtpro->execute();
        while($data = $rqtpro->fetch()) {
            echo "<option value='" . $data['titre']  . "'>" . $data['titre'] . "</option>";
        }
        ?>
    </select>
    <button type="submit" name="submitSupProject">Suprimmé</button>
</form>
<?php
if(isset($_POST['submitSupProject'])){
    if(isset($_POST['id_projet'])){
        $idProjet = $_POST['id_projet'];
        $rqt = $db->prepare('DELETE FROM projet WHERE titre = ?');
        $rqt->execute(array($idProjet));
        unlink("../".mb_strtolower($idProjet).".php");
        $messageDel = "Le projet a bien été supprimée.";
    }else{$messageDel='<script>alert("Veuillez sélectionner un projet à supprimer")</script>';}
}
?>
<h1>Message</h1>
<?php
$rqtmess = $db->prepare('SELECT * FROM message');
$rqtmess->execute();
while($data = $rqtmess->fetch()){
    ?>
    <h3><?php $data["objet"]?></h3>
    <br>
    <p><?php $data["contenu"]?></p>
    <br>
    <i> écris par <?php $data["name_sender"]?> avec l'adresse email <?php $data["email_source_message"] ?> a <?php $data["dateEnvoi"]?></i>
<?php } ?>
</body>

</html>
<?php } ?>