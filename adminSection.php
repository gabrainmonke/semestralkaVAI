<?php require_once 'header.php';
include_once "includes/DBconnection.php";
$userID = $_SESSION["userID"];

$sqlQuery = "SELECT usersName,usersEmail,usersUID,isAdmin FROM users WHERE usersID = '$userID'";
$result = mysqli_query($connection, $sqlQuery);
$row = mysqli_fetch_assoc($result);

if ($row['isAdmin'] !== '1') {
    header("Location: http://localhost/semestralkaVAI/login.php");
    exit();
}

$sqlQuery = "SELECT * FROM comments";
$result = mysqli_query($connection, $sqlQuery);

?>

    <div class="adminContainer">

        <div class="">
            <p>ADMIN NAME: <strong><?= $row['usersUID'] ?></strong></p>
        </div>

        <section class="myComments">
            <div class="myCommentsContainer">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($rowFromDB = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class='comments'>
                            <p>
                                ID: <?= $rowFromDB['ID'] ?>
                                <br>
                                Written by: <?= $rowFromDB['author'] ?>
                            </p>
                            <p>
                                echo <?= $rowFromDB['message'] ?>
                            </p>
                            <p>
                                <a href="deleteComment.php?ID=<?=$rowFromDB['ID']?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </p>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <p>
                        There are no comments
                    </p>
                    <?php
                }

                ?>
            </div>
        </section>


    </div>


<?php include_once 'footer.php' ?>