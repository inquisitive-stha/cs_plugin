<?php

class LabelModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_label ORDER BY l_key ASC';
        return $wpdb->get_results($sql);
    }
}
