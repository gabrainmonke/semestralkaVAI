<?php require_once 'header.php';
include_once "includes/DBhandler.php";
$userID = $_SESSION["userID"];
?>
<div class="container">
    <section class="profileContainer">

        <section class="profileHead">
            <div class="profilePicture">
                <img src="img/defaultUsersPicture.jpg" alt="default-user-img">
            </div>
        </section>

        <section class="profileData">
            <div class="usersFullName">
                <?php

                $sqlQuery = "SELECT usersName FROM users WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
                $row = mysqli_fetch_assoc($result);
                echo "<p>Full name</p>";
                echo  "<p>" . $row['usersName'] . "</p>";

                ?>
            </div>

            <div class="usersEmail">
                <?php

                $sqlQuery = "SELECT usersEmail FROM users WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
                $row = mysqli_fetch_assoc($result);
                echo "<p>Email</p>";
                echo  "<p>" . $row['usersEmail'] . "</p>";
                ?>
            </div>
            <div class="usersUserName">
                <?php

                $sqlQuery = "SELECT usersUID FROM users WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
                $row = mysqli_fetch_assoc($result);
                echo "<p>Username</p>";
                echo  "<p>" . $row['usersUID'] . "</p>";

                ?>
            </div>

            <a href="editProfile.php">Edit profile</a>
            <a href="deleteProfile.php">Delete user</a>

        </section>

    </section>
</div>

<?php require_once 'footer.php' ?>
