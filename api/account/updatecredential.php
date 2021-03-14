<?php




require_once('../../controller/root_controller.php');


    if(session::isLogin()){
        $objcontroller = new user();


        $accounts = $objcontroller->update_account_credential(
            $_POST['first'],
            $_POST['middle'],
            $_POST['last']
        );

        if($accounts){
            $store = array($_POST['first'],$_POST['middle'],$_POST['last']);
            echo json_encode(array('msg'=> $store ));
        }else{
            echo json_encode(array('msg'=> 'failed'));
        }
    }else{
        echo json_encode(array('msg'=> 'failed'));
    }


?>