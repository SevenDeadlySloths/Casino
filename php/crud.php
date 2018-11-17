
<?php
include 'ChromePHP.php';
include 'db.php';
include 'session.php';

$db = new DB();
$session= new session($db);

$method = $_SERVER['REQUEST_METHOD'];

$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
echo json_encode($request);

switch ($method) {
  case 'POST':
        $data = $_POST['data'];

        switch ($request[0]){
                case 'insertSlot':
                               include "slots.php";
                               $slots = new Slots($db->con,$data);
                               echo json_encode($slots->insert());
                    break;
                case 'updateSlot':
                               include "slots.php";
                               $slots = new Slots($db->con,$data);
                               echo json_encode($slots->update());
                    break;
                default:
                    echo json_encode('nok');
                    break;
        }
        break;

  case 'GET':
        $data = $request[1];
        switch ($request[0]){
                
                case 'selectSlot':
                               include "slots.php";
                               $slots = new Slots($db->con,$data);
                               echo json_encode($slots->select());
                    break;
                case 'deleteSlot':
                               include "slots.php";
                               $slots = new Slots($db->con,$data);
                               echo json_encode($slots->delete());
                    break;
                default:
                    echo json_encode('nok');
                    break;
        }
    break;

  default:
    echo json_encode('nok');
    break;
}

?>

