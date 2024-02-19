# FLRéactivation

FLRéactivation est une application basée sur un serveur PHP et MySQL, pouvant être facilement déployée sur différentes plateformes.

## Installation du serveur PHP et MySQL


### Sur Linux (Raspberry Pi)

Pour installer sur un Raspberry Pi, commencez par télécharger et installer le Raspberry Pi Imager :

- [Télécharger Raspberry Pi Imager](https://www.raspberrypi.com/software/)

Suivez les instructions d'installation fournies par l'outil. Voici quelques captures d'écran pour vous guider dans le processus :

![Étape 1](https://github.com/fleothaud/flreactivation/assets/16253157/3bff484e-0992-48ca-816d-ce103b9099b0)
![Étape 2](https://github.com/fleothaud/flreactivation/assets/16253157/403e2b73-c5c4-4acf-ab08-e8966531fa2d)
![Étape 3](https://github.com/fleothaud/flreactivation/assets/16253157/448d9662-84c4-4012-b2d9-7ae1c2424434)
![Étape 4](https://github.com/fleothaud/flreactivation/assets/16253157/e0f3e082-a477-4e2e-b6de-99cb6dc777b7)
![Étape 5](https://github.com/fleothaud/flreactivation/assets/16253157/e0fdcde4-e93a-4dfc-9287-34570162059c)

**Activer SSH :** Pour permettre l'accès SSH au Raspberry Pi, créez un fichier vide nommé `ssh` à la racine de la carte SD.

### Configuration initiale

1. Insérez la carte SD dans le Raspberry Pi connecté au réseau et démarrez-le.
2. Connectez-vous en SSH en utilisant la commande `ssh fladmin@flreactivation`, puis entrez le mot de passe configuré lors de la création de l'image.
3. obtenez l'adresse ip du raspeberry avec `ip -c a`
4. Exécutez les commandes suivantes pour mettre à jour le système et installer les composants nécessaires :

   ```bash
   sudo su
   apt update -y
   apt full-upgrade -y
   apt install apache2 php libapache2-mod-php mariadb-server php-mysql zip git php-curl php-gd php-intl php-json php-mbstring php-xml -y
   apt install phpmyadmin
   ```

### Configuration de phpMyAdmin

Lors de l'installation de phpMyAdmin, répondez avec soin aux questions posées, notamment pour choisir le serveur web à configurer et définir les mots de passe pour les utilisateurs MySQL.

![Configuration phpMyAdmin](https://github.com/fleothaud/flreactivation/assets/16253157/bc5ef7e4-cbb7-4fd7-b4ee-26e27fd876ea)

### Création d'un utilisateur administrateur pour phpMyAdmin

```sql
sudo mysql
CREATE USER 'fladmin'@'localhost' IDENTIFIED BY 'votre mot de passe pour fladmin';
GRANT ALL PRIVILEGES ON *.* TO 'fladmin'@'localhost';
FLUSH PRIVILEGES;
QUIT;
```

Accédez à phpMyAdmin via : `http://adresse_ip_raspberry/phpMyAdmin`, login:fladmin et mp:votre mot de passe pour fladmin

## Installation de FLRéactivation

1. Clonez le dépôt dans le répertoire web :

   ```bash
   cd /var/www/html/
   sudo git clone https://github.com/fleothaud/flreactivation.git
   sudo chown -R www-data:www-data /var/www/html/flreactivation
   ```

2. Créez la base de données et importez les tables :

   ```sql
   sudo mysql
   CREATE DATABASE flreactivation;
   exit;
   mysql -u fladmin -p flreactivation < /var/www/html/flreactivation/_install/flreactivation.sql
   ```

Entrez le mot de passe de l'utilisateur `fladmin` lorsque vous y êtes invité.

3. Accédez à FLRéactivation via `http://adresse_ip_raspberry/flreactivation/`

### Sur Windows

Pour installer un serveur PHP et MySQL sur Windows, téléchargez et installez WampServer depuis le site officiel :

- [Télécharger WampServer](https://www.wampserver.com/)

## Configuration de l'appli FLREACTIVATION

1. Configuration acces administrateur

- En ligne de commande :
sudo mysql -u fladmin -p
saisir le mot de passe
USE flreactivation;
INSERT INTO `flr_users` (`login`, `password`, `statut`) VALUES ('login_admin', 'pass_admin', 'admin');

- Depuis phpMyAdmin
![2024-02-19_16h38_16](https://github.com/fleothaud/flreactivation/assets/16253157/3354ca42-9198-4279-bdaa-7e13a3f957dd)

   

