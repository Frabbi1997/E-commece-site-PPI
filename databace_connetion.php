<?php

try{
    $connect = new PDO('mysql:host=localhost;dbname=registration','root','');
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION  );

}
catch(Exception $errors){
    echo $errors->getMessage();
}
