
<?php
session_start();
include_once ('scriptConexionBD.php');
$conn = dbConnect();
$Login = $_SESSION['usuario'];
$id = $_GET['id'];
$sql = "DELETE FROM compartidos WHERE id=$id AND login='$Login';";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    ?>
    <script languaje="javascript">
        location.href = "index.php";
    </script>
    <?php
}
?>