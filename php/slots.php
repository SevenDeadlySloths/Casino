<?php
class Slots {

        private $resultData = null;
    private $db = null;
    private $data = null;

        function __construct($dbCon,$data) {
        $this->db = $dbCon;
        $this->data = $data;

        $this->loadData();
    }

    private function loadData(){
        $this->db->multi_query('CALL select_Slots('.$this->data.')');

        if ($res = $this->db->store_result()) {
            $this->resultData = new ArrayObject($res->fetch_all(MYSQLI_ASSOC));
            $res->free_result();
        }
    }

    public function insert(){
        ChromePhp::log("insert");
    }

    public function update(){
        return $this->resultData;
    }

    public function select(){
        return $this->resultData;
    }

    public function delete(){
        ChromePhp::log("delete");
    }
}
?>
