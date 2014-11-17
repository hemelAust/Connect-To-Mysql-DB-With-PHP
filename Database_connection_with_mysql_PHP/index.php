<!--
    Author Name : Md.Arman Ahmed
    Connect your PHP code with mysql database.
    Server Name : Vertrigo
 -->
    
 

<?php 
    $user='root'; //initializing variables for userName
    $pass='vertrigo'; //initializing variables for passWord
    $db_='test';       //initializing variables for dbName

    //Establishing the connection if failed Showing a Error Message!
    $db=new mysqli('localhost',$user,$pass,$db_) or die("Connection Error!!!".mysql_error());

    echo "Connection Established!!!";

?>

