<?php
class session{
	public $session = null;
	$s= session_id();
        function __construct($db) {
        	 $db->multi_query('CALL select_Session($s)');

        if ($res = $this->db->store_result()) {
            $this->resultData = new ArrayObject($res->fetch_all(MYSQLI_ASSOC));
            $res->free_result();
        }
        }

        
}


?>