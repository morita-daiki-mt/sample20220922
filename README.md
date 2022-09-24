# 動かし方
`php main.php 1 3 4 reg`  
ターミナルで上記のようなコマンドでmain.phpを作動させます。  
  
main.phpのファイル名のあとに、`大人の人数 子供の人数 シニアの人数 チケットタイプ`を入力します。  
人数は0〜500、チケットタイプは`reg`か`ex`で入力してください。  
`reg`が通常価格、`ex`が特別価格です。  

動作結果の例です。
```
php main.php 10 1 1 ex

販売合計金額
6310円
金額変更前合計金額
6900円
金額変更明細
休日料金 ＋200円
団体割引 -690円
夕方料金 -100円
```