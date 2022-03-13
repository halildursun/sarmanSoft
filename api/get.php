<?php 


    header("Access-Control-Allow-Origin: *"); // allow all origins or any domain
    header("Content-type: application/json; charset=UTF-8"); //data type
    header("Access-Control-Allow-Methods: GET"); //method type
    
    //includes

    include_once("../config/database.php");
    include_once("../classes/stocks.php");

    $db = new Database();

    $connection  = $db->connect();

    $stock = new Stocks($connection);
    //print_r($connection); die;

    if($_SERVER["REQUEST_METHOD"]==="GET"){

        $data = $stock->get_all_data();
      // print_r($data);die;
        
        if($data->num_rows > 0){// we have data

            while($row = $data->fetch_assoc()){

                $stock_arr[] = array(
                  "product_id" => $row['product_id'],
                  "name" => $row["name"],
                  "stock" => $row['stock'],
                  "created_date" => $row["created_date"]
                );
             }
       
              http_response_code(200); // Ok
              echo json_encode(array(
                "code" => "0",
                "msg" => "success",
                "data" => $stock_arr
              ));
    
    }else{

        http_response_code(503);//service unaviable
        echo json_encode(array(
            "code" => "3",
            "msg" => "Access denied"
            
        ));
    }
    }
    
?>