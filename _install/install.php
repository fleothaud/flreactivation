<?php 
?>
<!DOCTYPE html >
<html lang="fr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/flr_css.css">
<script type="text/javascript" src="js/flr_js.js"></script>
<link rel="stylesheet" href="css/tinymce.css">
<script src="tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="js/tynimce_perso.js" referrerpolicy="origin"></script>



<title>FLRéactivation</title>
<div align="center">
    <h1> Bienvenue sur la page d'installation de FLRéactivation</h1>
</div>
<div>

<form method='POST' action="install.php">
	<fieldset >
    <legend>Paramètre de connexion à votre base de donnée Mysql</legend>
	<br>
        Adresse de la base: 
	    <input type='text' name='DBHOST' >
    </br>
    <br>
        Nom de la base :
        <input type='text' name='DBNAME' >
    </br>
    <br> 
        Nom d'utilisateur :  
        <input type='text' name='DBUSER' >
    </br>
    <br>
        Mot de passe :
        <input type='password' name='DBPSWD' >
    </br>
    <br>
        <input type='submit' value='valider' name='valider' >
    </br>

 
	</fieldset>
</form>


<?php
if(isset($_POST['valider']))
{
    $DBHOST=$_POST['DBHOST'];
    $DBNAME=$_POST['DBNAME'];
    $DBUSER=$_POST['DBUSER'];
    $DBPSWD=$_POST['DBPSWD'];

    try
    {
        $bdd = new PDO('mysql:host='.$DBHOST.';DBNAME='.$DBNAME, $DBUSER, $DBPSWD);
    }
    catch(PDOException $e){
        printf('Échec de la connexion');
        echo '<br>';
        printf('message erreur system: %s', $e->getMessage());
        exit();
    }
    
$config = [];
$config[]="<?php";
$config[]="\$DBHOST='$DBHOST';";
$config[]="\$DBNAME='$DBNAME';";
$config[]="\$DBUSER='$DBUSER';";
$config[]="\$DBPSWD='$DBPSWD';";
$config[]="try";
$config[]="{";
$config[]="    \$bdd = new PDO('mysql:host='.\$DBHOST.';dbname='.\$DBNAME, \$DBUSER, \$DBPSWD);";
$config[]="}";
$config[]="catch(PDOException \$e){";
$config[]="    printf('Échec de la connexion');";
$config[]="    echo '<br>';";
$config[]="    printf('message erreur system: %s', \$e->getMessage());";
$config[]="    exit();";
$config[]="}";

   
        
        if(file_put_contents('../config.php', implode("\r\n",$config) , LOCK_EX)==false)
        {
            echo 'Impossible de sauvegarder, veuillez modifier le fichier config.php'.'<br/>';
        }
        else
        {
            echo 'données de connexion enregistrée dans config.php'.'<br/>';
            header('location:install_bases.php'); 
        }
               
}

?>
</div>