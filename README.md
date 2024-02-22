<h1 align="center">
php_auth
</h1>

I created this project as a means of showing off what I have learnt during my study at college. Utilising both MVC and OOP-first paradigms I have built a robust login authentication flow with focus on easy of use and functionaility. I have used multiple languages to achieve this, each one serving their own purpose throughout the website. To create your own dev enviroment and run the project follow below.
<br/>
> In order to see the outcome of this project, you must set up your own developer enviroment.

**Clone the repository:**
---
```shell 
git clone https://github.com/jakemackie/php_auth php_auth
```
> change the "php_auth" parameter to a folder name you'd like to save this project to.

**Install various dependencies:**
---
NodeJS
```shell 
npm i
```

Composer (for PHP)
```shell
composer install
```
> Please ensure you have [NodeJS](https://nodejs.org/en) and [Composer](https://getcomposer.org/download/) installed. 
> You will need a local web server provider such as apache and a MySQL Database. I use [XAMPP](https://www.apachefriends.org/download.html).
> A database isn't provided with the project, it connects to an existing one. You should create a database called "php_auth" then can import the `setup.sql` script found in `src/scripts/`

**Run the localhost**
---
Open your XAMPP Control Panel (or other provider) and run the needed services (Apache, MySQL). Then connect to your local development server.
> http://localhost/php_auth/src/view/create/
