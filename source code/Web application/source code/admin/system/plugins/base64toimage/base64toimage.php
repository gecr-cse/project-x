<?php

class base64ToImage{
    function baseToimage($base64,$path){
        $data = explode(',', $base64);
        $file_extension=$this->GetBetween("/",";",$data[0]);
        $date = date_create();
        $rand=rand(5, 15);
        $filename=date_timestamp_get($date).$rand.".".$file_extension;
        $ifp = fopen($path.$filename, "wb");
        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);
        return $filename;
    }
    function GetBetween($var1="",$var2="",$pool){
        $temp1 = strpos($pool,$var1)+strlen($var1);
        $result = substr($pool,$temp1,strlen($pool));
        $dd=strpos($result,$var2);
        if($dd == 0){
            $dd = strlen($result);
        }
        return substr($result,0,$dd);
    }
}

?>