#!/bin/bash

while true; do
    read -p "Do you wish to install this program?" yn
    case $yn in
        [Yy]* ) break;;
        [Nn]* ) exit;;
        * ) echo "Please answer yes or no.";;
    esac
done

cp -n .env.example .env

echo "Input database port:"
read vardbport
echo "Input database name:"
read vardbname
echo "Input database user:"
read vardbuser
echo "Input database password:"
read vardbpass
echo "Input application port for nginx:"
read varsiteport

sed -i "s/DB_HOST=127.0.0.1/DB_HOST=db/" .env
sed -i "s/DB_PORT=3306/DB_PORT=$vardbport/" .env
sed -i "s/DB_DATABASE=laravel/DB_DATABASE=$vardbname/" .env
sed -i "s/DB_USERNAME=root/DB_USERNAME=$vardbuser/" .env
sed -i "s/DB_PASSWORD=/DB_PASSWORD=$vardbpass/" .env
sed -i "s/APPLICATION_PORT=/APPLICATION_PORT=$varsiteport/" .env

chown -R 1000:1000 .

