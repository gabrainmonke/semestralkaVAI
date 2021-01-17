<?php require_once 'header.php';
include_once "includes/DBconnection.php";
$userID = $_SESSION["userID"];

if (!isset($_SESSION["userUID"])) {
    header("Location: login.php");
    exit();
}

$sqlQuery = "SELECT usersName,usersEmail,usersUID,isAdmin FROM users WHERE usersID = '$userID'";
$result = mysqli_query($connection, $sqlQuery);
$row = mysqli_fetch_assoc($result);
?>

<div class="contentWrapper">
    <section class="profileContainer">

        <section class="profileHead">
            <div class="profilePicture">
                <img src="includes/galleryContent/img/defaultUsersPicture.jpg" alt="default-user-img">
            </div>
            <p>
                <a href="#">Change icon</a> <br> (hopefully, coming soon)
            </p>

        </section>

        <section class="profileData">
            <div class="usersFullName">

                <p> Full name: <b> <?= $row['usersName'] ?></b></p>

            </div>

            <div class="usersEmail">

                <p>Email: <b> <?= $row['usersEmail'] ?></b></p>

            </div>
            <div class="usersUserName">

                <p>Username: <b> <?= $row['usersUID'] ?></b></p>

            </div>
            <div class="links">
                <a href="editProfile.php">Edit profile</a>
                <a href="deleteProfile.php">Delete user</a>
            </div>

        </section>

    </section>

</div>


<section class="buttonMyComments">
    <a href="myComments.php">Show my comments</a>
</section>


<?php
if ($row['isAdmin'] === '1') {
    ?>

    <section class="adminSection">
        <a href="adminSection.php">Admin section</a>
    </section>

    <?php
}
?>

<?php include_once 'footer.php' ?>
