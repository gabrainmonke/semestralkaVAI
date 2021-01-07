<?php include_once 'header.php' ?>

<div class="container">
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

            <p>Vyberte si galériu</p>

        </section>
    </div>
        <section class="commentSection">
            <div class="container">

                <h2>Section for comments</h2>

                <div class="newComment">
                    <form action="">
                        <input type="name" value="<?php //vráti meno prihláseneho používatela?>" hidden>
                        <input type="text">
                        <input type="date" value="<?php //vráti dátum?>" hidden>
                    </form>
                </div>


                <div class="postedComments">
                    <?php
                            echo "<div>";
                            echo "<h2>Name</h2>";
                            echo "<p>comment</p>";
                            echo "<p>date</p>";
                            echo "</div>";
                            echo "<div>";
                            echo "<h2>Name</h2>";
                            echo "<p>comment</p>";
                            echo "<p>date</p>";
                            echo "</div>";
                            echo "<div>";
                            echo "<h2>Name</h2>";
                            echo "<p>comment</p>";
                            echo "<p>date</p>";
                            echo "</div>";


                       // foreach ();

                    ?>
                </div>

            </div>
        </section>

</div>

<?php include_once 'footer.php' ?>
