<?php




require_once('../../controller/root_controller.php');


$objcontroller = new controller();



if(isset($_GET['value'])):

    $value = $_GET['value'];


    $insert = $objcontroller->insert_into("cs_status","cs_status",strtolower($value));


    if ($insert):

        echo json_encode(array('msg' => 'success'));

    else:

        echo json_encode(array('msg' => 'failed'));

    endif;
else:
    echo json_encode(array('msg' => 'failed'));
    
endif;

?>