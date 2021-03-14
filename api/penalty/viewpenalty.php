<?php




require_once('../../controller/root_controller.php');


$objcontroller = new controller();


$license = $objcontroller->viewer("penalty_info");




if(!empty($license)):

    foreach($license as $key => $csm):
        $license[$key]['violation_code'] = $objcontroller->search_and_return_a_data("violation_info","violation_code",$csm['violation_code'],"violation_name");
        $license[$key]['offense_id'] = $objcontroller->search_and_return_a_data("offense_info","offense_id",$csm['offense_id'],"offense_name");
    endforeach;

endif;


echo json_encode($license);





?>