<?php

if (isset($_GET['error'])) {
    $errorType = $_GET['error'];

    switch ($errorType) {
        case 'invalidUser':
            $errorMessage = 'User does not exist.';
            break;
        case 'invalidPassword':
            $errorMessage = 'Incorrect password.';
            break;
        case 'invalidEmail':
            $errorMessage = 'Invalid email.';
            break;
        case 'emailTaken':
            $errorMessage = 'Email is already in use.';
            break;
        case 'usernameTaken':
            $errorMessage = 'Username is taken.';
            break;
        case 'rateLimited':
            $errorMessage = 'Too many failed attempts. Please try again later.';
            break;
        default:
            $errorMessage = 'An error occurred.';
    }
}

?>

<?php if (isset($errorMessage)): ?>
    <p class="error">
        <?php echo ($errorMessage) ?>
    </p>
<?php endif; ?>