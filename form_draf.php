<?php 
    $name = "username";
    $email = "email";
    $textarea = "inquiry";
    $inquiry = "database";
    $servername = "localhost";

    try {
        $conn = new PDO("mysql:host=localhost;dbname=$inquiry", $name, $email, array($textarea));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("INSERT INTO inquiry_form(username, email, inquiry) VALUES(?,?,?)");
        $sql->bindParam(1, $name);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $textarea);
        $sql->execute(array($_POST['username'],$_POST['email'],$_POST['inquiry']));
        echo "Successful!";
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
$conn = null;
?>