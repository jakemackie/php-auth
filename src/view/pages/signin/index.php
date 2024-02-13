<?php include("..\\..\\public\\template\\header.html"); ?>

<?php include("..\\..\\..\\controller\\example.php"); ?>

<Container>
    <h1 class="py-2">Sign in</h1>
    <p class="py-2">In order to use our services, you must be signed in.</p>

    <div class="*:mt-2">
        <input class="w-full input" type="text" name="username" placeholder="Username" />
        <input class="w-full input" type="password" name="password" placeholder="Password" />
    </div>

    <div class="my-4 flex items-center">
        <input class="checkbox" type="checkbox" id="remember-me" name="remember-me" value="True">
        <label for="remember-me"> Stay signed in</label>
    </div>

    <div class="mt-2">
        <button class="w-full btn" type="submit">Sign in</button>
    </div>

    <p class="footer-text">Don't have an account? <a class="hyperlink" href="../create">Create one</a></p>
</Container>

<?php include("..\\..\\public\\template\\footer.html"); ?>