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
            $this->fieldsList
            .",field.$x="
            .$field["name"]
            .",value.$x="
            .$field["value"];

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
      return $ret;
    }
}

function set__rule($nameRule){
  return new setRuler($nameRule);
}

function get__param($param){
  return Route::current()->getParameter($param);
}

function get__const($const){
  return "const@".$const;
}

function is__greater($value){
  return "greater@".$value;
}

function is__smaller($value){
  return "smaller@".$value;
}

function is__between($min, $max){
  return "between@".$min."^".$max;
}
