<?php

class PaperWeightModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_paper_weight ORDER BY weight ASC';
        return $wpdb->get_results($sql);
    }
}
