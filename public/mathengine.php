<?php

class MathEngine
{
    
    static function getTotalPrice($arr)
    {
        $printing_cost = self::findPrintingCost($arr['num_pages'], $arr['type'], 
                $arr['pcs'], $arr['format_id']);
        

        $paper_cost = self::findPaperCost($arr['num_pages'], $arr['format_id'], 
                $arr['weight_id'], $arr['sides'],  $arr['pcs']);
        
        
        $task_cost = self::findAllTaskPrice($arr['task_id'],$arr['num_pages'],
                $arr['pcs'],$arr['sides'], $arr['print_on_cover']);
        
        $total = $printing_cost + $paper_cost + $task_cost;
        
        return $total;
        
        
    }
    static function findAllTaskPrice($task_arr,$num_pages,$pcs,$sides,$print_on_cover){
        $total = 0;
        foreach($task_arr as $k => $v){
            $total += self::findTaskPrice($v,$num_pages,$pcs,$sides,$print_on_cover);
        }
        return $total;
    }
    
      static function findTaskPrice($task_id,$num_pages,$pcs,$sides,$print_on_cover){
        
                global $wpdb;
                $query = "SELECT *
                        FROM copy_task
                        WHERE id = $task_id";
                $task = $wpdb->get_results($query);
//                p($task);
//                exit();
                $print_on_cover_cost = $task[0]->options;
                $max = $task[0]->max;
                $setup_charge = $task[0]->setup_charge;
        
        $sheets = $num_pages/$sides;
        if($print_on_cover == 0){
            $print_on_cover_cost = 0;
        }
        
        if($sheets > $max){
            return '0';
        }
        else{
                global $wpdb;
                $sql = "SELECT price
                        FROM copy_task_price
                        WHERE task_id = $task_id AND sheets_from <= $sheets  
                                            AND sheets_to > $sheets AND pcs_from <= $pcs 
                                            AND pcs_to > $pcs";
                $price = $wpdb->get_results($sql);
               
                $price = $price[0]->price;
//                p($price);
//                exit();
                
        $price_of_one_piece = $price + $setup_charge + $print_on_cover_cost;
        $final_taskprice =  $price_of_one_piece * $pcs;
        
//        p($final_taskprice);
//        exit();
        
        }
            
        return $final_taskprice;
    }
    
    
    static function findPaperCost($num_pages, $format_id, $weight_id, $sides, $pcs)
    {
         
//        if(trim($sides) == 'double')
//        {
//            $num_pages = $num_pages/2;
//        }
        
        $sheets = $num_pages/$sides;
        
        global $wpdb;
        $price = $wpdb->get_results( 
	"
	SELECT price
	FROM copy_paper_cost
	WHERE format_id = $format_id 
		AND weight_id = $weight_id
	"
        );
        $price = $price[0]->price;
        $final_price = $price*$sheets*$pcs;
        return $final_price;
    }
    
    
    static function findPrintingCost($num_pages, $type, $pcs, $format_id)
    {
        global $wpdb;
        $num_pages = $num_pages*$pcs;
        $sql = "
                        SELECT *
                        FROM copy_printing_cost
                        WHERE format_id = $format_id AND p_from <= $num_pages  
                                AND p_to > $num_pages
                        ";

        $price = $wpdb->get_results($sql);

        if(trim($type) == 'bw')
        {
            
              $price = $price[0]->bw;
            
        }
        else
        if(trim($type) == 'cl')
        {
            
            $price = $price[0]->color;
        
        }
        
        $final_price=$price*$num_pages;
        return $final_price;
        
    }
}