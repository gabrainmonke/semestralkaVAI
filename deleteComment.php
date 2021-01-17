<?php include_once 'header.php';

$userID = $_SESSION["userID"];

if (!isset($_SESSION["userUID"])){
    header("Location: login.php");
    exit();
}

$sqlQuery = "SELECT isAdmin FROM users WHERE usersID = '$userID'";
$result = mysqli_query($connection, $sqlQuery);
$row = mysqli_fetch_assoc($result);

if ($row['isAdmin'] !== '1') {
    header("Location: login.php");
    exit();
}
?>

<div class="contentWrapper">
    <section class="deleteProfile">
        <h2>Are you sure, that you want to delete this comment?</h2>

        <div class="deleteForm">
            <form method="post">
                <button type="submit" name="yesDeleteComment">Yes</button>
                <button type="submit" name="noDeleteComment">No</button>
            </form>
        </div>

    </section>
</div>

<?php
include_once 'includes/DBconnection.php';

if (isset($_POST["yesDeleteComment"])){


    $sqlQuery = "DELETE FROM comments WHERE ID='".$_GET['ID']."'";
    mysqli_query($connection,$sqlQuery);

    header("location: adminSection.php");
    exit();
}

if (isset($_POST["noDeleteComment"])){
    header("location: adminSection.php");
    exit();
}

include_once 'footer.php' ?>
