<!-- 

 Script PHP que conecta con la base de datos.

-->
<?php
function dbConnect() {
    $servername = "localhost";
    $username = "ejercicio_pw";
    $password = "pass_ejercicio_pw";
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