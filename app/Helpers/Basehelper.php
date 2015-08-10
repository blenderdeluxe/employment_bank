<?php
 namespace employment_bank\Helpers;

class Basehelper {

    public static function getAppName(){
        //return 'Employment Bank -Arunachal Pradesh';
        return '<b>Employment Bank </b>Arunachal Pradesh';
    }

    public static function sendSMS($number, $message){

        $mobile = $number;

        $Text = $message;
        $ccname = str_replace(' ','+',$Text);
        $Text=$ccname;

        //$ID=" ";
        //$Password=" ";

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //curl_setopt($ch, CURLOPT_URL, "http://t.onetouchsms.in/sendsms.jsp?user=".$ID."&password=".$Password."&mobiles=".$mobile."&sms=".$Text."&senderid=".$Sid);
        curl_setopt($ch, CURLOPT_HEADER, 2);
        curl_exec($ch);
        curl_close($ch);
    }
}
