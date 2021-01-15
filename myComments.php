<?php include_once "header.php";

include_once "includes/DBconnection.php";

$userID = $_SESSION["userID"];
$userUID = $_SESSION["userUID"];

if (!isset($_SESSION["userUID"])){
    header("Location: http://localhost/semestralkaVAI/login.php");
    exit();
}

$sqlQuery = "SELECT author,message FROM comments WHERE author = '$userUID'";
$result = mysqli_query($connection, $sqlQuery);

?>

<section class="myComments">
    <div class="myCommentsContainer">
        <h3>Comments written by you, <?= $userUID?></h3>
        <?php
        if (mysqli_num_rows($result)>0){
            while($rowFromDB = mysqli_fetch_assoc($result)){
                echo "<div class='comments'>";
                echo "<p>";
                echo $rowFromDB['message'];
                echo "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>";
            echo "There are no comments";
            echo "</p>";
        }

        ?>
    </div>
</section>

<?php include_once "footer.php"?>