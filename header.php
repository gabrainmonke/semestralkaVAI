<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="stylesheet" href="includes/css/lightbox.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Semestralna praca</title>
</head>
<body>

    <header>
        <div class="navigation">
            <nav>
                <div class="theMenu">
                    <ul>
                        <li><a href="index.php">Main</a></li>
                        <li><a href="contacts.php">About me</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                    </ul>
                </div>

                <div class="loginMenu">
                    <ul>
                        <?php
                            if (isset($_SESSION["userUID"])){
                                echo '<li><a href="includes/logoutDocScript.php">Log Out</a></li>';
                                echo '<li><a href="profile.php">Profile</a></li>';
                            } else {
                                echo '<li><a href="logIn.php">Log In</a></li>';
                                echo '<li><a href="signUp.php">Sign up</a></li>';
                            }
                        ?>
                    </ul>
                </div>

            </nav>
        </div>
    </header>

    <main>

