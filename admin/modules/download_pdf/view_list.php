
    <h1>Download PDF</h1>


    <hr />

    <?php
//p($_SERVER['DOCUMENT_ROOT'].'/copyshop/testpdfs/1.pdf');


// http://localhost/copyshop/wp-admin/admin-ajax.php?action=downloadpdf&pdf[]=C:/xampp/htdocs/copyshop/testpdfs/1.pdf&pdf[]=C:/xampp/htdocs/copyshop/testpdfs/2.pdf&pdf[]=C:/xampp/htdocs/copyshop/testpdfs/3.pdf
    ?>

    <form action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">
        <input type="hidden" name="action" value="downloadpdf" />
        pdfs:
        <input type="text" name="pdf[]" class="form-control">
        <br />
        <input type="text" name="pdf[]" class="form-control">
        <br />
        <input type="text" name="pdf[]" class="form-control">
        <br />
        <input type="submit" value="Submit" class="btn btn-info">
    </form>

<script type="text/javascript">
    function doSubmit(b)
    {
        name = jQuery('#name').val();
        address = jQuery('#address').val();
        roll = jQuery('#roll').val();
        
        
        jQuery.ajax({
                method: "POST",
                dataType: "json",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: { action: "downloadpdf", name: name, address:address, roll: roll}
              })
                .done(function( msg ) {
                    if(msg.success == '1')
                    {
                       BootstrapDialog.show({
                            title: 'System Message',
                            message: msg.message,
                            type: BootstrapDialog.TYPE_SUCCESS,
                        });
                        
                    
                    }
                    
                });
        
        
    }
    </script>
    