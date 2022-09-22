<?php
// 割引計算
class CalDiscount {

    public function __construct() {
        $this->discount = 0;
        $this->discount_details = array();
    }

    public function cal_discount(){
        $this->discount += $this->group_discount();
        $this->discount += $this->evening_rates();
        $this->discount += $this->mon_wen_rates();
    }

    public function set_number_of_customers($adult_amount, $child_amount, $senior_amount){
        $this->number_of_customers = array('adult' => $adult_amount, 'child' => $child_amount, 'senior' => $senior_amount);
    }

    public function set_ticket_subtotal($ticket_subtotal){
        $this->ticket_subtotal = $ticket_subtotal;
    }

    public function get_total_discount(){
        return $this->discount;
    }

    public function get_discount_details(){
        return $this->discount_details;
    }

    // 団体割引 10人以上だと10％割引(子供は0.5人換算とする)
    public function group_discount() : int{
        $child_half = $this->number_of_customers['child'] * 0.5;
        $number_of_groups = $this->number_of_customers['adult'] + $this->number_of_customers['senior'] + $child_half;
        if($number_of_groups >= 10){
            $this->discount_details['団体割引 -'] = $this->ticket_subtotal * 0.1;
            return $this->discount_details['団体割引 -'];
        }else{
            return 0;
        }
    }

    // 夕方料金 夕方17時以降は100円引きとする。
    public function evening_rates() : int{
        $hour = date('H');
        if($hour >= 17){
            $this->discount_details['夕方料金 -'] = 100;
            return $this->discount_details['夕方料金 -'];
        }else{
            return 0;
        }
    }


    // 月水割引 月曜と水曜は100円引きとする。
    public function mon_wen_rates() : int{
        $week = date('w');
        if($week == 1 || $week == 3){
            $this->discount_details['月水割引 -'] = 100;
            return $this->discount_details['月水割引 -'];
        }else{
            return 0;
        }
    }

}
