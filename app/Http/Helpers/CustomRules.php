<?php

class setRuler {
    private $typeName;
    private $tableName;
    private $crazyName;


    public function type($typeName) {
        $this->typeName = $typeName;
        return $this;
    }

    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function crazy($crazyName) {
      //$this->crazyName=$crazyName;
      return $crazyName;
    }

    public function __toString() {
        return "type:".$this->typeName." table:".$this->tableName;
    }
}

function setRule(){
  $setRule=new setRule();
  return $setRule;
}
