<?php require_once 'header.php';
include_once "includes/DBconnection.php";
$userID = $_SESSION["userID"];
?>
<div class="contentWrapper">
    <section class="profileContainer">

        <section class="profileHead">
            <div class="profilePicture">
                <img src="img/defaultUsersPicture.jpg" alt="default-user-img">
            </div>
            <p>
                <a href="#">Change icon</a> <br> (hopefully, coming soon)
            </p>

        </section>

        <section class="profileData">
            <div class="usersFullName">
                <?php

                $sqlQuery = "SELECT usersName FROM users WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
                $row = mysqli_fetch_assoc($result);

                echo  "<p> Full name: <b>" . $row['usersName'] . "</b></p>";

                ?>
            </div>

            <div class="usersEmail">
                <?php

                $sqlQuery = "SELECT usersEmail FROM users WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
                $row = mysqli_fetch_assoc($result);

                echo  "<p>Email: <b>" . $row['usersEmail'] . "</b></p>";
                ?>
            </div>
            <div class="usersUserName">
                <?php

                $sqlQuery = "SELECT usersUID FROM users WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
                $row = mysqli_fetch_assoc($result);

                echo  "<p>Username: <b>" . $row['usersUID'] . "</b></p>";

                ?>
            </div>
            <div class="links">
                <a href="editProfile.php">Edit profile</a>
                <a href="deleteProfile.php">Delete user</a>
            </div>

        </section>

    </section>
</div>

<?php require_once 'footer.php' ?>
