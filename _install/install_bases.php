<?php require('../config.php');

$data = [
    'CREATE TABLE IF NOT EXISTS flr_niveaux ( 
        id   INT AUTO_INCREMENT,
        nom_niveau  VARCHAR(30) NOT NULL,
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

$data = [
    'CREATE TABLE IF NOT EXISTS flr_classes ( 
        id   INT AUTO_INCREMENT,
        nom_classe  VARCHAR(30) NOT NULL,
        nom_niveau  VARCHAR(30) NOT NULL,
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

$data = [
    'CREATE TABLE IF NOT EXISTS flr_disciplines ( 
        id   INT AUTO_INCREMENT,
        nom_discipline  VARCHAR(30) NOT NULL,
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

$data = [
    'CREATE TABLE IF NOT EXISTS flr_data ( 
        id   INT AUTO_INCREMENT,
        question  LONGTEXT NOT NULL,
        reponse LONGTEXT NOT NULL,
        nom_discipline  VARCHAR(30) NOT NULL,
        nom_niveau  VARCHAR(30) NOT NULL,
       
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

$data = [
    'CREATE TABLE IF NOT EXISTS flr_cartes ( 
        id   INT AUTO_INCREMENT,
        id_data INT NOT NULL,
        mise_en_ligne INT NULL,
        afficher_reponse INT NOT NULL DEFAULT 0,
        nom_classe  VARCHAR(30) NOT NULL,
        date_reac INT NULL,
        nb_reac INT NULL,
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

$data = [
    'CREATE TABLE IF NOT EXISTS flr_reactivations ( 
        id   INT AUTO_INCREMENT,
        id_carte INT NOT NULL,
        nb_reac  INT NOT NULL,
        date_reac INT NULL,
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

$data = [
    'CREATE TABLE IF NOT EXISTS flr_parametres_reactivations ( 
        id   INT AUTO_INCREMENT,
        num_reac INT NOT NULL,
        duree_reac  INT NOT NULL,
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

$data = [
    'CREATE TABLE IF NOT EXISTS flr_users ( 
        id   INT AUTO_INCREMENT,
        login  VARCHAR(30) NOT NULL,
        password  VARCHAR(30) NOT NULL,
        statut VARCHAR(30) NULL,
        PRIMARY KEY(id)
    );'];
foreach ($data as $item) {$bdd->exec($item);}

header('location:../index.php');

