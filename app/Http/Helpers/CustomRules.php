<?php
use Route;

class setRuler {

    private $typeName;
    private $tableName;
    private $fieldsList;
    private $exceptsList;
    private $nameRule;

    public function __construct($nameRule){
      $this->nameRule=$nameRule.":";
    }

    public function type($typeName) {
      $this->typeName = "type=".$typeName.",";
      return $this;
    }

    public function table($tableName) {
        $this->tableName = "table=".$tableName.",";
        return $this;
    }

    public function fields($fieldsList) {
      if(is_array($fieldsList)){
        $x=0;
        foreach($fieldsList as $field){
          $this->fieldsList=
            $this->fieldsList." ".$field["name"].$field["value"]." AND ";
          $x++;
        }
      }

      return $this;
    }

    public function excepts($exceptsList) {
      if(is_array($exceptsList)){
        $x=0;
        foreach($exceptsList as $except){
          $this->exceptsList=
            $this->exceptsList
            .",expect.field.$x="
            .$except["name"]
            .",except.value.$x="
            .$except["value"];

          $x++;
        }
      }

      return $this;
    }


    public function __toString() {
      $ret=$this->nameRule.$this->typeName.$this->tableName.$this->fieldsList.$this->exceptsList;
      $ret=str_replace(',,', ',', $ret);

      $ret="select * from ".$this->tableName." where ".$this->fieldsList;

      return $ret;
    }
}

function set__rule($nameRule){
  return new setRuler($nameRule);
}

function get__param($param){
  return Route::current()->getParameter($param);
}

function get__post($postName){
  return Request::input($postName);
}


function get__const($const){
  return constant($const);
}

function is__greater($value){
  return " > '$value'";
}

function is__smaller($value){
  return " < '$value'";
}

function is__between($min, $max){
  return " BETWEEN '$min' AND '$max' ";
}


function is__value($value){
  return "='$value' ";
}
