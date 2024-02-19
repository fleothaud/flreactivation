<?php
$DBHOST='localhost';
$DBNAME='flreactivation';
$DBUSER='fladmin';
$DBPSWD='password';
try
{
    $bdd = new PDO('mysql:host='.$DBHOST.';dbname='.$DBNAME, $DBUSER, $DBPSWD);
}
catch(PDOException $e){
    printf('Échec de la connexion');
    echo '<br>';
    printf('message erreur system: %s', $e->getMessage());
    exit();
}
