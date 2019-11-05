<?php

class Validation{
    var $returnVal;

    function validate($value, $name){
       
        $this->returnVal = false;

        if($value != '' && $name == 'firstName'){
            $this->returnVal = $this -> firstName($value);
        }
        elseif($value != '' && $name == 'lastName'){
            $this->returnVal = $this -> lastName($value);
        }
        elseif($value != '' && $name == 'username'){
            $this->returnVal = $this -> username($value);
        }
        elseif($value != '' && $name == 'password'){
            $this->returnVal = $this -> password($value);
        }
        elseif($value != '' && $name == 'phone'){
            $this->returnVal = $this -> phone($value);
        }

        return $this -> returnVal;
    }

    function firstName($value){
        if(preg_match('/(\S\w+)/', $value)){
            return true;
        }
    }
    
    function lastName($value){
        if(preg_match('/(\S\w+)/', $value)){
            return true;
        }
    }
    
    function username($value){
        if(preg_match('/(\S[0-9A-Za-z]{0,255}\w+)/', $value)){
            return true;
        }
    }
    
    function password($value){
        if(preg_match('/(\S[0-9A-Za-z]{0,255}\w+)/', $value)){
            return true;
        }
    }

    function phone($value){
        $number = preg_replace("/\D/", "", $value);
        if(is_numeric($number) && (strlen($number) == 10 || strlen($number) == 11)){
            return true;
        }
    }

}
