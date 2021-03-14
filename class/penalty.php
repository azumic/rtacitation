<?php 

class penalty extends connect {



    public function create_penalty($violation,$offense,$amount){
        $sql = $this->Query('penalty_info',array('violation_code' => 'violation_code', 'offense_id' => 'offense_id', 'amount' => 'amount'),'INSERT');
        return $this->db->query_action($sql,array($violation,$offense,$amount),true);
    }

    public function update_penalty($reference,$violation,$offense,$amount){

        $sql = $this->Query
        (
            'penalty_info',
            array('violation_code' => ':violation_code', 'offense_id' => ':offense_id', 'amount' => ':amount'),
            'UPDATE'
        ).
        $this->WhereClause('penalty_id');

        return $this->db->query_action($sql,array($violation,$offense,$amount,$reference));

    }


}