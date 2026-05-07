<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $dbh = dbConnect();
        $sqlSelect = "select id, first_name, last_name from users where user_name = :user_name and password = sha1(:password)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':user_name' => $_POST['username'], ':password' => $_POST['password']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) { $_SESSION['fn']=$row['first_name']; $_SESSION['ln']=$row['last_name']; $_SESSION['login']=$_POST['username']; }
        else { $errormessage = "Invalid username or password."; }
    } catch (PDOException $e) { $errormessage = "Error: ".$e->getMessage(); }
} else { header("Location: ."); }
?>