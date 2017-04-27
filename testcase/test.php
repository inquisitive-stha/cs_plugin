<?php

add_action( 'init', 'my_shortcode_fx');


function my_shortcode_fx()
{
    add_shortcode('math', 'math_cal_fx');
}
//register shortcode.....
//        
//fx()
//{
//    echo 'gggggg';
//}

function math_cal_fx()
{
    include_once("form.php");
}

add_action("wp_ajax_calculateprice", "doCalculatePrice");
add_action("wp_ajax_nopriv_calculateprice", "doCalculatePrice");


function doCalculatePrice()
{
    $format_id = $_POST['format_id'];
    $weight_id = $_POST['weight_id'];
    $num_pages = $_POST['num_pages'];
    $sides = $_POST['sides'];
    $type = $_POST['type'];
    $pcs = $_POST['pcs'];
    
    
    $print_on_cover = $_POST['print_on_cover'];
    
    $t = stripslashes($_POST['task_id']);
    
    $task_ids = json_decode($t);
     
//    p($_POST);
//     format_id:format_id, weight_id:weight_id, num_pages:num_pages, sides:sides, type:type, pcs:pcs, task_id:task_id
    $params = array(
        
    'format_id' => $format_id,
        'weight_id' => $weight_id,
        'num_pages' => $num_pages,
        'sides' => $sides,
        'type' => $type,
        'pcs' => $pcs,
        'task_id' => $task_ids,
        'print_on_cover' => $print_on_cover
//    'num_pages' => 1,
//    'sides' => 1,
//    'pcs' => 1,
//    'print_on_cover' => 1,
//    'task_id' => 14,
//    'format_id' => 4,
//    'weight_id' => 3,
//    'type' => 'bw' // or cl
);
//p($params); exit();
$price = MathEngine::getTotalPrice($params);


$arr = array('success' => '1', 'total' => $price);
    echo json_encode($arr);
    exit();
}