<?php
$DBHOST='localhost';
$DBNAME='coldemo';
$DBUSER='col.demo';
$DBPSWD='COL*demo71';
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