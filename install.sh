#!/bin/bash

sudo apt-get update -y

sudo apt-get install python-software-properties -y
sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get update -y
sudo apt-get install php7.2 -y
sudo apt-get install php-pear php7.2-curl php7.2-dev php7.2-sqlite3 php7.2-pgsql -y
sudo apt-get install php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml -y

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer

#sudo apt-get install postgresql-9.5 -y
#sudo sed -i "s/#listen_address.*/listen_addresses '*'/" /etc/postgresql/9.5/main/postgresql.conf
#sudo echo "host    all    all    0.0.0.0/0    md5" | sudo tee --append /etc/postgresql/9.5/main/pg_hba.conf
#sudo su postgres -c "psql -c \"CREATE ROLE vagrant SUPERUSER LOGIN PASSWORD 'vagrant'; \" "
#sudo su postgre -c "psql -c \"CREATE DATABASE myproject OWNER vagrant;\""
#sudo /etc/init.d/postgresql restart

sudo timedatectl set-timezone America/Fortaleza
export TZ=America/Fortaleza
