<?php 

    class Stocks {

        //declare variables
        public $product_id;
        public $name;
        public $stock;
        public $created_date;

        private $conn;
        private $table_name;

        //constructor

        
        public function __construct($db)
        {
            $this->conn =$db;
            $this->table_name ="stocks";
        }

        public function create_data()
        {
            $this->product_id =htmlspecialchars(strip_tags($this->product_id));
            $this->name =htmlspecialchars(strip_tags($this->name));
            $this->stock =htmlspecialchars(strip_tags($this->stock));

           $query = "INSERT INTO
            ". $this->table_name ." SET product_id = '".$this->product_id."',
            name = '".$this->name."',
            stock = ".$this->stock.", created_date = '".$this->created_date."'"; 
           //print_r($query);die;
             //$query ="INSERT INTO " .$this->table_name." SET product_id =".$this->product_id."?,name= ?,stock= ?";

            

            $obj =$this->conn->prepare($query);

         // print_r($this->conn); die;
           // print_r($this->db->conn->error_list); die;
 
           // $obj->bind_param("sss",$this->product_id, $this->name,$this->stock);

           
            if($obj->execute()){

                return true;
            }

            return  "no";
            
        }  
        
        public function get_all_data()
        {
            # code...
            $sql_query = "SELECT * FROM ".$this->table_name;

            $std_obj = $this->conn->prepare($sql_query);

            $std_obj->execute();

            return $std_obj->get_result();
        }
    }
;?>