apt update && apt upgrade;

apt install apache2 mysql-server php phpmyadmin php-mbstring php-zip php-gd php-json php-curl;

ufw allow Apache && systemctl enable apache2;

systemctl start mysql.service;

mysql_secure_installation

#ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'root';

systemctl restart apache2