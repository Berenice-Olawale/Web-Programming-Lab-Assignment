<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['sender_name'] ?? ''); $email = trim($_POST['sender_email'] ?? ''); $subject = trim($_POST['subject'] ?? ''); $messageText = trim($_POST['message'] ?? '');
    $errors = array();
    if(strlen($name) < 2) $errors[]='Name must contain at least 2 characters.';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[]='Valid email is required.';
    if(strlen($subject) < 2) $errors[]='Subject is required.';
    if(strlen($messageText) < 10) $errors[]='Message must contain at least 10 characters.';
    if(empty($errors)) {
        try { $dbh = dbConnect(); $stmt=$dbh->prepare('insert into messages(sender_name,sender_email,subject,message,user_name,created_at) values(:n,:e,:s,:m,:u,NOW())'); $stmt->execute(array(':n'=>$name,':e'=>$email,':s'=>$subject,':m'=>$messageText,':u'=>($_SESSION['login'] ?? 'Guest'))); $contactMessage='<p class="notice success">Message sent and saved successfully.</p>'; $_POST=array(); }
        catch(PDOException $e){ $contactMessage='<p class="notice error">Database error: '.htmlspecialchars($e->getMessage()).'</p>'; }
    } else { $contactMessage='<p class="notice error">'.implode('<br>', array_map('htmlspecialchars',$errors)).'</p>'; }
}
?>