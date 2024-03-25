<?php
    class TestModel extends ORMMapper{
        private $tableName = 'users';
        function __construct()
        {
            parent::__construct();
            parent::setTableName($this->tableName);
        }
        }
?>