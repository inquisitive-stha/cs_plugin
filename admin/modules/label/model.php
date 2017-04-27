<?php

class LabelModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_label';
        return $wpdb->get_results($sql);
    }
}
