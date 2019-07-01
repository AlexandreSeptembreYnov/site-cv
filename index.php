<?php if(!isset($_SESSION['id'])) {session_start();} ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>SEPTEMBRE Alexandre</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once('nav.php'); ?>
<div id="content" class="container">
</div>
<div class="container.fluide">
    <div class="row">
    <div class="col-sm-6 backg">
        <div class="centreY">
        <div class="center">
            <h1>A PROPOS</h1>
            <br><br>
            Bienvenue dans mon site Web. Dans cette catégorie il y a tous<br>se qui fautsavoir sur mes compétences et mes experiences<br>

            <br><br>
            <a href="a_propos.php" class="btn btn-primary btn-lg active" role="button">A Propos</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6 backd">
        <div class="centreY">
        <center>
            <h1>PORTFOLIO</h1>
            <br><br>
            Bienvenue dans mon site Web. Dans cette catégorie il y a<br>tous les projets que j'ai realisé qui y sont listé
            <br><br>
            <a action="Portfolio.php" class="btn btn-primary btn-lg active" role="button1">Portfolio</a>
        </center>
        </div>
    </div>
</div>

</div>

</body>
<?php require_once('footer.php'); ?>
<?php require_once('js.php'); ?>
</html>