<?php include("..\\..\\..\\public\\template\\header.html"); ?>
<?php session_start(); ?>

<div class="Container">
    <h1>
        Welcome back,
        <?php echo (htmlspecialchars($_SESSION['user_fname'])) . "!" ?>
    </h1>
    <div class="mt-5 *:mt-3">
        <p>
            Username:
            <?php echo (htmlspecialchars($_SESSION['user_username'])); ?>
        </p>
        <p>
            Email:
            <?php echo (htmlspecialchars($_SESSION['user_email'])) ?>
        </p>
        <p>
            ID
            <?php echo (htmlspecialchars($_SESSION['user_id'])) ?>
        </p>

        <p class="footer-text">You can sign out <a class="hyperlink" href="../../controller/helper/Logout.php">here</a>
        </p>
    </div>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/vswc/php_auth">Jake</a></p>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>