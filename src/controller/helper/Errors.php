<?php

if (isset($_GET['error'])) {
    $errorType = $_GET['error'];

    switch ($errorType) {
        case 'invalidName':
            $errorMessage = 'Invalid name.';
            break;
        case 'invalidUsername':
            $errorMessage = 'Invalid username.';
            break;
        case 'invalidPassword':
            $errorMessage = 'Invalid password.';
            break;
        case 'invalidEmail':
            $errorMessage = 'Invalid email.';
            break;
        case 'emailTaken':
            $errorMessage = 'Email is already in use.';
            break;
        case 'invalidEmailOrUsername':
            $errorMessage = 'Invalid email or username.';
            break;
        case 'usernameTaken':
            $errorMessage = 'Username is taken.';
            break;
        case 'rateLimited':
            $errorMessage = 'Too many failed attempts. Please try again later.';
            break;
        case 'incompleteForm':
            $errorMessage = 'Please fill out all fields.';
            break;
        case 'userNotFound':
            $errorMessage = 'User not found.';
            break;
        case 'userFound':
            $errorMessage = 'User already exists.';
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