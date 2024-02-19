<?php include("..\\..\\..\\public\\template\\header.html"); ?>
<?php include("..\\..\\controller\\Session.controller.php") ?>

<?php
$session = new Session();
$csrf_token = $session->regenerateCSRFToken();
$session->identifyUser();
?>

<div class="Container">
    <h1 class="py-2 text-center">Sign in</h1>
    <p class="py-2 text-center">In order to use our services, you must be signed in.</p>

    <form id="form" action="../../controller/helper/Login.php" method="post">
        <div class="mt-4 *:mt-2">
            <input class="w-full input" type="text" id="emailOrUsername" name="emailOrUsername"
                placeholder="Username or Email" minlength="2" required />
            <div class="flex relative">
                <input class="w-full input" type="password" id="password" name="password" placeholder="Password"
                    minlength="8" required />
                <div onclick="togglePasswordVisibility()"
                    class="cursor-pointer bg-gray-100 rounded-md border p-1  absolute right-2 top-1/2 transform -translate-y-1/2">
                    <img src="../../../public/svg/eye-off.svg" id="eye-off" alt="eye-off">
                    <img src="../../../public/svg/eye.svg" class="hidden" id="eye" alt="eye">
                </div>
            </div>
        </div>

        <input type="hidden" name="csrf_token" value="<?php echo ($csrf_token); ?>">

        <div class="mt-2">
            <button id="submitBtn" class="w-full btn bg-blue-700 outline-blue-500" type="submit">Login</button>
        </div>
    </form>

    <?php include("..\\..\\controller\\handleErrors.php") ?>
    <p id="error" class="error"></p>

    <p class="footer-text">Don't have an account? <a class="hyperlink" href="../create/">Create one</a></p>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/vswc/php_auth">Jake</a></p>

<script src="/php_auth/public/js/validate.js"></script>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>