<?php

function doSaveFormat()
{
    
    global $wpdb; 
    $data = array('title' => $_POST['title']);
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_format', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_format', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}

function doDeleteFormat()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_format', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}

function doSaveWeight()
{
    
    global $wpdb; 
    $data = array('weight' => $_POST['weight']);
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_paper_weight', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_paper_weight', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}


function doDeleteWeight()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_paper_weight', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}

function doSavePrCost()
{
    
    global $wpdb; 
    $data = array('format_id' => $_POST['format_id'],
                'p_from' => $_POST['p_from'],
                'p_to' => $_POST['p_to'],
                'bw' => $_POST['bw'],
                'color' => $_POST['color']
            );
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_printing_cost', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_printing_cost', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}


function doDeletePrCost()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_printing_cost', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}

function doSavePaperCost()
{
    
    global $wpdb; 
    $data = array('format_id' => $_POST['format_id'],
                'weight_id' => $_POST['weight_id'],
                'price' => $_POST['price']
            );
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_paper_cost', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_paper_cost', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}


function doDeletePaperCost()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_paper_cost', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}
function doSaveDeliveryCost()
{
    
    global $wpdb; 
    $data = array('order_total' => $_POST['order_total'],
                'delivery_charge' => $_POST['delivery_charge']
            );
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_delivery_cost', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_delivery_cost', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}


function doDeleteDeliveryCost()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_delivery_cost', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}
function doSaveTask()
{
    
    global $wpdb; 
    $data = array('title' => $_POST['title'],
                'setup_charge' => $_POST['setup_charge'],
                'attributes' => $_POST['attributes'],
                'options' => $_POST['options'],
                'max' => $_POST['max']
            );
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_task', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_task', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}


function doDeleteTask()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_task', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}

function doSaveTaskPrice()
{
    
    global $wpdb; 
    $data = array('task_id' => $_POST['task_id'],
                'sheets_from' => $_POST['sheets_from'],
                'sheets_to' => $_POST['sheets_to'],
                'pcs_from' => $_POST['pcs_from'],
                'pcs_to' => $_POST['pcs_to'],
                'price' => $_POST['price']
            );
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_task_price', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_task_price', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}


function doDeleteTaskPrice()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_task_price', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}

function doSaveSettings()
{
    
    global $wpdb; 
    $data = array('c_key' => $_POST['c_key'],
                    'c_value' => $_POST['c_value']);
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_settings', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_settings', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}

function doDeleteSettings()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_settings', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}

function doSaveLabel()
{
    
    global $wpdb; 
    $data = array('l_key' => $_POST['l_key'],
                    'l_value' => $_POST['l_value']);
    $id = $_POST['id'];
    
    if(!isset($_POST['id']))
    {
        $wpdb->insert( 
            'copy_label', 
            $data);
        
    }
    else
    {
        $wpdb->update( 
            'copy_label', 
            $data, 
            array( 'id' => $id )
         );

        
    }
    $final = array("success" => 1, "message" => "Value Updated");
    echo json_encode($final);
    
    exit();
}

function doDeleteLabel()
{    
    global $wpdb; 
    $id = $_POST['id'];
    
    $wpdb->delete( 'copy_label', array( 'id' => $id ));
    
    $final = array("success" => 1, "message" => "Value Deleted");
    
    echo json_encode($final);
    
    exit();
}

function doDownloadPDF()
{

    $zfile = COPYSHOP_ROOT.'zip/zipfile.zip';

    $zip = new ZipArchive();
    $zip->open($zfile, ZipArchive::CREATE);
     
     foreach ($_REQUEST['pdf'] as $key => $value) 
     {
         $arr = explode("/", $value);
         $fname = $arr[count($arr) - 1];
         $zip->addFile($value, $fname);
     }

 
    $zip->close();


    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $zfile);
    $size = filesize($zfile);
    $name = basename($zfile);
     
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        // cache settings for IE6 on HTTPS
        header('Cache-Control: max-age=120');
        header('Pragma: public');
    } else {
        header('Cache-Control: private, max-age=120, must-revalidate');
        header("Pragma: no-cache");
    }
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // long ago
    header("Content-Type: $mimeType");
    header('Content-Disposition: attachment; filename="' . $name . '";');
    header("Accept-Ranges: bytes");
    header('Content-Length: ' . filesize($zfile));
     
    print readfile($zfile);
    exit;
    
}