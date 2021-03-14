<?php




require_once('../../controller/root_controller.php');


$objcontroller = new report();



if(
    
    isset($_POST['date']) &&
    isset($_POST['name']) &&
    isset($_POST['address']) &&
    isset($_POST['license']) &&
    isset($_POST['expiry']) &&
    isset($_POST['licensetype']) &&
    isset($_POST['birthday']) &&
    isset($_POST['nationality']) &&
    isset($_POST['height']) &&
    isset($_POST['weight']) &&
    isset($_POST['plateno']) &&
    isset($_POST['owner']) &&
    isset($_POST['owneraddress']) &&
    isset($_POST['make']) &&
    isset($_POST['model']) &&
    isset($_POST['color']) &&
    isset($_POST['mark']) &&
    isset($_POST['placeofviolation']) &&
    isset($_POST['amount']) &&
    isset($_POST['status']) &&
    isset($_POST['vehicletype'])
):


    
    $insert = $objcontroller->create_report(
        $_POST['date'],
        $_POST['name'],
        $_POST['address'],
        $_POST['license'],
        $_POST['expiry'],
        $_POST['licensetype'],
        $_POST['birthday'],
        $_POST['nationality'],
        $_POST['height'],
        $_POST['weight'],
        $_POST['plateno'],
        $_POST['owner'],
        $_POST['owneraddress'],
        $_POST['make'],
        $_POST['model'],
        $_POST['color'],
        $_POST['mark'],
        $_POST['placeofviolation'],
        $_POST['amount'],
        $_POST['status'],
        $_POST['vehicletype']
    );


    if ($insert):

        echo json_encode(array('msg' => 'success'));

    else:

        echo json_encode(array('msg' => 'failed'));

    endif;
else:

    
    echo json_encode(array('msg' => 'yawa'));
    
endif;

?>