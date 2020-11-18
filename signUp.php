<?php include_once 'header.php' ?>

<section class="contentWrapper signUp">
    <div class="signUpContainer">
        <h2>Sign up</h2>
        <div class="signUpForm">
            <form action="includes/signupDocScript.php" method="post">
                <input type="text" name="name" placeholder="Full name" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="text" name="uid" placeholder="Username" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <input type="password" name="pwdrepeat" placeholder="Repeat password" required>
                <button type="submit" name="submit">Sign up</button>
            </form>
        </div>

    <?php
    if (isset($_GET["error"])){

        switch ($_GET["error"]){
            case "invaliduid" :
                echo "<p>The name must contain only letters and numbers.</p>";
                break;
            case "invalidemail" :
                echo "<p>This e-mail is invalid. Please try once more or another one.</p>";
                break;
            case "passwordsdontmatch" :
                echo "<p>Passwords does not match. Try again.</p>";
                break;
            case "stmtfailed" :
                echo "<p>Something went wrong. Please, try again.</p>";
                break;
            case "usernametaken" :
                echo "<p>This Username or Email is taken. Please, use another one.</p>";
                break;
            case "none" :
                echo "<p>You have signed up successfully.</p>";
                break;
        }

    }
    ?>
    </div>
</section>



<?php include_once 'footer.php' ?>
