<?php

if (isset($_GET['error'])) {
    $errorType = $_GET['error'];

    switch ($errorType) {
        case 'invalidUser':
            $errorMessage = 'User does not exist.';
            break;
        case 'incorrectPassword':
            $errorMessage = 'Incorrect password.';
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