</body>
<script>
    var cndDir1="<?php echo cndDir1; ?>";
    var EMP_IMAGE_PATH="<?php echo EMP_IMAGE_PATH.'/'; ?>";
</script>

<?php
    $js=array(
        'plugins/jquery/jquery.min.js','plugins/bootstrap/js/bootstrap.bundle.min.js',
        'plugins/datatables/jquery.dataTables.min.js',
        'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
        'plugins/datatables-responsive/js/dataTables.responsive.min.js',
        'plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
        'plugins/datatables-buttons/js/dataTables.buttons.min.js',
        'plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
        'plugins/jszip/jszip.min.js','plugins/pdfmake/pdfmake.min.js',
        'plugins/datatables-buttons/js/buttons.html5.min.js',
        'plugins/datatables-buttons/js/buttons.print.min.js',
        'plugins/datatables-buttons/js/buttons.colVis.min.js','dist/js/adminlte.min.js',
        'plugins/toastr/toastr.min.js',
        'js/validator.min.js',
        'plugins/datatables-responsive/js/dataTables.responsive.min.js'
    );
    
    foreach($js as $js)
    {
        echo "<script src='".ASSETSURL."$js'></script>";
    }
    ?>
    
    <?php
    foreach($appjs as $js)
    {
        echo "<script src='".ASSETSURL."$js'></script>";
    }
?>
</html>