@echo off
cd /d C:\Users\Admin\TimeCapsule
php artisan schedule:run >> scheduler.log 2>&1
pause

