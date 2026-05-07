<?php
if(isset($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'])) {
    try {
        $dbh = dbConnect();
        $sqlSelect = "select id from users where user_name = :username";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':username' => $_POST['username']));
        if($sth->fetch(PDO::FETCH_ASSOC)) { $message = "The username already exists!"; $again = true; }
        else {
            $sqlInsert = "insert into users(first_name,last_name,user_name,password) values(:firstname,:lastname,:username,sha1(:password))";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':firstname'=>$_POST['firstname'], ':lastname'=>$_POST['lastname'], ':username'=>$_POST['username'], ':password'=>$_POST['password']));
            $message = "Your registration was successful. Please login manually."; $again = false;
        }
    } catch (PDOException $e) { $message = "Error: ".$e->getMessage(); $again = true; }
} else { header("Location: ."); }
?>