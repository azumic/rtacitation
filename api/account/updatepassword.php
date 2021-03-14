<?php




require_once('../../controller/root_controller.php');


    if(session::isLogin()){
        $objcontroller = new user();



        if($_POST['current'] == $objcontroller->get_current_password()):

            if($_POST['confirm'] == $_POST['change']):
            $accounts = $objcontroller->update_password(
                $_POST['change']
            );

                if($accounts):
                    echo json_encode(array('msg'=> 'success'));
                    else:
                    echo json_encode(array('msg'=> 'failed'));
                endif;


            else:
                echo json_encode(array('msg'=> 'password doesnt match'));
            endif;

        else:
            echo json_encode(array('msg'=> 'wrong password'));
        endif;


    }else{
        echo json_encode(array('msg'=> 'failed'));
    }


?>