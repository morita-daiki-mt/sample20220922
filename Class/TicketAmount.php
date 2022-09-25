<?php
// 金額変更前の合計金額計算
class TicketAmount {

    public function set_ticket_amount_array($argv){
        // 大人の人数
        $adult_amount = isset($argv[1]) ? $argv[1] : '';
        // 子供の人数
        $child_amount = isset($argv[2]) ? $argv[2] : '';
        // シニアの人数
        $senior_amount = isset($argv[3]) ? $argv[3] : '';

        $ticket_amount_array = array('adult' => $adult_amount, 'child' => $child_amount, 'senior' => $senior_amount);
        $this->ticket_amount_array_error_cheack($ticket_amount_array);
        $this->ticket_amount_array = $ticket_amount_array;
    }

    public function get_ticket_amount_array() : array{
        if(empty($this->ticket_amount_array)){
            echo 'チケットが不正です。'. PHP_EOL;
            exit;
        }
        return $this->ticket_amount_array;
    }

    public function ticket_amount_array_error_cheack($ticket_amount_array){
        foreach ($ticket_amount_array as $amount) {
            if ($amount > 500 || $amount < 0){
                echo '人数を0〜500で入力してください'. PHP_EOL;
                exit;
            }
        }
    }
}
