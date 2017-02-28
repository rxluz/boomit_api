<?php

class setRule {
    private $typeName;
    private $tableName;


    public function type($typeName) {
        $this->typeName = $typeName;
        return $this;
    }

    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function __toString() {
        return "type:".$this->typeName." table:".$this->tableName;
    }
}


$setRule=new SetRule();
