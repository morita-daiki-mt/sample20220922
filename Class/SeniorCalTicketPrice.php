<?php
// 金額変更前の合計金額計算
class SeniorCalTicketPrice {
    const REGULAR_SENIOR_PRICE = 800;
    const EX_SENIOR_PRICE = 500;

    private $senior_amount;

    public function __construct(int $senior_amount) {
        if($senior_amount > 500 || $senior_amount < 0){
            echo '人数を0〜500で入力してください'. PHP_EOL;
            exit;
        }
        $this->senior_amount = $senior_amount;
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
                $this->cal_regular_ticket($this->senior_amount);
                break;
            case 'ex':
                $this->cal_ex_ticket($this->senior_amount);
                break;
            default:
                echo 'チケットタイプを正しく入力してください。'. PHP_EOL;
                exit;
        }
    }

    public function cal_regular_ticket(){
        $this->cal_ticket_price += $this->senior_amount * self::REGULAR_SENIOR_PRICE;
    }

    public function cal_ex_ticket(){
        $this->cal_ticket_price += $this->senior_amount * self::EX_SENIOR_PRICE;
    }
}
