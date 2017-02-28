<?php

class setRuler {

    private $typeName;
    private $tableName;
    private $fieldsList;

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
            .",field[$x]="
            .$field["name"]
            .",value[$x]="
            .$field["value"];

          $x++;
        }
      }
        //$this->tableName = "table=".$tableName.",";
        return $this;
    }


    public function __toString() {
        return $this->typeName.$this->tableName.$this->fieldsList;
    }
}

function setRule(){
  return new setRuler();
}

function get__param($param){
  return "param@".$param;
}

function get__const($const){
  return "const@".$const;
}
