<?php include("top.html"); ?>

<div class="container">
    <form action="signup-submit.php" method="post">
        <fieldset>
            <legend>New User Signup:</legend>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" size="17" maxlength="16">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="M">Male</option>
                    <option value="F" selected>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" id="age" size="6" maxlength="2" >
            </div>

            <div class="form-group">
                <input type="submit" value="Sign Up">
            </div>
        </fieldset>
    </form>
</div>
<?php include("bottom.html"); ?>
