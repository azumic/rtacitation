<?php

require_once('../../controller/root_controller.php');


$objcontroller = new user();



if(isset($_POST['first']) && isset($_POST['middle']) && isset($_POST['last']) && isset($_POST['position']) && isset($_POST['user']) && isset($_POST['pass'])):



    $insert = $objcontroller->register_account(
        $_POST['first'],
        $_POST['middle'],
        $_POST['last'],
        $_POST['position'],
        $_POST['user'],
        $_POST['pass']
    );


    if ($insert):

        echo json_encode(array('msg' => 'success'));

    else:

        echo json_encode(array('msg' => 'failed'));

    endif;
else:
    echo json_encode(array('msg' => 'failed'));
    
endif;

?>