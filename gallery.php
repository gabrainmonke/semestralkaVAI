<?php include_once 'header.php';
include_once "includes/DBconnection.php";
?>
<div class="container">
    <div class="obal">
        <div class="galeryContainer">

            <div class="season">
                <ul>
                    <li><a href="includes/galleryContent/gallerySpring.php">Spring</a></li>
                    <li><a href="includes/galleryContent/gallerySummer.php">Summer</a></li>
                    <li><a href="includes/galleryContent/galleryAutumn.php">Autumn</a></li>
                    <li><a href="includes/galleryContent/galleryWinter.php">Winter</a></li>
                </ul>
            </div>

            <section class="images">

                <div class="placeholder">
                    <div>
                        <p class=>Vyberte si galériu</p>
                        <img src="includes/galleryContent/placeholder.jpg" alt="">
                    </div>
                </div>

            </section>
        </div>
    </div>
    <section class="commentSection">
        <div class="container">

            <h2>Section for comments</h2>
            <div class="newCommentContainer">
                <?php
                if (!isset($_SESSION["userUID"])) {
                    echo "You need to be logged in to write new comments";
                } else {
                    $userID = $_SESSION["userID"];

                    $sqlQuery = "SELECT usersUID FROM users WHERE usersID = '$userID'";
                    $result = mysqli_query($connection, $sqlQuery);
                    $row = mysqli_fetch_assoc($result);

                    $userName = $row['usersUID'];
                    ?>
                    <div class="newComment">
                        <h3>New comment</h3>
                        <form action="includes/sendCommentDocScript.php" method="post">
                            You are writing comment as <strong> <?= $userName ?></strong>
                            <input type='text' name='author' value='<?= $userName ?>' hidden>
                            <input type="text" name="message" placeholder="Write your thought" required>
                            <button type="submit" name="submit"> Send comment</button>
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="postedComments">

            </div>

            <div class="showMore">
                <a href=" " onclick="return false">Show more comments</a>
            </div>

        </div>
    </section>

</div>

<?php include_once 'footer.php' ?>
