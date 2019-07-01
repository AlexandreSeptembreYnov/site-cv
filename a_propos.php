<?php if(!isset($_SESSION['id'])) {session_start();} ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>A Propos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <?php require_once('back/bddconnect.php'); ?>
</head>
<body>
<?php require_once('nav.php'); ?>
<div class="container-fluid" id="info">
    <div class="row">
        <div class="col-sm-6 backg">
            <img src="image/test.jpg" alt="photo alexandre Septembre">
        </div>
        <div class="col-sm-6 back-ap-d">
            <div class="flex-row">
            <center>
                <h1>A PROPOS</h1>
                <br><br>
                Je me nomme Septembre Alexandre, Habitant d'Aix en Provence<br> et étudiant en première année de bachelor à Ynov aix en informatique<br> Je suis beaucoups attiré par le développement logiciel et le développement WEB <br>
                <br><br>
            </center>
            </div>
            <div class="flex-row">
                <center><h2>Compétence</h2></center>
            </div>
            <div class="apropo2">
            <?php
            $rqtcp = $db->prepare('SELECT * FROM competences');
            $rqtcp->execute();
            $i = 0;
            while($datas = $rqtcp->fetch()){
                $i++;
                if ($i == 1){echo("<div class=\"competance\">");}
                        echo("<strong>".$datas['comp']." : </strong>");
                        for ($j = 0; $j < $datas['niveau']; $j++) {
                            echo("<i class='fas fa-star'></i>");
                        }
                        for ($j = 0; $j < (5 - $datas['niveau']); $j++) {
                            echo("<i class='far fa-star'></i>");
                        }
                        echo("<br><br>");
                if ($i == 4){echo("</div>");$i = 0;;}
                } ?>
            </div>
            </div>

            <div class="flex-row">
                <center><h2>Expérience et étude</h2></center>
            </div>

                <?php
                $rqtex = $db->prepare('SELECT * FROM experiences');
                $rqtex->execute();
                while($data = $rqtex->fetch()){
                ?>
                        <div class="center"><strong><?php echo $data['exp']; ?></strong><p>du <?php echo $data['dateDebut']; ?> au <?php echo $data['dateFin']; ?> a <?php echo $data['nomEntreprise']; ?></p>
                        <p><?php echo $data['description']; ?></p></div>
                <?php } ?>
            <div class="center">
                <a href="Portfolio.php" class="btn btn-primary btn-lg active  " role="button" aria-pressed="true">Portfolio</a>

            </div>
        </div>
    </div>
</div>
</div>
</body>
<?php require_once('footer.php'); ?>
<?php require_once('js.php'); ?>
</html>