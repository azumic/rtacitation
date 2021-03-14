<?php




require_once('../../controller/root_controller.php');


$objcontroller = new penalty();



if(isset($_GET['id']) && isset($_GET['violation']) && isset($_GET['offense']) && isset($_GET['amount']) ):

    $reference = $_GET['id'];
    $violation = $_GET['violation'];
    $offense = $_GET['offense'];
    $amount = $_GET['amount'];

    $update = $objcontroller->update_penalty(
        $reference,
        $violation,
        $offense,
        $amount    
    );

    
    if ($update):

        echo json_encode(array('msg' => 'success'));

    else:

        echo json_encode(array('msg' => 'failed'));

    endif;
else:
    echo json_encode(array('msg' => 'failed'));
    
endif;

?>