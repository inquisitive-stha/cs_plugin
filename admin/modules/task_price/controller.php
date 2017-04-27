<?php
include_once("model.php");
include_once(COPYSHOP_ROOT."admin/modules/task/model.php");


$action = $_REQUEST['action'];
switch($action)
{
    case 'add':
        include_once("view_form.php");
        break;
    
    default:
        $list = TaskPriceModel::getAll();
        $model = TaskModel::getAll();
        include_once("view_list.php");
}

