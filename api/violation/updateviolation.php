<?php




require_once('../../controller/root_controller.php');


$objcontroller = new controller();



if(isset($_GET['value']) && isset($_GET['id']) ):

    $value = $_GET['value'];

    $id = $_GET['id'];

    $update = $objcontroller->update_into("violation_info","violation_name","violation_code",$id,strtolower($value));

    
    if ($update):

        echo json_encode(array('msg' => 'success'));

    else:

        echo json_encode(array('msg' => 'failed'));

    endif;
else:
    echo json_encode(array('msg' => 'failed'));
    
endif;

?>