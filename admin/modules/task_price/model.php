<?php

class TaskPriceModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_task_price ORDER BY task_id ASC, sheets_from ASC, sheets_to ASC, pcs_from ASC, pcs_to ASC ';
        return $wpdb->get_results($sql);
    }
}
