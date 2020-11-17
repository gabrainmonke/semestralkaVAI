<?php include_once 'header.php' ?>
<div class="contentWrapper">
    <section class="editProfile">
        <h2>Edit your data</h2>

        <div class="editForm">
            <form action="includes/editDocScript.php" method="post">
                <input type="text" name="name" placeholder=" New full name">
                <input type="text" name="email" placeholder=" New email">
                <input type="text" name="uid" placeholder="new username">
                <button type="submit" name="submit">Edit </button>
            </form>
            <a href="profile.php">
                <button>
                    Back
                </button>
            </a>
        </div>

    </section>
</div>

<?php include_once 'footer.php' ?>

