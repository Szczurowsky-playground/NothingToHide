<p align="center">
  <img 
    src="https://i.imgur.com/BFx57B5.png" 
    width="120px"
    alt="Logo">
</p>

# NothingToHide
> Framework which collects lot of data from user browser and IP adress. NTH include things such as routing, login and register form, stores data in safe format in database.

## About
Welcome dear user, NTH for this time does not support laravel, symfony etc. It's build on it's own basic framework. NTH have basic functionality like routing, login/register and logs all important data about login.
## Screenshots
Soon
## Built with

<p align="left">
<img src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/php/php.png" alt="PHP" height="40" style="vertical-align:top; margin:4px">
<img src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/javascript/javascript.png" alt="Javascript" height="40" style="vertical-align:top; margin:4px">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/AJAX_logo_by_gengns.svg/1280px-AJAX_logo_by_gengns.svg.png" alt="Ajax" height="40" style="vertical-align:top; margin:4px">
<img src="https://upload.wikimedia.org/wikipedia/commons/f/fd/JQuery-Logo.svg" alt="JQuery" height="40" style="vertical-align:top; margin:4px">
<img src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/html/html.png" alt="HTML" height="40" style="vertical-align:top; margin:4px">
<img src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/css/css.png" alt="css" height="40" style="vertical-align:top; margin:4px">
<img src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/mysql/mysql.png" alt="MySQL" height="40" style="vertical-align:top; margin:4px">
<img src="https://www.anysoft.pl/images/items/4634/phpstorm_big.png" alt="PHPStorm" height="40" style="vertical-align:top; margin:4px">
</p>

## Features
- Register
- Login
- Encrypt data(Username)
- Hash password with bcrypt
- Database support (Tested on MySQL and MariaDB)
- JS safety stored in obfuscated form (Source in dir resourceNotForWeb)
## Setup
- Clone repository `https://github.com/Szczurowsky/NothingToHide`
- Add database creditentials to mysql.php/php
- If you are going to use SSL then you should change `secure:true` in `/controller/auth/loginController.php` and `/model/sessionClass.php`
- If use apache you're ready to go, if use nginx setup it properly like in .htaccess

## To Do
- Two facor authentication
- Forgot password

## Contact
Feel free to contact me via github or discord `Szczurowsky#2137`

## [License](https://github.com/Szczurowsky/NothingToHide/blob/main/LICENSE)

MIT © [Szczurowsky ](https://github.com/Szczurowsky)
