<?php




require_once('../../controller/root_controller.php');


$objcontroller = new user();



    if(isset($_POST['user']) && isset($_POST['pass'])):


        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $auth = $objcontroller->login($user,$pass);

        if($auth){
            echo json_encode(array('msg'=>'success'));
        }else{
            echo json_encode(array('msg'=>'failed'));
        }


    else:
        echo json_encode(array('msg'=>'cannot perform action'));
    endif;




?>