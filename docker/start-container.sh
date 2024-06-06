#/bin/bash
service apache2 start
touch /var/log/apache2/error.log
chmod -R 777 /var/log/apache2
tail -f /var/log/apache2/*