<?php include("..\\..\\..\\public\\template\\header.html"); ?>

<div class="Container">
    <h1 class="py-2">Sign in</h1>
    <p class="py-2">In order to use our services, you must be signed in.</p>

    <form action="../../controller/authUser.php" method="post">
        <div class="*:mt-2">
            <input class="w-full input" type="text" name="usernameOrEmail" placeholder="Username or Email" />
            <input class="w-full input" type="password" name="password" placeholder="Password" />
        </div>

        <div class="mt-2">
            <button class="w-full btn bg-blue-500" type="submit">Sign in</button>
        </div>
    </form>

    <p class="footer-text">Don't have an account? <a class="hyperlink" href="../create/">Create one</a></p>
</div>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>