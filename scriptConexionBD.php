<!-- 

 Script PHP que conecta con la base de datos.

-->
<?php
 function dbConnect() {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "1234";
    $dbname = "dropbox";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>