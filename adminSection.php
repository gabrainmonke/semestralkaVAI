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

?>

    <div class="adminContainer">

        <div class="adminName">
            <p>ADMIN NAME: <strong><?= $row['usersUID'] ?></strong></p>
        </div>

        <section class="registeredUsersContainer">
            <div class="registeredUsers">
                <h2>Admins:</h2>
                <?php
                $sqlQueryUsers = "SELECT usersName,usersUID FROM users WHERE isAdmin = 1";
                $resultUsers = mysqli_query($connection, $sqlQueryUsers);

                if (mysqli_num_rows($resultUsers) > 0) {
                    while ($rowFromDB = mysqli_fetch_assoc($resultUsers)) {
                        ?>
                        <div class="userRow">

                            <p>
                                <strong>Full name: </strong> <?= $rowFromDB['usersName'] ?>
                                <strong>Username: </strong> <?= $rowFromDB['usersUID'] ?>
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


                <h2>Registered users:</h2>
                <?php
                $sqlQueryUsers = "SELECT usersID,usersName,usersUID FROM users WHERE isAdmin = 0";
                $resultUsers = mysqli_query($connection, $sqlQueryUsers);

                if (mysqli_num_rows($resultUsers) > 0) {
                    while ($rowFromDB = mysqli_fetch_assoc($resultUsers)) {
                        ?>
                        <div class="userRow">

                            <p>
                                <strong>Full name: </strong> <?= $rowFromDB['usersName'] ?>
                                <strong>Username: </strong> <?= $rowFromDB['usersUID'] ?>
                                <a href="deleteUser.php?usersID=<?= $rowFromDB['usersID'] ?>">
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

        <section class="myComments">
            <div class="myCommentsContainer">
                <h2>Comments:</h2>
                <?php
                $sqlQuery = "SELECT * FROM comments";
                $result = mysqli_query($connection, $sqlQuery);

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
                                <a href="deleteComment.php?ID=<?= $rowFromDB['ID'] ?>">
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