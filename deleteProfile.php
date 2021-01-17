<?php include_once 'header.php';

$userID = $_SESSION["userID"];

if (!isset($_SESSION["userUID"])){
    header("Location: login.php");
    exit();
}

?>

<div class="contentWrapper">
    <section class="deleteProfile">
        <h2>Are you sure, that you want to delete your account?</h2>

        <div class="deleteForm">
            <form method="post">
                <button type="submit" name="yesDelete">Yes</button>
                <button type="submit" name="noDelete">No</button>
            </form>
        </div>

    </section>
</div>

<?php
include_once 'includes/DBconnection.php';

if (isset($_POST["yesDelete"])){


    $sqlQuery = "DELETE FROM users WHERE usersID='$userID'";
    mysqli_query($connection,$sqlQuery);

    session_unset();
    session_destroy();
    header("location: index.php?error=uspesnevymazanie");
    exit();
}

if (isset($_POST["noDelete"])){
    header("location: profile.php");
    exit();
}

include_once 'footer.php' ?>


