<?php
    function Get($url){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res = json_decode(curl_exec($ch));
        curl_close($ch);
        
        return $res;
    }

    function Post($url,$body){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($body));
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            "Content-type: application/json"
        ));
        $res = json_decode(curl_exec($ch));
        curl_close($ch);
        
        return $res;
    }
?>