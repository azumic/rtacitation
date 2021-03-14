<?php




require_once('../../controller/root_controller.php');


$objcontroller = new controller();


$license = $objcontroller->viewer("vehicle_info");


echo json_encode($license);


?>