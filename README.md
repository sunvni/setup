# setup

sudo chown -R [user]:www-data folder

sudo find . -type d -exec chmod 775 {} \;

sudo find . -type f -exec chmod 664 {} \;

laravel:  sudo chgrp -R www-data storage bootstrap/cache
          sudo chmod -R ug+rwx storage bootstrap/cache
vtigercrm:  sudo chgrp -R www-data test storage cache
            sudo chmod -R ug+rwx test storage cache
