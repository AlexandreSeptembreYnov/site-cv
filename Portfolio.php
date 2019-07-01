<?php if(!isset($_SESSION['id'])) {session_start();} ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php require_once('back/bddconnect.php'); ?>
</head>
<body  class="fond-Port">

<?php require_once('nav.php'); ?>
        <div class="center title-white"><h1>Portfolio</h1></div>
<div class="cards-list">
    <?php
    $rqtpro = $db->prepare('SELECT * FROM projet');
    $rqtpro->execute();
    while($data = $rqtpro->fetch()) {
    }
    ?>
    <div class="card">
        <div class="card_image">
            <a href="<?php mb_strtolower($data['titre'])?>.php"><img src="<?php $data['image']?>" /></a>
        </div>
        <div class="card_title title-white">
            <p><?php $data['titre']?></p>
        </div>
    </div>
</div>

</body>
<?php require_once('footer.php'); ?>
<?php require_once('js.php'); ?>
</html>