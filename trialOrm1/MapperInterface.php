<?php
    interface MapperInterface{

        function findById($id);
        
        function save();
        
        function loadClassProperties();
    }
?>