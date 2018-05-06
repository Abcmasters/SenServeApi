<?php
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Headers: Origin, Content-Type");


$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


$name = $_POST["name"];
$vname = $_POST["vname"];
$bname = $_POST["bname"];
$mail = $_POST["mail"];
$pw = $_POST["pw"];
$pwh = password_hash("$pw", PASSWORD_DEFAULT);



  $connect = new mysqli ("localhost:3306","shop2admin","223344");
    $connect->select_db("shop2_2");
    $connect->set_charset('utf8');






$result = $connect->query("INSERT INTO Nutzer (Nachname, Vorname, Benutzername, Password, Email, ID, is_role, user_icon) values ('$name', '$vname','$bname','$pwh','$mail','platzhalter',1,'platzhalter') ");
if($result){echo json_encode("Jo hat geklappt");}
else{
echo json_encode(" Error");}


$connect->close();

?>