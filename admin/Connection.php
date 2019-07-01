
<?php
session_start();
if(isset($_SESSION['id'])){?>
    <meta http-equiv="refresh" content="0;URL=index.php">
    <?php
}
else{ ?>
    <html>
    <head>
        <?php require_once('../back/bddconnect.php'); ?>
    </head>

<body>
<main>
    <div class="grid-container">
    <?php if(!isset($_SESSION['idd'])){
if(isset($_POST['submitConnect'])){
  if (isset($_POST['username']) && isset($_POST['mdp'])){
    $pseudo = htmlspecialchars($_POST['username']);
    $pwd = hash('sha512', htmlspecialchars($_POST['mdp']));
    $rqt = $db->prepare("SELECT * FROM administrateurs WHERE nom = ? AND mdp = ?");
    $rqt->execute(array($pseudo, $pwd));
    $NbUser = $rqt->rowCount();
    if($NbUser == 1){
      $userinfo = $rqt->fetch();
      $_SESSION['id'] = $userinfo['id_admin'];
      $_SESSION['pseudo'] = $userinfo['nom'];?>
    <meta http-equiv="refresh" content="0;index.php" /><?php
    }else{$message="Erreur: Nom d'utilisateur ou mot de passe incorrect";}
    }
    }
    ?>
        <div class="connect">
            <center><a href='index.php'>Retour accueil</a></center>
            <center><form class="flex-form" action="Connection.php" method="post">
                    <input type="text" name="username" placeholder="Identifiant" required>
                    <input type="password" name="mdp" placeholder="Mot de passe" required>
                    <input type="submit" name="submitConnect" value="Valider">
                </form></center>
            <?php if(isset($message)){echo($message);} ?>
        </div>
        </div>
        </main>
        </body>

        </html>
    <?php }}
?>