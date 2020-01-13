<?php
function convertToNumber($number){
    $unitNumber1 = ['','ngàn','triệu','tỉ'];
    $singleNumber = ['','một','hai','ba','bốn','năm','sáu','bảy','tám','chín','mười','mười một','mười hai','mười ba','mười bốn','mười năm','mười sáu','mười bảy','mười tám','mười chín'];
    $unitNumber = ['2'=>'chục','3'=>'trăm'];
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
        $ten = (int) ($numArr[$i] % 100);
        if($ten < 20){
            if($ten > 10){
                $word .= $strHundred.' '.$singleNumber[$ten].' '.$unitNumber1[$level].' ';
            }else if($ten == 0){
                $word .= $strHundred.''.$singleNumber[$ten].' '.$unitNumber1[$level].' ';
            }else{
                $word .= $strHundred.' lẻ '.$singleNumber[$ten].' '.$unitNumber1[$level].' ';
            }
        }else{
            $double = (int) ($ten / 10);
            $strDouble = $double ? $singleNumber[$double].' mươi': '';
            if($double < 2){
                $single = (int) ($ten % 10);
                $strSingle = $single ?' lẻ '.$singleNumber[$single] : '';
            }else{
                $single = (int) ($ten % 10);
                $strSingle = $single ?' '.$singleNumber[$single] : '';
            }
            $word .= $strHundred.' '.$strDouble.''.$strSingle.' '.$unitNumber1[$level].' ';
        }
    }
    $word = preg_replace("/^\s+/", "", $word);
    echo ucfirst($word);
}
convertToNumber(600525702815);






