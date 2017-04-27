<?php
template_start('Copy Task', 'Add New', 'javascript: doAddNew();');

error_reporting(0);
error_reporting(E_ERROR);
?>
<table class="wp-list-table widefat fixed striped pages">
    <thead>
        <tr>
            <td style="width:300px;">
                Title
            </td>
            <td style="width:150px;">
                Setup Charge
            </td>
            <td style="width:200px;">
                Attributes
            </td>
            <td>
                Options(Print)
            </td>
            <td>
                MAX Value
            </td>
            <td style="width:200px;">
                Action
            </td>
        </tr>
    </thead>
    <tbody id="nrow">
        <?php
        foreach($list as $l)
        {
            ?>
        <tr id="tr-<?php echo $l->id; ?>">
            <th>                
                <input type="text" disabled class="db_title form-control percent_50" value="<?php echo $l->title; ?>" />
            </th>
            <th>
                <input type="text" disabled class="db_setup_charge form-control percent_50" value="<?php echo $l->setup_charge; ?>" />
            </th>
            <th>
                <input class="btn btn-warning btn_add_attributes" style="display: none;" type="button" onclick="addAttribute(this);" value="+" />
                <?php 
               
                $attr_arr = json_decode(stripslashes($l->attributes));
  
                
                foreach($attr_arr as $kxx => $vxx)
                {
                    ?>
                    <input type="text" disabled class="db_attributes form-control percent_50" value="<?php echo $vxx; ?>" />
                    <?php
                }
                ?>
                
            </th>
            <th>
                <input type="text" disabled class="db_options form-control percent_50" value="<?php echo $l->options; ?>" />
            </th>
            <th>
                <input type="text" disabled class="db_max form-control percent_50" value="<?php echo $l->max; ?>" />
                <input type="hidden" class="db_id" value="<?php echo $l->id; ?>" />
            </th>
            
            <th>
                <a href="#" onclick="doEdit(this); return false;" class="btn btn-info" tr_id="tr-<?php echo $l->id; ?>">Edit</a>
                &nbsp;|&nbsp;
                <a href="#" onclick="doDelete(this); return false;" class="btn btn-danger" tr_id="tr-<?php echo $l->id; ?>">Delete</a>
            </th>
        </tr>
            <?php
        }
        ?>
        <tr id="add_tmpl" style="display: none;">
            <th>                
                <input type="text" class="db_title form-control percent_50" value="" />
            </th>
            <th>
                <input type="text" class="db_setup_charge form-control percent_50" value="" />
            </th>
            <th>
                <input type="text" class="db_attributes form-control percent_50" value="" />
            </th>
            <th>
                <input type="text" class="db_options form-control percent_50" value="" />
            </th>
            <th>
                <input type="text" class="db_max form-control percent_50" value="" />
                <input type="hidden" class="db_id" value="" />
            </th>
            <th>
                <a href="#" onclick="doAdd(this); return false;" class="btn btn-info" tr_id="tr-<?php echo $l->id; ?>">Add</a>
                &nbsp;|&nbsp;
                <a href="#" onclick="doRemoveRow(this); return false;" class="btn btn-danger" tr_id="tr-<?php echo $l->id; ?>">Delete</a>
            </th>
        </tr>
    </tbody>
</table>

<script type="text/javascript">
    
    function addAttribute(b)
    {
        jQuery(b).parent().append('<input type="text" class="db_attributes form-control percent_50" value="" />');
    }
    
    function doRemoveRow(t)
    {
        jQuery(t).parent().parent().remove();
    }
    
    function doAddNew()
    {
        html_str = '<tr>'+jQuery('#add_tmpl').html()+'</tr>';
        
        jQuery('#nrow').prepend(html_str);
    }
    
    function doEdit(b)
    {
        tr_id = jQuery(b).attr('tr_id');
        tr = jQuery("#"+tr_id);
        
        if(jQuery(b).html() == 'Edit')
        {
            
            jQuery('#nrow input[type="text"]').attr('disabled', 'disabled');
            jQuery('#nrow .btn-info').html('Edit');
            
            jQuery(tr).find('.btn_add_attributes').show();
            
            jQuery(tr).find('.db_title').removeAttr('disabled');
            jQuery(tr).find('.db_setup_charge').removeAttr('disabled');
            jQuery(tr).find('.db_attributes').removeAttr('disabled');
            jQuery(tr).find('.db_options').removeAttr('disabled');
            jQuery(tr).find('.db_max').removeAttr('disabled');
            jQuery(b).html('Save');
            return;
        }  
        
        title = jQuery(tr).find('.db_title').val();
        setup_charge = jQuery(tr).find('.db_setup_charge').val();
        
        var attributes = {};
        
        
        
        jQuery(jQuery(tr).find('.db_attributes')).each(function(k, v){
            m_index = "index_"+k;
            attributes[m_index] = jQuery(v).val();
        });
        
        
        attributes = JSON.stringify(attributes);
        
       // attributes = jQuery(tr).find('.db_attributes').val();
        
        
        
        options = jQuery(tr).find('.db_options').val();
        max = jQuery(tr).find('.db_max').val();
        id = jQuery(tr).find('.db_id').val();
        
        jQuery(tr).find('input[type="text"]').hide();
        jQuery(tr).find('.db_title').after('<span class="loading">Processing...</span>');
        
        
        jQuery.ajax({
                method: "POST",
                dataType: "json",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: { action: "savetask", title: title,setup_charge: setup_charge,attributes: attributes, options: options, max:max, id: id}
              })
                .done(function( msg ) {
                    if(msg.success == '1')
                    {
                       BootstrapDialog.show({
					        title: 'System Message',
					        message: msg.message,
					        type: BootstrapDialog.TYPE_SUCCESS,
					    });
                        
                        jQuery('#nrow input[type="text"]').show();
                        jQuery('.loading').remove();
                        jQuery('#nrow .btn-info').html('Edit');
                        jQuery('#nrow input[type="text"]').attr('disabled', 'disabled');
                    }
                    
                });
        
        
    }
    
    function doAdd(b)
    {
        tr = jQuery(b).parent().parent();
        
        title = jQuery(tr).find('.db_title').val();
        setup_charge = jQuery(tr).find('.db_setup_charge').val();
        attributes = jQuery(tr).find('.db_attributes').val();
        options = jQuery(tr).find('.db_options').val();
        max = jQuery(tr).find('.db_max').val();
        
        jQuery(tr).find('input[type="text"]').hide();
        jQuery(tr).find('.db_title').after('<span class="loading">Processing...</span>');
        
        jQuery.ajax({
                method: "POST",
                dataType: "json",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: { action: "savetask", title: title,setup_charge: setup_charge,attributes: attributes,options: options,max: max}
              })
                .done(function( msg ) {
                    if(msg.success == '1')
                    {
                        document.location = document.location;
                    }
                    
                });
        
        
    }
    
    function doDelete(b)
    {
        tr_id = jQuery(b).attr('tr_id');
        tr = jQuery("#"+tr_id);
        
        id = jQuery(tr).find('.db_id').val();
        
        jQuery(tr).find('input[type="text"]').hide();
        jQuery(tr).find('.db_title').after('<span class="loading">Processing...</span>');
        
        jQuery.ajax({
                method: "POST",
                dataType: "json",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: { action: "deletetask", id: id}
              })
                .done(function( msg ) {
                    if(msg.success == '1')
                    {
                        
                        BootstrapDialog.show({
					        title: 'System Message',
					        message: msg.message,
					        type: BootstrapDialog.TYPE_SUCCESS,
					    });
                                            
                        jQuery('#'+tr_id).fadeOut('fast', function(){
                            jQuery('#'+tr_id).remove();
                        });
                    }
                    
                });
        
        
    }
</script>

<?php
template_end();
?>