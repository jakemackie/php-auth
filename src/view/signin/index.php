<?php include("..\\..\\..\\public\\template\\header.html"); ?>

<div class="Container">
    <h1 class="py-2">Sign in</h1>
    <p class="py-2">In order to use our services, you must be signed in.</p>

    <form id="form" action="../../controller/authUser.php" method="post" onsubmit="validateForm()">
        <div class="*:mt-2">
            <input class="w-full input" type="text" id="usernameOrEmail" name="usernameOrEmail"
                placeholder="Username or Email" minlength="2" required />
            <input class="w-full input" type="password" id="password" name="password" placeholder="Password"
                minlength="8" required />
        </div>

        <div class="mt-2">
            <button id="submitBtn" class="w-full btn bg-blue-700" type="submit">Sign in</button>
        </div>
    </form>

    <p class="footer-text">Don't have an account? <a class="hyperlink" href="../create/">Create one</a></p>
</div>

<script src="/php_auth/public/js/validate.js"></script>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>