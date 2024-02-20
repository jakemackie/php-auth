<?php include("..\\..\\..\\public\\template\\header.html"); ?>
<?php include("..\\..\\controller\\Session.controller.php") ?>

<?php
$session = new Session();
$session->hasPermission();
?>

<div class="Container">
    <h1>
        Welcome back,
        <?php echo (htmlspecialchars($session->getUserFirstName())) . "!" ?>
    </h1>
    <div class="mt-5 *:mt-3">
        <p>
            Username:
            <?php echo (htmlspecialchars($session->getUserUsername())); ?>
        </p>
        <p>
            Email:
            <?php echo (htmlspecialchars($session->getUserEmail())) ?>
        </p>
        <p>
            ID
            <?php echo (htmlspecialchars($session->getUserId())) ?>
        </p>

        <p class="footer-text">You can sign out <a class="hyperlink" href="../../controller/helper/Logout.php">here</a>
        </p>
    </div>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/vswc/php_auth">Jake</a></p>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>