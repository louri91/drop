

<?php
include_once ('scriptConexionBD.php');
$conn = dbConnect();
$id = $_GET['id'];
$sql = "DELETE FROM archivos WHERE id=$id;";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    ?>
    <script languaje="javascript">
        location.href = "index.php";
    </script>
    <?php
}
?>