<?php include("..\\..\\..\\public\\template\\header.html"); ?>
<?php include("..\\..\\controller\\Session.controller.php") ?>

<?php
$session = new Session();
$session->hasPermission();

$id = $session->getUserId();
$fname = $session->getUserFirstName();
$lname = $session->getUserLastName();
$email = $session->getUserEmail();
$username = $session->getUserUsername();
?>

<div class="Container">
    <h1>
        Welcome back,
        <?= $fname . "!" ?>
    </h1>
    <div class="mt-5 *:mt-3">
        <p>
            Username:
            <?= $username ?>
        </p>
        <p>
            Email:
            <?= $email ?>
        </p>
        <p>
            ID
            <?= $id ?>
        </p>

        <p class="footer-text">You can sign out <a class="hyperlink" href="../../controller/helper/Logout.php">here</a>
        </p>
    </div>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/jakemackie/php-auth">Jake</a></p>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>