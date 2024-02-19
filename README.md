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


Pour activer l'accès ssh au raspeberry, creer à la racine de la carte SD un fichier vide nommé ssh


introduire la carte sd dans le raspeberry, trouver son adresse ip

sudo apt install apache2 php libapache2-mod-php mariadb-server php-mysql zip git php-curl php-gd php-intl php-json php-mbstring php-xml -y

sudo chown www-data:www-data /var/www/ -R

sudo mysql

Puis on créé une base de données `site1DB` associée à un utilisateur `userSite1` (en remplaçant `mot_de_passe` par un mot de passe complexe) :

CREATE DATABASE flreactivation; 

CREATE USER 'fladmin'@'localhost' IDENTIFIED BY 'password'; 

modifier mp 

ALTER USER 'fladmin'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON \*.\* TO 'fladmin'@'localhost'; 

FLUSH PRIVILEGES; 

QUIT;

#### Création répertoire flreactivation et affectation droits

cd /var/www/html/

sudo git clone https://github.com/fleothaud/flreactivation.git

sudo chown -R www-data:www-data /var/www/flreactivation

nano /etc/apache2/sites-available/flreactivation.conf

Hote virtuel

```
nano /etc/apache2/sites-available/flreactivation.conf
```

sudo wget https://files.phpmyadmin.net/phpMyAdmin/5.2.1/phpMyAdmin-5.2.1-all-languages.zip

sudo unzip phpMyAdmin-5.2.1-all-languages.zip

sudo mv phpMyAdmin-5.2.1-all-languages phpmyadmin

sudo mv phpmyadmin /var/www/html/

sudo rm phpMyAdmin-5.2.1-all-languages.zip

## Creer un repertoire pour le projet à la racine d'un serveur web, php, mysql

`git clone https://github.com/fleothaud/flreactivation.git`

## Editer config.php et renseigner les paramètres de votre configuration :

```
$DBHOST='localhost';
DBHOST=′localhost′;$DBNAME='coldemo';
$DBUSER='col.demo';
DBUSER=′col.demo′;$DBPSWD='COL*demo71';
```

## Installer les tables à l'aide de ./install/flreactivation.sql

executer ./install/flreactivation.sql

## Configurer les identifiants admin dans la table flr_users
