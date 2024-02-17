<?php include("..\\..\\..\\public\\template\\header.html"); ?>
<?php session_start(); ?>
<?php include("..\\..\\controller\\identifySession.php"); ?>
<?php include("..\\..\\controller\\getUserProps.php"); ?>

<div class="Container">
    <h1>
        <?php echo (htmlspecialchars("Welcome back," . " " . getUserFirstName() . "!")) ?>
    </h1>
    <div class="mt-5 *:mt-3">
        <p>
            Username:
            <?php echo (htmlspecialchars(getUserUsername())); ?>
        </p>
        <p>
            Email:
            <?php echo (htmlspecialchars(getUserHiddenEmail())) ?>
        </p>
        <p>
            ID
            <?php echo (htmlspecialchars(getUserId())) ?>
        </p>

        <p class="footer-text">You can sign out <a class="hyperlink" href="../../controller/destroySession.php">here</a>
        </p>
    </div>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/vswc/php_auth">Jake</a></p>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>