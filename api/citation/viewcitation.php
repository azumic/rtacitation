<?php




require_once('../../controller/root_controller.php');


$objcontroller = new controller();


$license = $objcontroller->viewer("cs_status");


echo json_encode($license);


?>