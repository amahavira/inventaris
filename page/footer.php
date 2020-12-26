<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-center small">
            <div class="text-muted">Copyright &copy; Your Website 2020</div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../dist/assets/demo/chart-area-demo.js"></script>
<script src="../dist/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../dist/assets/demo/datatables-demo.js"></script>
<script type="text/javascript">
    function sum() {
        var txtFirstNumberValue = document.getElementById('txt_stok').value;
        var txtSecondNumberValue = document.getElementById('txt_jumlah').value;
        var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('txt_sisa').value = result;
        }
    }

    function sums() {
        var txtFirst = document.getElementById('txt-stok').value;
        var txtSecond = document.getElementById('txt-jumlah').value;
        var result = parseFloat(txtFirst) - parseFloat(txtSecond);
        if (!isNaN(result)) {
            document.getElementById('txt-sisa').value = result;
        }
    }
</script>
<script src="../dist/js/bootstrap-datepicker.js"></script>
<script src="../dist/js/bootstrap-datetimepicker.js"></script>
<script src="../dist/js/moment-with-locales.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tanggal').datepicker({
            format: "dd mm yyyy",
            autoclose: true
        });
        $('.tanggalb').datepicker({
            format: "mm yyyy",
            autoclose: true
        });
        $('.tanggalt').datepicker({
            format: "yyyy",
            autoclose: true
        });
    });
</script>
</body>

</html>