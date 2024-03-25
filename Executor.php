<?php
    class Executor{
        
        private PDO $conn;

        public function __construct(Database $database){
            $this->conn = $database->getConnection();
        }

        public function createTable(array $data,$tblName){
        echo json_encode(["data"=>[$data],"tblName"=>$tblName]);
            // $sql = "CREATE TABLE $tblName(id int(6)auto_increment primary key not null,)"
            // return $data;
        }

        // public function create(array $data): string{
        
        //     $sql ="INSERT INTO product (name,size,is_available)VALUES(:name,:size,:is_available)";
            
        //     $stmt = $this->conn->prepare($sql);
        //     $stmt->bindValue(":name", $data["name"], PDO::PARAM_STR);
        //     $stmt->bindValue(":size", $data["size"]?? 0, PDO::PARAM_INT);
        //     $stmt->bindValue(":is_available", (bool) $data["is_available"]?? false, PDO::PARAM_BOOL);
    
        //     $stmt->execute();
    
        //     return $this->conn->lastInsertId();
        // }

    }
    

