@echo off
echo Syncing PHP files and refreshing theme...

REM Step 1: Sync PHP files
echo 1. Syncing PHP files to container...
docker cp header.php bonyan-wordpress-1:/var/www/html/wp-content/themes/bonyan/header.php
docker cp footer.php bonyan-wordpress-1:/var/www/html/wp-content/themes/bonyan/footer.php
docker cp functions.php bonyan-wordpress-1:/var/www/html/wp-content/themes/bonyan/functions.php
docker cp template-parts bonyan-wordpress-1:/var/www/html/wp-content/themes/bonyan/
docker cp inc bonyan-wordpress-1:/var/www/html/wp-content/themes/bonyan/

REM Step 2: Switch to default theme and back to force refresh
echo 2. Refreshing theme in WordPress...
docker exec bonyan-db-1 mysql -u root -prootpassword -e "USE wordpress; UPDATE wp_options SET option_value = 'twentytwentyfour' WHERE option_name = 'template'; UPDATE wp_options SET option_value = 'twentytwentyfour' WHERE option_name = 'stylesheet';"

timeout /t 2 /nobreak >nul

docker exec bonyan-db-1 mysql -u root -prootpassword -e "USE wordpress; UPDATE wp_options SET option_value = 'bonyan' WHERE option_name = 'template'; UPDATE wp_options SET option_value = 'bonyan' WHERE option_name = 'stylesheet';"

REM Step 3: Clear all caches
echo 3. Clearing caches...
docker exec bonyan-wordpress-1 php -r "opcache_reset();"

echo.
echo ✅ Theme refreshed successfully!
echo ✅ Your PHP changes should now be visible at: http://localhost:8080
echo.
pause 