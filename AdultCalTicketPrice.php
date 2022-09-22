<?php
// 金額変更前の合計金額計算
class AdultCalTicketPrice {
    const REGULAR_ADULT_PRICE  = 1000;
    const EX_ADULT_PRICE  = 600;

    private $adult_amount;

    public function __construct(int $adult_amount) {
        if($adult_amount < 0){
            $adult_amount = 0;
        }
        $this->adult_amount = $adult_amount;
        $this->cal_ticket_price = 0;
    }

    public function get_cal_ticket_price() : int{
        if($this->cal_ticket_price < 0){
            $this->cal_ticket_price = 0;
        }
        return $this->cal_ticket_price;
    }

    public function cal_ticket_price($ticket_type) {
        switch ($ticket_type) {
            case 'reg':
                $this->cal_regular_ticket($this->adult_amount);
                break;
            case 'ex':
                $this->cal_ex_ticket($this->adult_amount);
                break;
            default:
                echo 'チケットタイプを正しく入力してください。'. PHP_EOL;
                exit;
        }
    }

    public function cal_regular_ticket(){
        $this->cal_ticket_price += $this->adult_amount * self::REGULAR_ADULT_PRICE;
    }

    public function cal_ex_ticket(){
        $this->cal_ticket_price += $this->adult_amount * self::EX_ADULT_PRICE;
    }
}
