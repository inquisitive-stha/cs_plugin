<?php

class PaperFormatModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_format ORDER BY id ASC';
        return $wpdb->get_results($sql);
    }
}
