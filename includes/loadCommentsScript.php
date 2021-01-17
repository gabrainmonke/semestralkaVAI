<?php
include_once "DBconnection.php";

$commentNewCount = $_POST['commentNewCount'];

$sqlQuery = "SELECT * FROM comments LIMIT $commentNewCount";
$queryResult = mysqli_query($connection, $sqlQuery); //Vykoná príkaz na databáze

if (mysqli_num_rows($queryResult) > 0) {
    while ($rowFromDB = mysqli_fetch_assoc($queryResult)) {
        ?>
        <div class='comments'>
            <p>
                <strong> <?=$rowFromDB['author']?></strong>
            </p>
            <p>
                <?=$rowFromDB['message']?>
            </p>
        </div>
        <?php
    }

} else {
    echo "<p>";
    echo "There are no comments";
    echo "</p>";
}
?>