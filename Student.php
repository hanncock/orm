<?php
    class Student{
        public string $name;

        public function setName($name){
            $this ->name = $name;
        }

        public function classTableName(){
            $tableName = get_class($this).'s';
            return $tableName;
        }

        public function getName(){
            return $this->name;
        }
    }