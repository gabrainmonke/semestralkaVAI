<?php include_once 'header.php' ?>

<section class="signUp">
    <h2>Log In</h2>

    <div class="signUpForm">
        <form action="includes/signUp.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="uid" placeholder="Username" required>
            <input type="password" name="pwd" placeholder="Password" required>
            <input type="password" name="pwdrepeat" placeholder="Repeat password" required>
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>

</section>

<?php include_once 'footer.php' ?>
