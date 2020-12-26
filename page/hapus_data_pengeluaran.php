<?php
include('../config/_koneksi.php');
$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE kd_transaksi = '$id'");
?>
<script type="text/javascript">
	window.location.href = "tampil_data_pengeluaran.php";
</script>
<?php
?>