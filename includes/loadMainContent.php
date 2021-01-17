<?php
include_once "DBconnection.php";
$articleNewCount = $_POST['articleNewCount'];

$sqlQuery = "SELECT * FROM maincontent LIMIT $articleNewCount";
$result = mysqli_query($connection, $sqlQuery);

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="article">
        <h2>
            <?= $row['articleHeader'] ?>
        </h2>
        <p>
            <?= $row['article'] ?>
        </p>
        <p>
            Check more stuff on <a href="<?= $row['articleSource'] ?>"><?= $row['articleSource'] ?></a>
        </p>
    </div>

    <?php
}
?>
