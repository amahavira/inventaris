<?php
include('../config/_koneksi.php');
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM tb_barang WHERE kd_barang = '$id'");
?>
<script type="text/javascript">
	window.location.href = "tampil_data_barang.php";
</script>
<?php
?>