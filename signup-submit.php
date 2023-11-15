<?php include("top.html"); ?>
<?php
$errors = array();
$user = array(
    'name' => '',
    'gender' => '',
    'age' => '',
);
if(isset($_POST['name'])) {
    $user['name'] = urlencode($_POST['name']);
}
if(isset($_POST['gender'])) {
    $user['gender'] = urlencode($_POST['gender']);
}
if(isset($_POST['age'])) {
    $user['age'] = urlencode($_POST['age']);
}

if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
    $errors[] = "Name cannot be digits";
}

$words = explode(" ", $user["name"]);
for ($i = 0; $i < count($words); $i++) {
    if(strcmp(ucfirst($words[$i]),$words[$i]) !== 0) {
        $errors[] = "Name must be capitalized";
        break;
    }
}
if (!is_numeric($user["age"])) {
    $errors[] = "Age is not a number.";
}
?>
<div class="container">
    <?php if (empty($errors)) : ?>
        <pre class="success-message">
            Thank you
            Welcome to Hangman, <?= $user["name"] ?>!
            Now <a href="login.php">log in to Play!</a>
        </pre>
    <?php else : ?>
        <div class="errors">
            <p>Please fix the following errors:</p>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
<?php include("bottom.html"); ?>
