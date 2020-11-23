<?php include_once 'header.php' ?>
<div class="contentWrapper">
    <section class="editProfile">
        <h2>Edit your data</h2>

        <div class="editForm">
            <form action="includes/editDocScript.php" method="post">
                <input type="text" name="name" placeholder=" New full name">
                <input type="text" name="email" placeholder=" New email">
                <input type="text" name="uid" placeholder="new username">
                <button type="submit" name="submit">Edit </button>
            </form>
            <div class="back">
                <a href="profile.php">
                    <button>Back</button>
                </a>
            </div>
        </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "invalidname") {
                echo "<p>Name can only contain letters.</p>";
            }

            if ($_GET["error"] == "uidalreadexists") {
               echo "<p>This username already exists.</p>";
            }

            if ($_GET["error"] == "emailalreadyexist") {
                echo "<p>This Email is already in use.</p>";
            }

            if ($_GET["error"] == "invalidusername") {
                echo "<p>Username can only contain numbers and letters.</p>";
            }

            if ($_GET["error"] == "invalidemail") {
                echo "<p>This email does not exist.</p>";
            }
        }
        ?>
    </section>

</div>

<?php include_once 'footer.php' ?>

