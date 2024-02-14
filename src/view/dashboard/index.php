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
        <button class="btn bg-red-600" onclick="window.location.href='../../controller/destroySession.php'">Sign
            out</button>
    </div>
</div>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>