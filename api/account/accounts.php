<?php




require_once('../../controller/root_controller.php');


$objcontroller = new user();


$accounts = $objcontroller->get_all_user();


echo json_encode($accounts);


?>