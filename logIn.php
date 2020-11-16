<?php include_once 'header.php' ?>

    <section class="logIn">
        <h2>Log In</h2>

        <div class="logInForm">
            <form action="includes/logIn.inc.php" method="post">
                <input type="text" name="name" placeholder="Username or Email" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <button type="submit" name="submit">Log In</button>
            </form>
        </div>

    </section>

<?php include_once 'footer.php' ?>