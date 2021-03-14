<?php
class report extends connect {


    public function create_report($date,$name,$address,$license,$expiry,$licensetype,$birthday,$nationality,$height,$weight,$plateno,$owner,$owneraddress,$make,$model,$color,$mark,$placeofviolation,$amount,$status,$vehicle_code){
        $sql = $this->Query('citation_reg',
        array(
            'cit_date' => 'cit_date',
            'violator_name' => 'violator_name',
            'violator_address' => 'violator_address',
            'license_number' => 'license_number',
            'expire_date' => 'expire_date',
            'license_code' => 'license_code',
            'violator_bday' => 'violator_bday',
            'nationality' => 'nationality',
            'height' => 'height',
            'weight' => 'weight',
            'plate_number' => 'plate_number',
            'owner_name' => 'owner_name',
            'owners_address' => 'owners_address',
            'make' => 'make',
            'model' => 'model',
            'color' => 'color',
            'marking' => 'marking',
            'location' => 'location',
            'amount' => 'amount',
            'cs_id' => 'cs_id',
            'vehicle_code' => 'vehicle_code',
            'enforcer' => 'enforcer'
        ),'INSERT');


        $insert = $this->db->query_action(
            $sql,
            array(
                $date,
                $name,
                $address,
                $license,
                $expiry,
                $licensetype,
                $birthday,
                $nationality,
                $height,
                $weight,
                $plateno,
                $owner,
                $owneraddress,
                $make,
                $model,
                $color,
                $mark,
                $placeofviolation,
                $amount,
                $status,
                $vehicle_code,
                $_SESSION[session::$user]
            )
        );

        return $insert;
    }

}