<?php




require_once('../../controller/root_controller.php');


$objcontroller = new controller();



if(isset($_GET['value'])):

    $value = $_GET['value'];


    $delete = $objcontroller->delete_into("license_type","license_code",$value);


    if ($delete):

        echo json_encode(array('msg' => 'success'));

    else:

        echo json_encode(array('msg' => 'failed'));

    endif;
else:
    echo json_encode(array('msg' => 'failed'));
    
endif;

?>