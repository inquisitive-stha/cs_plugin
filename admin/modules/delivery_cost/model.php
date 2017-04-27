<?php

class DeliveryCostModel
{
    static function getAll()
    {
        global $wpdb;
        $sql = 'SELECT * FROM copy_delivery_cost ORDER BY order_total ASC';
        return $wpdb->get_results($sql);
    }
}
