<?php include("..\\..\\..\\public\\template\\header.html"); ?>

<?php include("..\\..\\controller\\identifySession.php"); ?>

<div class="Container">
    <h1>
        <?php echo ($_SESSION['user_fname'] . " " . $_SESSION['user_lname']) ?>
    </h1>
    <div class="*:mt-2">
        <p>
            ID:
            <?php echo ($_SESSION['user_id']) ?>
        </p>
        <p>
            Email:
            <?php echo ($_SESSION['user_email']) ?>
        </p>
        <p>
            Username:
            <?php echo ($_SESSION['user_username']) ?>
        </p>

        <p class="footer-text">You can sign out <a class="hyperlink" href="../../controller/destroySession.php">here</a>
        </p>
    </div>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/vswc">vswc</a></p>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>