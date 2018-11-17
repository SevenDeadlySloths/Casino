<?php
class DB{
        public $con = null;

        function __construct() {
                $this->con = new mysqli('localhost', 'root', '','casino');
        }

        function __destruct(){
                $this->con->close(); 
        }
}


?>
