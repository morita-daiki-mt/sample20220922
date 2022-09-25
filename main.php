<?php
require_once 'Class/TicketAmount.php';
require_once 'Class/AdultCalTicketPrice.php';
require_once 'Class/ChildCalTicketPrice.php';
require_once 'Class/SeniorCalTicketPrice.php';
require_once 'Class/CalExCharge.php';
require_once 'Class/CalDiscount.php';
date_default_timezone_set('Asia/Tokyo');

// チケットタイプ
$ticket_type = isset($argv[4]) ? $argv[4] : '';

$ticket_amount =  new TicketAmount();
$ticket_amount->set_ticket_amount_array($argv);
$ticket_amount_array = $ticket_amount->get_ticket_amount_array();

$ticket_price = 0;
$adult_cal_ticket  = new AdultCalTicketPrice($ticket_amount_array['adult']);
$child_cal_ticket  = new ChildCalTicketPrice($ticket_amount_array['child']);
$senior_cal_ticket = new SeniorCalTicketPrice($ticket_amount_array['senior']);

// 小計計算
$adult_cal_ticket->cal_ticket_price($ticket_type);
$adlut_price = $adult_cal_ticket->get_cal_ticket_price();

$child_cal_ticket->cal_ticket_price($ticket_type);
$child_price = $child_cal_ticket->get_cal_ticket_price();

$senior_cal_ticket->cal_ticket_price($ticket_type);
$senior_price = $senior_cal_ticket->get_cal_ticket_price();

$ticket_subtotal = $adlut_price + $child_price + $senior_price;

// 金額変更計算
$cal_ex_charge = new CalExCharge();
$cal_discount  = new CalDiscount();

$cal_ex_charge->cal_ex_charge();
$total_ex_charge = $cal_ex_charge->get_total_ex_charge();
$charge_details = $cal_ex_charge->get_charge_details();

$cal_discount->set_number_of_customers($ticket_amount_array);
$cal_discount->set_ticket_subtotal($ticket_subtotal);
$cal_discount->cal_discount();
$total_discount = $cal_discount->get_total_discount();
$discount_details = $cal_discount->get_discount_details();

$ticket_total = $ticket_subtotal + $total_ex_charge - $total_discount;

// 出力
echo '販売合計金額' . PHP_EOL;
echo $ticket_total . '円' . PHP_EOL;

echo '金額変更前合計金額' . PHP_EOL;
echo $ticket_subtotal . '円' . PHP_EOL;

if(!empty($charge_details) || !empty($discount_details)){ 
    echo '金額変更明細' . PHP_EOL;
}

if(!empty($charge_details)){ 
    foreach ($charge_details as $charge_name => $amount) {
        echo $charge_name . $amount . '円' . PHP_EOL;
    }
}

if(!empty($discount_details)){ 
    foreach ($discount_details as $discount_name => $amount) {
        echo $discount_name . $amount . '円' . PHP_EOL;
    }
}