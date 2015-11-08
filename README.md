# CMHL  

This is the main code base for CMHL - a simulation hockey league currently using SimonT Hockey Sim  

To make CMHL work, you will need    

  * nginx (apache is likely fine)  
  * php 5.4+  
  * postgresql (mysql will _probably_ work too)  
  * composer
  * SparkFun's open source library **[SparkLib](https://github.com/sparkfun/SparkLib)**, installed using Composer  


Composer Instructions:  

  * Installing in /var/www : php -r "readfile('https://getcomposer.org/installer');" | php  
  * Make sure the composer.json file is there, and then  
  * php composer.phar install  
  * config/cmhl.rc.php will then point the application to /vendor/autoload.php  


Application expects:  
  * lib/classes/CMHL.php  
  * lib/classes/CMHL/Index.php  
  * lib/templates/cmhl/layouts/default.tpl.php 

