<?php


header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Headers: Origin, Content-Type");

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);



if(isset($_POST["bn"])){

$bname = $_POST["bn"];
$pw = $_POST["pword"];





  $connect = new mysqli ("localhost:3306","shop2admin","223344");
    $connect->select_db("shop2_2");
    $connect->set_charset('utf8');






$statement = $connect->query("SELECT * FROM Nutzer WHERE Benutzername = '$bname'");

 while ($obj = $statement->fetch_object()) {
 $ID = $obj->ID;
 $bn = $obj->Benutzername;
 $vn = $obj->Vorname;
 $nn = $obj->Nachname;
 $m = $obj->Email;
$pwh = $obj->Password;

}
if(password_verify($pw, $pwh)){
$data = array( 'Passwort' => 'Valide',
                'Benutzername' => $bn,
                'Vorname' => $vn,
                'Nachname' => $nn,
                'Mail' => $m
                );
echo json_encode($data);}
else{
$data = array( 'Passwort' => 'Falsch');
echo json_encode($data);}
 

$connect->close();}
?>