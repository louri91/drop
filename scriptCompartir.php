
<?php

session_start();
include_once ('scriptConexionBD.php');
$conn = dbConnect();

$id = $_GET['id'];
$ahora =  date("Y/m/d H:i:s",time());

$sql = "INSERT INTO compartidos VALUES ($id, 'danivb', '$ahora');";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    ?>
    <script type="text/javascript">
        location.href = "index.php";
    </script>
    <?php

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
