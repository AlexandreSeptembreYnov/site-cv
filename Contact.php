<?php if(!isset($_SESSION['id'])) {session_start();} ?>
    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>SEPTEMBRE Alexandre</title>
        <?php require_once('back/bddconnect.php'); ?>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
<body>
<?php require_once('nav.php'); ?>

<section id="contact" class="contact-section">
    <br><br><br>
    <div class="center font-contact"><h1>Contact</h1></div>
    <br><br><br>
    <div class='container pt-50 pb-40'>


        <div class='col-sm-12'>
            <div class="contact-form" id="contact_form">
                <form id="form" action="" method="post">
                    <div class='row pt-40'>
                        <div class="col-md-4 col-sm-4 col-xs-12 pb-20">
                            <div class="form-group">
                                <input type="text" name="name" id="name" required="" class="form-control form-style focus-gold" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 pb-20">
                            <div class="form-group">
                                <input type="email" name="email" id="email" required="" class="form-control form-style focus-gold" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 pb-20">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" required="" class="form-control form-style focus-gold" placeholder="Sujet">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control focus-gold" rows="10" name="message" id="message" placeholder="Message"></textarea>
                    </div><!-- /.form-group -->

                    <div class="alert notification"></div><!-- Contact form notification message will be display here -->

                    <div class="align-center pt-0 pb-10">
                        <button type="submit" id="submit" name = "envois" class="btn btn-outlined btn-light ">
                            ENVOIS MESSAGE</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


    </div>
</section>

<?php
 if(isset($_POST["envois"])) {
    $from = htmlspecialchars($_POST["email"]);
    $to = "contact@septembre-alexandre.fr";
    $author = htmlspecialchars($_POST["name"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    $headers = "From:" . $from;
    //Envois a la base de donnée du message pas RGPD
    $q = $db->prepare("INSERT INTO `messages` (`objet`, `contenu`,`name_sender`, `email_source_message`, `dateEnvoi`) VALUES (?,?,?,?, NOW());");
    $q->execute(array($subject,$message,$author,$from,));
     //envois du mail ne fonctionne pas en local
     mail($to,$subject,$message,$headers);
}
?>
</body>
    <?php require_once('footer.php'); ?>
    <?php require_once('js.php'); ?>
</html>
