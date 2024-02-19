Flreactivation est basé sur un serveur php mysql

# Installation serveur Php mysql

## windows
https://www.wampserver.com/

## linux (raspeberry)
Installer Raspberry Pi Imager : https://www.raspberrypi.com/software/
![2024-02-19_14h12_38](https://github.com/fleothaud/flreactivation/assets/16253157/3bff484e-0992-48ca-816d-ce103b9099b0)

![2024-02-19_14h13_30](https://github.com/fleothaud/flreactivation/assets/16253157/403e2b73-c5c4-4acf-ab08-e8966531fa2d)

![2024-02-19_14h16_18](https://github.com/fleothaud/flreactivation/assets/16253157/448d9662-84c4-4012-b2d9-7ae1c2424434)

![2024-02-19_14h17_17](https://github.com/fleothaud/flreactivation/assets/16253157/e0f3e082-a477-4e2e-b6de-99cb6dc777b7)

![2024-02-19_14h18_12](https://github.com/fleothaud/flreactivation/assets/16253157/e0fdcde4-e93a-4dfc-9287-34570162059c)


**Pour activer l'accès ssh au raspeberry, créer à la racine de la carte SD un fichier vide nommé ssh**

### Premier dé
introduire la carte sd dans le raspeberry Pi connecté au réseau et demarrer

### Connexion SSH
ssh fladmin@flreactivation

saisir le mot de passe configuré à la création de l'image

sudo su

apt update -y

apt full-upgrade -y

apt install apache2 php libapache2-mod-php mariadb-server php-mysql zip git php-curl php-gd php-intl php-json php-mbstring php-xml -y

apt install phpmyadmin

Lors de l'installation, il vous sera posé quelques questions auxquelles il faut répondre avec soin :

Choisir le serveur web à configurer automatiquement (utiliser les flèches du clavier ou la touche tab pour se déplacer et la barre d'espace pour sélectionner/désélectionner) :
Le surlignage rouge n'est pas une sélection, il faut que ça affiche une étoile * entre les crochets, en utilisant la barre d'espace


![screenshot_20171028_125829](https://github.com/fleothaud/flreactivation/assets/16253157/bc5ef7e4-cbb7-4fd7-b4ee-26e27fd876ea)
Créer la base de données phpmyadmin : oui

![screenshot_20171028_112911](https://github.com/fleothaud/flreactivation/assets/16253157/dade38ad-f0d9-426d-8bb8-9a87eee2a3c6)
Définir un mot de passe pour l'utilisateur MySQL phpmyadmin :

![screenshot_20171028_112939](https://github.com/fleothaud/flreactivation/assets/16253157/997c5731-399d-440e-bb67-d62bc4144902)
Indiquer le mot de passe de l'utilisateur MySQL « root » tel que défini à l'installation de mysql-server :
![screenshot_20171028_113015](https://github.com/fleothaud/flreactivation/assets/16253157/316a3ab6-728c-4af9-b266-8106460b20ef)


Création administrateur  pour acces phpmyadmin

sudo mysql
Création de l'utilisateur fladmin

CREATE USER 'fladmin'@'localhost' IDENTIFIED BY 'password';

Attribution de tous les privilèges

GRANT ALL PRIVILEGES ON *.* TO 'fladmin'@'localhost'; 

Appliquer les modifications

FLUSH PRIVILEGES; 

QUIT;

Acces phpmyadmin : http://adresse_ip/phpMyAdmin


## Installation FLRéactivation

cd /var/www/html/

sudo git clone https://github.com/fleothaud/flreactivation.git

sudo chown -R www-data:www-data /var/www/html/flreactivation


sudo mysql

CREATE DATABASE flreactivation; 

mysql -u fladmin -p flreactivation < /var/www/html/flreactivation/_install/flreactivation.sql

saisir le mot de passe de l'utilisateur fladmin

acceder à la page d'acces à FLréactivation : http://adresse_ip_raspeberry/flreactivation/



