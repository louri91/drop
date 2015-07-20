<?php
include_once ('scriptConexionBD.php');
$conn = dbConnect();
$id = $_GET['id'];
$login = $_GET['login'];
$sql = "DELETE FROM compartidos WHERE id=$id AND login='$login';";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    ?>
    <script languaje="javascript">
        location.href = "index.php";
    </script>
    <?php
}
?>