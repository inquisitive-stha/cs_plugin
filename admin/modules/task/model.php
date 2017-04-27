<?php

class TaskModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_task ORDER BY title ASC';
        return $wpdb->get_results($sql);
    }
}
