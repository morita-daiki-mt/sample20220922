<?php
// 金額変更前の合計金額計算
class ChildCalTicketPrice {
    const REGULAR_CHILD_PRICE  = 500;
    const EX_CHILD_PRICE  = 400;

    private $child_amount;

    public function __construct(int $child_amount) {
        if($child_amount > 500 || $child_amount < 0){
            echo '人数を0〜500で入力してください'. PHP_EOL;
            exit;
        }
        $this->child_amount = $child_amount;
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
                $this->cal_regular_ticket($this->child_amount);
                break;
            case 'ex':
                $this->cal_ex_ticket($this->child_amount);
                break;
            default:
                echo 'チケットタイプを正しく入力してください。'. PHP_EOL;
                exit;
        }
    }

    public function cal_regular_ticket(){
        $this->cal_ticket_price += $this->child_amount * self::REGULAR_CHILD_PRICE;
    }

    public function cal_ex_ticket(){
        $this->cal_ticket_price += $this->child_amount * self::EX_CHILD_PRICE;
    }
}
