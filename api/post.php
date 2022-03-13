<?php 


    header("Access-Control-Allow-Origin: *"); // allow all origins or any domain
    header("Content-type: application/json; charset=UTF-8"); //
    header("Access-Control-Allow-Methods: POST"); //method type
    
    //includes

    include_once("../config/database.php");
    include_once("../classes/stocks.php");

    $db = new Database();

    $connection  = $db->connect();

    $stock = new Stocks($connection);
    //print_r($connection); die;

    if($_SERVER["REQUEST_METHOD"]==="POST"){

        $data= json_decode(file_get_contents("php://input"));
       // print_r($data);die;

        if(!empty($data->product_id) && !empty($data->name) && !empty($data->stock)){
          
            $stock->product_id =$data->product_id;
            $stock->name =$data->name;
            $stock->stock =$data->stock; 
            $stock->created_date =$data->created_date;
     
            if($stock->create_data()){
                
                http_response_code(200);
                echo json_encode(array(
                    "code" => "0",
                    "msg" => "success",
                    "data" => $data

                ));
    
            }else{

                http_response_code(500);//internal server error
                echo json_encode(array(
                    "code" => "1",
                    "msg" => "failed",
                    "data" => $data

                ));
    
            }   
            
        }else  {
            http_response_code(404);//missed value
            echo json_encode(array(
                "code" => "2",
                "msg" => "Missed data,check the value"
               

            ));
        }

      
    }else{
        echo "Access denied";
    }
?>