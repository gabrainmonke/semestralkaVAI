<?php include_once 'header.php' ?>

    <section class="contentWrapper logIn">
        <div class="logInContainer">
            <h2>Log In</h2>
            <div class="logInForm">
                <form action="includes/loginDocScript.php" method="post">
                    <input type="text" name="uid" placeholder="Username or Email" required>
                    <input type="password" name="pwd" placeholder="Password" required>
                    <div class="">
                        <button type="submit" name="submit">Log In</button>
                    </div>
                </form>
            </div>


        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "wronglogin") {
                echo "<p> Incorrect username or password</p>";
            }
        }
        ?>
        </div>
    </section>

<?php include_once 'footer.php'?>