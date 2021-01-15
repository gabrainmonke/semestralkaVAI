<?php
    include_once "DBconnection.php";

    $commentNewCount = $_POST['commentNewCount'];

    $sqlQuery = "SELECT * FROM comments LIMIT $commentNewCount";
    $queryResult = mysqli_query($connection,$sqlQuery); //Vykoná príkaz na databáze

    if (mysqli_num_rows($queryResult)>0){
        while($rowFromDB = mysqli_fetch_assoc($queryResult)){
            echo "<div class='comments'>";
            echo "<p>";
            echo '<strong>'.$rowFromDB['author'].'</strong>';
            echo "</p>";
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

