<?php include("..\\..\\..\\public\\template\\header.html"); ?>

<div class="Container">
    <h1 class="py-2">Create an account</h1>
    <p class="py-2">An account allows you to login and use our services.</p>

    <form id="form" action="../../controller/createUser.php" method="post" onsubmit="validateForm()">
        <div class="flex *:mt-2">
            <input class="w-full input input-left" type="text" name="fname" placeholder="First Name" required />
            <input class="w-full input input-right" type="text" name="lname" placeholder="Last Name" required />
        </div>

        <div class="*:mt-2">
            <input class="w-full input" type="email" id="email" name="email" placeholder="Email" pattern="\S+@\S+\.\S+"
                autocomplete="on" required />
            <input class="w-full input" type="text" id="username" name="username" placeholder="Username" minlength="2"
                autocomplete="on" required />
            <input class="w-full input" type="password" id="password" name="password" placeholder="Password"
                minlength="8" required />
        </div>

        <div class="mt-2">
            <button id="submitBtn" class="w-full btn bg-blue-700" type="submit">Create Account</button>
        </div>
    </form>

    <?php include("..\\..\\controller\\handleErrors.php") ?>

    <p class="footer-text">Already have an account? <a class="hyperlink" href="../signin/">Sign in</a></p>
</div>

<script src="/php_auth/public/js/validate.js"></script>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>