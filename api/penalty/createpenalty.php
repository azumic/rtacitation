<?php




require_once('../../controller/root_controller.php');


$objcontroller = new penalty();



if(isset($_GET['violation']) && isset($_GET['offense']) && isset($_GET['amount']) ):

    $violation = $_GET['violation'];
    $offense = $_GET['offense'];
    $amount = $_GET['amount'];

    $insert = $objcontroller->create_penalty($violation,$offense,$amount);


    if ($insert):

        echo json_encode(array('msg' => 'success'));

    else:

        echo json_encode(array('msg' => 'failed'));

    endif;
else:
    echo json_encode(array('msg' => 'failed'));
    
endif;

?>