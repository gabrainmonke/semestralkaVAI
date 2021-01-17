<?php require_once 'header.php';
include_once "includes/DBconnection.php";
?>
    <div class="whole">
        <div class="container">
            <div class="uvod">
                <h1>Welcome to my page, feel free to read and explore</h1>
            </div>

            <div class="articleContainer">


                <?php
                $sqlQuery = "SELECT * FROM maincontent LIMIT 2";
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

            </div>

        </div>

        <div class="showMore">
            <a href=" " onclick="return false">Show more content</a>
        </div>
    </div>
<?php require_once 'footer.php' ?>