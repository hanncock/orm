<?php
    class Controller{

        public function __construct($gateway){

            $this->gateway = $gateway;
        }
        
        public function processRequest(string $method, $tblName, ?array $values){


        
            switch($method){
                case "GET":
                    echo json_encode('returning the get request');
                    break;

                case "POST":
                    echo json_encode('returning the post values');
                    break;
                
                default:
                    http_response_code(405);
                    header("ALLOW: GET, PATCH, DELETE");
                    break;
                    
            }
            // if($values){
    
            //     $this->processResourceRequest($method, $values, $tblName);

            // }else{

            //     $this->processCollectionRequest($method);

            // }
               
            // echo $method;
            // echo "creating a table ".$tblName;
        }

        // private function processResourceRequest(string $method, array $values, $tblName): void{
             
        //     $product = $this->gateway->createTable($values,$tblName);

        //     // if(!$product){
        //     //     http_response_code(404);
        //     //     echo json_encode(["message" => "Product not found"]);
        //     //     return;
        //     // }

        //     switch($method){
        //         case "GET":
        //             // echo "getting values";
        //             break;
            
        //         default:
        //             http_response_code(405);
        //             header("ALLOW: GET, PATCH, DELETE");
        //             break;
        //     }
        // }

        // private function processCollectionRequest(){

        // }

    }