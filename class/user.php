<?php 

class user extends connect {


    public function login ($user,$pass){
        $sql = $this->Query(
                        array(
                        'a_fname',
                        'a_mname',
                        'a_lname',
                        'position',
                        'admin_id'),
                        'administrator',
                        "SELECT").
                        
                        $this->WhereClause(
                            array(
                                'username' => ':username',
                                'password' => ':password'
                                )
                );
        $user =  $this->db->view($sql,array($user,$pass),true);


        if(!empty($user)){
            $_SESSION[session::$user] = $user[0]['admin_id'];
            $_SESSION[session::$role] = $user[0]['position'];

            return true;
        }

        return false;
    }

    public function get_user_data(){
                $sql = $this->Query(
                        array(
                        'a_fname',
                        'a_mname',
                        'a_lname',
                        'position',
                        'date_of_hired'),
                        'administrator',
                        "SELECT").
                        
                        $this->WhereClause(
                         'admin_id');
                $user = $this->db->view($sql,array($_SESSION[session::$user]),true);
                return array_shift($user);
    }

    public function get_all_user(){


        $sql = $this->Query(
            array(
            'a_fname',
            'a_mname',
            'a_lname',
            'position',
            'date_of_hired',
            'username'
            ),
            'administrator',
            "SELECT");

        return $this->db->view($sql);
                
    }

    public function register_account($first,$middle,$last,$position,$user,$pass){

        $searchQuery = $this->Query('username','administrator','SELECT').$this->WhereClause('username');
        
        $searching = $this->db->view($searchQuery,array($user),true);

        if(empty($searching)):

            $sql = $this->Query('administrator',
            array(
                'a_fname' => 'a_fname',
                'a_mname' => 'a_mname',
                'a_lname' => 'a_lname',
                'position' => 'position',
                'date_of_hired' => 'date_of_hired',
                'username' => 'username',
                'password' => 'password',
            ),'INSERT');
    
            $date = date("Y-m-d");
            return $this->db->query_action($sql,array($first,$middle,$last,$position,$date,$user,$pass),true);

        endif;

        return false;
    }

    public function update_account_credential($first,$middle,$last){
        $sql = $this->Query('administrator',array(

            'a_fname' => ':a_fname',
            'a_mname' => ':a_mname',
            'a_lname' => ':a_lname'


        ),'UPDATE').$this->WhereClause('admin_id');

        return $this->db->query_action($sql,array($first,$middle,$last,$_SESSION[session::$user]));
    }

    public function get_current_password(){

        $sql = $this->Query('password','administrator','SELECT').$this->WhereClause('admin_id');

        $pass = $this->db->view($sql,array($_SESSION[session::$user]),true);

        return $pass[0]['password'];

    }

    public function update_password($pass){
        $sql = $this->Query('administrator',array(

            'password' => ':password'


        ),'UPDATE').$this->WhereClause('admin_id');

        return $this->db->query_action($sql,array($pass,$_SESSION[session::$user]));

    }

}