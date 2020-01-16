<?php
function convertToNumber($number){
    $unitNumber1 = ['','nghìn','triệu','tỉ'];
    $singleNumber = ['','một','hai','ba','bốn','năm','sáu','bảy','tám','chín','mười','mười một','mười hai','mười ba','mười bốn','mười lăm','mười sáu','mười bảy','mười tám','mười chín'];
    $numberThanTwenty = ['','mốt','hai','ba','tư','lăm','sáu','bảy','tám','chín','mười','mười một','mười hai','mười ba','mười bốn','mười lăm','mười sáu','mười bảy','mười tám','mười chín'];
    $strNumber = (string) ($number);
    $lengthNumber = strlen(strval($strNumber));
    $level =(int) (($lengthNumber+2)/3);
    $maxNumber = $level * 3;
    $number = substr('00'.$number,-$maxNumber);
    $numArr = str_split($number,3);
    $word='';
    for($i=0;$i<count($numArr);$i++){
        $level--;
        $hundred = (int) ($numArr[$i] / 100);
        $strHundred = $hundred ? $singleNumber[$hundred].' trăm': '';
        $double = (int) ($numArr[$i] % 100);
        $doubleInt = (int) ($double/10);
        if($double == 0){
            $doubleNumber = $singleNumber[$double%10];
        }elseif ($double < 10){
            $doubleNumber = 'lẻ '.$singleNumber[$double%10];
        }elseif (($double >= 10) && ($double <20)){
            $doubleNumber = $singleNumber[$double];
        }else{
            $doubleNumber = $singleNumber[$doubleInt].' mươi '.$numberThanTwenty[$double%10];
        }
        $numArr[$i] == 000 ? : $word .= $strHundred.' '.$doubleNumber.' '.$unitNumber1[$level].' ';
    }
    $word = preg_replace("/^\s+/", "", $word);
    echo ucfirst($word);
}
convertToNumber(800123000812);






