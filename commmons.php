<?php
//include_once(COPYSHOP_ROOT."admin/modules/general/model.php");
//$list = GeneralModel::getAll();

function p($r)
{
    echo '<pre>';
    print_r($r);
    echo '</pre>';
}

//$value = key_value('DOUBLE_SIDE_LONG');
//echo '======================='.$value;

function key_value($c_key){
        global $wpdb;
        
	$sql = "
	SELECT c_value
	FROM copy_settings
	WHERE c_key = '$c_key'";
        $c_value = $wpdb->get_results($sql);
//        
//         p($c_value);
//         exit();
//        
      return $c_value[0]->c_value;
    
}

function getlabel($l_key){
        global $wpdb;
        
	$sql = "
	SELECT l_value
	FROM copy_label
	WHERE l_key = '$l_key'";
        $l_value = $wpdb->get_results($sql);
//        
//         p($c_value);
//         exit();
//        
      return $l_value[0]->l_value;
    
}

function template_start($title, $button_title = '', $button_link = '')
{
    ?>
    <div class="wrap">
            <h1 class="wp-heading-inline"><?php echo $title; ?></h1>
            <?php
            if(trim($button_title) != '')
            {
                ?>
                <a href="<?php echo $button_link; ?>" class="btn btn-success"><?php echo $button_title; ?></a>
                <?php
            }
            ?>
    <?php
}

function template_end()
{
    ?>
    </div>
    <?php
}