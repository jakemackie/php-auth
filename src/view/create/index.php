<?php include("..\\..\\..\\public\\template\\header.html"); ?>

<div class="Container">
    <h1 class="py-2">Create an account</h1>
    <p class="py-2">An account allows you to login and use our services.</p>

    <form action="../../controller/createUser.php" method="post">
        <div class="flex *:mt-2">
            <input class="w-full input input-left" type="text" name="fname" placeholder="First Name" />
            <input class="w-full input input-right" type="text" name="lname" placeholder="Last Name" />
        </div>

        <div class="*:mt-2">
            <input class="w-full input" type="email" name="email" placeholder="Email" />
            <input class="w-full input" type="text" name="username" placeholder="Username" />
            <input class="w-full input" type="password" name="password" placeholder="Password" />
        </div>

        <div class="mt-2">
            <button class="w-full btn bg-blue-500" type="submit">Create Account</button>
        </div>
    </form>

    <p class="footer-text">Already have an account? <a class="hyperlink" href="../signin/">Sign in</a></p>
</div>

<?php include("..\\..\\..\\public\\template\\footer.html"); ?>