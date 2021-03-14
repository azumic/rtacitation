<?php




require_once('../../controller/root_controller.php');


$objcontroller = new controller();


$report = $objcontroller->viewer("citation_reg");



if(!empty($report)):

    foreach($report as $key => $csm):
        $report[$key]['cs_id'] = $objcontroller->search_and_return_a_data("cs_status","cs_id",$csm['cs_id'],"cs_status");
        $report[$key]['vehicle_code'] = $objcontroller->search_and_return_a_data("vehicle_info","vehicle_code",$csm['vehicle_code'],"vehicle_type");
        $report[$key]['location'] = $objcontroller->search_and_return_a_data("location_info","location_code",$csm['location'],"location_name");
        $report[$key]['license_code'] = $objcontroller->search_and_return_a_data("license_type","license_code",$csm['license_code'],"license_typename");
        $report[$key]['enforcer'] = $objcontroller->search_and_return_a_data("administrator","admin_id",$csm['enforcer'],"a_lname");
    endforeach;

endif;



echo json_encode($report);





?>