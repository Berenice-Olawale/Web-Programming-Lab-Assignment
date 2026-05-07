<?php
$uploadDir = './uploads/';
if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
if(isset($_SESSION['login']) && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowed = array('image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp');
    $mime = mime_content_type($_FILES['image']['tmp_name']);
    if(isset($allowed[$mime])) {
        $safeName = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/','_',basename($_FILES['image']['name']));
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$safeName);
        $imageMessage = '<p class="notice success">Image uploaded successfully.</p>';
    } else { $imageMessage = '<p class="notice error">Only JPG, PNG, GIF and WEBP images are allowed.</p>'; }
}
$galleryImages = array_values(array_filter(scandir($uploadDir), function($file) use ($uploadDir) {
    return is_file($uploadDir.$file) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file);
}));
?>