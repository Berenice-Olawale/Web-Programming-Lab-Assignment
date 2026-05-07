<h2>Notebook image gallery</h2>

<p>This gallery shows refurbished notebook examples. Logged-in users can upload new images.</p>

<?php if(isset($imageMessage)) echo $imageMessage; ?>

<?php if(isset($_SESSION['login'])) { ?>
    <form method="post" enctype="multipart/form-data">
        <label>Upload notebook image</label>
        <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp" required>
        <button class="btn" type="submit">Upload image</button>
    </form>
<?php } else { ?>
    <p class="notice">Login is required to upload new images.</p>
<?php } ?>

<div class="gallery">
    <?php foreach($galleryImages as $img) { ?>
        <article class="card">
            <img src="uploads/<?= htmlspecialchars($img) ?>" alt="Notebook gallery image">
        </article>
    <?php } ?>
</div>