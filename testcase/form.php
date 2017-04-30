<?php 
include_once(COPYSHOP_ROOT."admin/modules/paper_format/model.php");
include_once(COPYSHOP_ROOT."admin/modules/paper_cost/model.php");
include_once(COPYSHOP_ROOT."admin/modules/paper_weight/model.php");
include_once(COPYSHOP_ROOT."admin/modules/printing_cost/model.php");
include_once(COPYSHOP_ROOT."admin/modules/task/model.php");
include_once(COPYSHOP_ROOT."admin/modules/task_price/model.php");
include_once(COPYSHOP_ROOT."admin/modules/label/model.php");

        $papercost = PaperCostModel::getAll();
        $printingcost = PrintingCostModel::getAll();
        $format = PaperFormatModel::getAll();
        $weight = PaperWeightModel::getAll();
        $task = TaskModel::getAll();
        $label = LabelModel::getAll();
// p($label);
// exit();

?>
<div class="content-box-large">
    <div class="row">
    <div class="container-fluid col-md-8">
    <div class="panel-heading">
        <div class="panel-title">Shopping Cart</div>

    </div>
    <div class="panel-body">
        <form action="">
            <fieldset>
                <div class="form-group">
                    <label><?php echo getlabel('PAPER_FORMAT');?></label>
                    <!--<input class="form-control" placeholder="Enter Paper Format" type="text">-->
                    
                    <select class="form-control " name="format_id">
                        <?php
                        foreach ($format as $f) {
                            ?>
                            <option value="<?php echo $f->id; ?>" >
                                <?php echo $f->title; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label><?php echo getlabel('PAPER_WEIGHT');?></label>
                    
                    <select class="form-control " name="weight_id">
                        <?php
                        foreach ($weight as $w) {
                            ?>
                            <option value="<?php echo $w->id; ?>" >
                                <?php echo $w->weight; ?>g</option>
                            <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <label><?php echo getlabel('NO_OF_PAGES');?></label>
                    
                    <input value="1" class="form-control" name="num_pages" placeholder="Enter Total No. of pages" type="text">

                </div>
                
                <div class="form-group">
                    <label><?php echo getlabel('PRINT_ON');?></label>
                    
                    <select class=" form-control " name="sides">
                        
                            <option value="1" ><?php echo getlabel('SINGLE_SIDE');?></option>
                            <option value="2" ><?php echo getlabel('DOUBLE_SIDE');?></option>
                            
                        }
                        ?>
                    </select>

                </div>
                
                <div class="form-group" id="double_side_options" style="display:none;">
                    <label><?php echo getlabel('FILE_TYPE');?></label>
                    
                    <select class=" form-control " name="double_sides_options">
                            <option value="1"><?php echo getlabel('DOUBLE_SIDE_LONG');?></option>
                            <option value="2" ><?php echo getlabel('DOUBLE_SIDE_SHORT');?></option>
                            
                        }
                        ?>
                    </select>

                </div>
                
                <div class="form-group">
                    <label><?php echo getlabel('PRINTING_TYPES');?></label>
                    
                    <select class="form-control " name="type">
                        
                            <option value="bw" >Black & White</option>
                            <option value="cl" >Color</option>
                         
                    </select>

                </div>
                
                <div class="form-group">
                    <label><?php echo getlabel('NO_OF_PIECE');?></label>
                    
                    <input value="1" class="form-control " name="pcs" placeholder="Enter Total No. of Pieces" type="text">

                </div>
                
                <div class="form-group">
                    <label><?php echo getlabel('ADDITIONAL_TASK');?></label>
                    <!--<input class="form-control" placeholder="Enter Paper Format" type="text">-->
                    
                    
                        <?php
                        foreach ($task as $t) {
                            ?><br />
                            <input type="checkbox"  name="task_id" value="<?php echo $t->id; ?>">
                                <?php echo $t->title; ?>
                            
                            <?php
                        }
                        ?>
                    
                    
                </div>
                <div class="form-group">
                    <label><?php echo getlabel('PRINT_ON_COVER');?></label>
                    <!--<input class="form-control" placeholder="Enter Paper Format" type="text">-->
                    
                    <select class="form-control " name="print_on_cover">
                        
                            
                            <option value="0" >No</option>
                            <option value="1" >Yes</option>
                            
                    </select>
                    
                </div>
                
            </fieldset>
<!--            <div>
                <div onclick="calculate_price();" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Submit
                </div>
            </div>-->
            <span id="m_total"></span>
        </form>
    </div>
    </div>
    <div class="container-fluid col-md-4">
            llllllll
    </div>
    </div>

</div>

<script type="text/javascript">
    
    jQuery(document).ready(function(){
        jQuery('select[name="format_id"],select[name="weight_id"],select[name="sides"],select[name="type"],input[name="task_id"],select[name="print_on_cover"]').change(function(){
            
        if(jQuery('select[name="sides"]').val() == '2')
        {
            jQuery('#double_side_options').show();
        }
        else
        {
            jQuery('#double_side_options').hide();
        }
        
        calculate_price();
        });
        
        jQuery('input[name="num_pages"],input[name="pcs"]').keyup(function(){
            calculate_price();
        });
    });
    
function calculate_price()
{
    format_id = jQuery('select[name="format_id"]').val();
    weight_id = jQuery('select[name="weight_id"]').val();
    num_pages = jQuery('input[name="num_pages"]').val();
    sides = jQuery('select[name="sides"]').val();
    type = jQuery('select[name="type"]').val();
    pcs = jQuery('input[name="pcs"]').val();
   //task_id = jQuery('select[name="task_id"]').val();
    print_on_cover = jQuery('select[name="print_on_cover"]').val();
    
    
    var tmp = {};      
        
        jQuery('input[name="task_id"]:checked').each(function(k, v){
            m_index = "index_"+k;
            tmp[m_index] = jQuery(v).val();
        }); 
        task_id = JSON.stringify(tmp);
    
    jQuery('#m_total').html('loading...');
    
    jQuery.ajax({
                method: "POST",
                dataType: "json",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: { action: "calculateprice", format_id:format_id, weight_id:weight_id, num_pages:num_pages, sides:sides, type:type, pcs:pcs, task_id:task_id, print_on_cover:print_on_cover}
              })
                .done(function( msg ) {
                    
                    if(msg.success == '1')
                    {
                        jQuery('#m_total').html(msg.total);
                    }
                    
                });
    
    
}
</script>