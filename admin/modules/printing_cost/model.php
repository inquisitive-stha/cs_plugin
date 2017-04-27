<?php

class PrintingCostModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_printing_cost ORDER BY format_id ASC';
        return $wpdb->get_results($sql);
    }
}
