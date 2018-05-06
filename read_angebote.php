<?php
header("Acess-Control-Allow-Origin: *");
$server = 'localhost:3306';
$username = 'shop2admin';
$password = '223344';
$dbname = 'shop2_2';


  $connect = new mysqli ("localhost:3306","shop2admin","223344");
    $connect->select_db("shop2_2");
    $connect->set_charset('utf8');



$result = $connect->query("SELECT * FROM Angebot  ");
$outp = array();
 while ($obj = $result->fetch_assoc()) {
 $outp[] =  $obj;}
if(mysqli_num_rows($result)>0){

echo json_encode($outp);

}
else{
echo json_encode(" keine Ergebnisse");}


$connect->close();

?>