<?php

class PaperCostModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_paper_cost ORDER BY format_id ASC, weight_id ASC';
        return $wpdb->get_results($sql);
    }
}
