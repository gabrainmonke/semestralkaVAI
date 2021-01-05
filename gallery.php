<?php include_once 'header.php' ?>

<div class="container">
    <div class="galeryContainer">

        <div class="season">
            <ul>
                <li><a href="#" class="selected">Spring</a></li>
                <li><a href="#">Summer</a></li>
                <li><a href="#">Autumn</a></li>
                <li><a href="#">Winter</a></li>
            </ul>
        </div>

        <section class="spring">

            <div class="springImg">
                <img src="img/spring/spring1.png" alt="springPhoto1">
                <img src="img/spring/spring2.png" alt="springPhoto2">
                <img src="img/spring/spring3.png" alt="springPhoto3">
                <img src="img/spring/spring4.png" alt="springPhoto4">
            </div>

        </section>

        <section class="summer hidden">

            <div class="summerImg">
                <img src="img/summer/summer1.png" alt="summerPhoto1">
                <img src="img/summer/summer2.png" alt="summerPhoto2">
                <img src="img/summer/summer3.png" alt="summerPhoto3">
                <img src="img/summer/summer4.png" alt="summerPhoto4">
            </div>

        </section>

        <section class="autumn hidden">

            <div class="autumnImg">
                <img src="img/autumn/autumn1.jpg" alt="autumnPhoto1">
                <img src="img/autumn/autumn2.jpg" alt="autumnPhoto2">
                <img src="img/autumn/autumn3.jpg" alt="autumnPhoto3">
                <img src="img/autumn/autumn4.jpg" alt="autumnPhoto4">

            </div>

        </section>

        <section class="winter hidden">

            <div class="winterImg">
                <img src="img/winter/winter1.png" alt="winterPhoto1">
                <img src="img/winter/winter2.png" alt="winterPhoto2">
                <img src="img/winter/winter3.png" alt="winterPhoto3">
                <img src="img/winter/winter4.png" alt="winterPhoto4">

            </div>

        </section>

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
</div>
<?php include_once 'footer.php' ?>
