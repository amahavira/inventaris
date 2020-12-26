<?php
include('../config/_koneksi.php');
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$id'");
?>
<script type="text/javascript">
	window.location.href = "tampil_data_user.php";
</script>
<?php
?>