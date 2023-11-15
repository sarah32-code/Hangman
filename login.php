<?php include("top.html"); ?>

<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';

    if (empty($name)) {
        $errors[] = "Name is required";
    } else {
        if (preg_match("/[0-9]/", $name) === 1) {
            $errors[] = "Name cannot be digits";
        }

        $words = explode(" ", $name);
        for ($i = 0; $i < count($words); $i++) {
            if (strcmp(ucfirst($words[$i]), $words[$i]) !== 0) {
                $errors[] = "Name must be capitalized";
                break;
            }
        }
    }

    if (empty($errors)) {
        header('Location: game.php');
        exit();
    }
}
?>

<div class="container">
    <form action="login.php" method="post">
        <fieldset>
            <legend>User Login:</legend>

            <?php
            if (!empty($errors)) {
                echo '<div class="errors"><p>Please fix the following errors:</p><ul>';
                foreach ($errors as $error) {
                    echo '<li>' . $error . '</li>';
                }
                echo '</ul></div>';
            }
            ?>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" size="17" maxlength="16"><br><br>

            <input type="submit" value="Log In">
        </fieldset>
    </form>
</div>

<?php include("bottom.html"); ?>
