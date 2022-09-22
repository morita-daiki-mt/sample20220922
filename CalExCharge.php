<?php
// 増額値計算
class CalExCharge {

    public function __construct() {
        $this->ex_charge = 0;
        $this->charge_details = array();
    }

    public function cal_ex_charge(){
        $this->ex_charge += $this->holiday_fee();
    }

    public function get_total_ex_charge() : int{
        return $this->ex_charge;
    }

    public function get_charge_details() : array{
        return $this->charge_details;
    }

    // 休日料金 休日は200円増とする。
    public function holiday_fee() :int{
        // '日', 0
        // '月', 1
        // '火', 2
        // '水', 3
        // '木', 4
        // '金', 5
        // '土', 6
        $week = date('w');
        
        // if($week == 0 && $week == 6){
            $this->charge_details['休日料金 ＋'] = 200;
            return $this->charge_details['休日料金 ＋'];
        // }else{
        //     return 0;
        // }
    }

}
