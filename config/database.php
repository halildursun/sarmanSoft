<?php 

    class Database {

        //variables
        public $hostname ;
        public $dbname ;
        public $username ;
        public $password ;

        public $conn;
       
            

        public function connect(){
           
            $this->hostname ="localhost";
            $this->dbname   ="sarmansoft";
            $this->username   ="root";
            $this->password  ="";

            $this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
          
            if($this->conn->connect_errno){
                //has error
                print_r($this->conn->connect_errno);
                exit;
            }else{
                //no error
                return $this->conn;
               // echo "---- succesful ----";
                //print_r($this->conn);
            }

        }

    }

   


;?>