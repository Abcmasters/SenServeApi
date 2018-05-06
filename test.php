<?php

$connect = new mysqli ("localhost:3306","shop2admin","223344");
$connect->select_db("shop2_2");
$connect->set_charset('utf8');

Echo $_POST["bnamen"];

$pw = 'start';
$pwb = '223344';
$pwh = password_hash("$pw", PASSWORD_DEFAULT);


if(password_verify($pwb, '$2y$10$77a3yJ/vk1cbIcd2uGCsou73k202X97sUYe/hbLUXoyVnBqJQXgKK')){echo'Valides Passwort';}
else{
echo'Falsches Passwort!';}

?>