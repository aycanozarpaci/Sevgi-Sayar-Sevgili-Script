<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=YourDb_Name","YourDb_UserName","YourDb_UserPass");

}catch (PDOException $e){
    print $e->getMessage();
}
?>