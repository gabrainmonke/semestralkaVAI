<?php include_once 'header.php';

$userID = $_SESSION["userID"];

if (!isset($_SESSION["userUID"])){
    header("Location: http://localhost/semestralkaVAI/login.php");
    exit();
}

$sqlQuery = "SELECT isAdmin FROM users WHERE usersID = '$userID'";
$result = mysqli_query($connection, $sqlQuery);
$row = mysqli_fetch_assoc($result);

if ($row['isAdmin'] !== '1') {
    header("Location: http://localhost/semestralkaVAI/login.php");
    exit();
}
?>

<div class="contentWrapper">
    <section class="deleteProfile">
        <h2>Are you sure, that you want to delete this user?</h2>

        <div class="deleteForm">
            <form method="post">
                <button type="submit" name="yesDeleteUser">Yes</button>
                <button type="submit" name="noDeleteUser">No</button>
            </form>
        </div>

    </section>
</div>

<?php
include_once 'includes/DBconnection.php';

if (isset($_POST["yesDeleteUser"])){


    $sqlQuery = "DELETE FROM users WHERE usersID='".$_GET['usersID']."'";
    mysqli_query($connection,$sqlQuery);

    header("location: adminSection.php");
    exit();
}

if (isset($_POST["noDeleteUser"])){
    header("location: adminSection.php");
    exit();
}

include_once 'footer.php' ?>
