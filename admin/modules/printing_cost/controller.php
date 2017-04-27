<?php
include_once("model.php");
include_once(COPYSHOP_ROOT."admin/modules/paper_format/model.php");



$action = $_REQUEST['action'];
switch($action)
{
    case 'add':
        include_once("view_form.php");
        break;
    
    default:
        $list = PrintingCostModel::getAll();
        $format = PaperFormatModel::getAll();
        include_once("view_list.php");
}

