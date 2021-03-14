<?php

class controller extends connect {


    public function viewer($tablename){
        $sql = "SELECT * FROM {$tablename}";
        return $this->db->view($sql);
    }

    public function search_and_return_a_data($table,$row,$tosearch,$toreturn){
        $sql = "SELECT {$toreturn} FROM {$table} WHERE {$row} = '{$tosearch}'";
        $val = $this->db->view($sql,$tosearch);

        return $val[0][$toreturn];
    }

    public function view_single_data($tablename,$row,$value){
        $sql = "SELECT {$row} FROM {$tablename} WHERE {$row} = '$value'";
        return $this->db->view($sql,$value);
        
    }



    public function insert_into($tablename,$rowname,$value){
        $sql = "INSERT INTO {$tablename}({$rowname})
        VALUES ('{$value}')";

            try{
            
            
            $check_existance = $this->view_single_data($tablename,$rowname,$value);

            
            if(empty($check_existance)):

                return $this->db->query_action($sql,array($value));
            
            else:
            
                return false;

            endif;
            
            

            }catch(Exception $E){
                return $E;
            }
    }

    
    public function update_into($tablename,$rowname,$id,$idvalue,$value){

        $sql = "UPDATE {$tablename}
        SET {$rowname} = '{$value}'
        WHERE {$id} = '{$idvalue}'";



        $check_existance = $this->view_single_data($tablename,$rowname,$value);

                    
        if(empty($check_existance)):

            return $this->db->query_action($sql,array($idvalue,$value));

        else:

            return false;

        endif;

        
    }


    public function delete_into($tablename,$rowname,$val){

        $sql = "DELETE FROM {$tablename} WHERE {$rowname} = '{$val}'";

        return $this->db->query_action($sql,array($val));
    }

}