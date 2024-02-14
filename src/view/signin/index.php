<?php include("..\\..\\..\\public\\template\\header.html"); ?>

<?php include("..\\..\\controller\\identifySession.php") ?>

<div class="Container">
    <h1 class="py-2 text-center">Sign in</h1>
    <p class="py-2 text-center">In order to use our services, you must be signed in.</p>

    <form id="form" action="../../controller/authUser.php" method="post" onsubmit="validateForm()">
        <div class="mt-4 *:mt-2">
            <input class="w-full input" type="text" id="emailOrUsername" name="emailOrUsername"
                placeholder="Username or Email" minlength="2" required />
            <input class="w-full input" type="password" id="password" name="password" placeholder="Password"
                minlength="8" required />
        </div>

        <button id="submitBtn" class="mt-2 w-full btn bg-blue-700" type="submit">Sign in</button>
    </form>

    <?php include("..\\..\\controller\\handleErrors.php") ?>

    <p class="footer-text">Don't have an account? <a class="hyperlink" href="../create/">Create one</a></p>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/vswc">vswc</a></p>

<script src="/php_auth/public/js/validate.js"></script>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>