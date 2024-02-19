<?php include("..\\..\\..\\public\\template\\header.html"); ?>
<?php include("..\\..\\controller\\Session.controller.php") ?>

<?php
$session = new Session();
$csrf_token = $session->regenerateCSRFToken();
$session->identifyUser();
?>

<div class="Container">
    <h1 class="py-2 text-center">Create an account</h1>
    <p class="py-2 text-center">An account allows you to login and use our services.</p>

    <form id="form" action="../../controller/helper/Register.php" method="post">
        <div class="mt-4 *:mt-2 flex">
            <input class="w-full input input-left" type="text" name="fname" placeholder="First Name" required />
            <input class="w-full input input-right" type="text" name="lname" placeholder="Last Name" required />
        </div>

        <div class="*:mt-2">
            <input class="w-full input" type="email" id="email" name="email" placeholder="Email" pattern="\S+@\S+\.\S+"
                autocomplete="on" required />
            <input class="w-full input" type="text" id="username" name="username" placeholder="Username" minlength="2"
                autocomplete="on" required />
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
            <button id="submitBtn" class="w-full btn bg-blue-700 outline-blue-500" type="submit">Create Account</button>
        </div>
    </form>

    <?php include("..\\..\\controller\\handleErrors.php") ?>
    <p id="error" class="error"></p>

    <p class="footer-text">Already have an account? <a class="hyperlink" href="../signin/">Sign in</a></p>
</div>

<p class="footer">Made with ❤️ by <a class="hyperlink" href="https://github.com/vswc/php_auth">Jake</a></p>

<script src="/php_auth/public/js/validate.js"></script>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>