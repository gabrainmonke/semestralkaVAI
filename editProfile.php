<?php include_once 'header.php';

if (!isset($_SESSION["userUID"])){
    header("Location: login.php");
    exit();
}
include_once "includes/DBconnection.php";
$userID = $_SESSION["userID"];

$sqlQuery = "SELECT usersName,usersEmail,usersUID FROM users WHERE usersID = '$userID'";
$result = mysqli_query($connection, $sqlQuery);
$row = mysqli_fetch_assoc($result);
?>
<div class="contentWrapper">
    <section class="editProfile">
        <h2>Edit your data</h2>

        <div class="editForm">
            <form action="includes/editDocScript.php" method="post">
                <div>
                    <label for="name"> New full name</label>
                    <input type="text" name="name"  maxlength="30" value="<?= $row['usersName']?>">
                </div>
                <div>
                    <label for="name"> New email</label>
                    <input type="text" name="email"  maxlength="30" value="<?= $row['usersEmail']?>">
                </div>
                <div>
                    <label for="name"> New username</label>
                    <input type="text" name="uid" maxlength="30" value="<?= $row['usersUID']?>">
                </div>
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

