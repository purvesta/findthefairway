<?php

class Validation{
    var $returnVal;

    function validate($value, $name){
       
        $this->returnVal = false;

        if($value != '' && $name == 'txtFirstname'){
            $this->returnVal = $this -> firstName($value);
        }
        elseif($value != '' && $name == 'txtLastname'){
            $this->returnVal = $this -> lastName($value);
        }
        elseif($value != '' && $name == 'txtUsername'){
            $this->returnVal = $this -> username($value);
        }
        elseif($value != '' && $name == 'txtPassword'){
            $this->returnVal = $this -> password($value);
        }
        elseif($value != '' && $name == 'txtPhonenumber'){
            $this->returnVal = $this -> phone($value);
        }

        return ($this -> returnVal);
    }

    function firstName($value){
        if(preg_match('/(\w+)/', $value) === 1){
            return true;
        }
        return false;
    }
    
    function lastName($value){
        if(preg_match('/(\w+)/', $value) === 1){
            return true;
        }
        return false;
    }
    
    function username($value){
        if(preg_match('/(\S[0-9A-Za-z]{0,255}\w+)/', $value) === 1){
            return true;
        }
        return false;
    }
    
    function password($value){
        if(preg_match('/(\S[0-9A-Za-z]{0,255}\w+)/', $value) === 1){
            return true;
        }
        return false;
    }

    function phone($value){
        $number = preg_replace("/\D/", "", $value);
        if(is_numeric($number) && (strlen($number) == 10 || strlen($number) == 11)){
            return true;
        }
        return false;
    }

}
