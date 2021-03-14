<?php


class connect{


    protected $db;

    public function __construct(){
        $this->db = new database();
    }



    protected function Query($ColumTable = null,$Arguments = null,$Statement = null){
        if(!is_null($ColumTable) && !is_null($Statement)){
            $stmt = Helper::CleanValues(strip_tags($Statement));
            switch($stmt){
            case "SELECT":
                $State = array(" SELECT "," FROM ");
            break;
            case "UPDATE":
                $State = array(" UPDATE ", " SET ");
            break;
            case "INSERT":
                $State = array(" INSERT INTO ", " VALUES ");
            break;
            case "DELETE":
                $State = " DELETE FROM ";
            break;
            default:
            return "Unknown Query";
            break;
            }

            if(is_array($ColumTable)){
                foreach($ColumTable as $Cols){
                    $SelectOut[] = Helper::CleanValues(strip_tags($Cols));
                }
            }
            if(is_array($Arguments)){
                switch($Statement){
                    case "SELECT":
                        foreach($Arguments as $Args){
                            $ArugmentsOut[] = Helper::CleanValues(strip_tags($Args));
                        }
                    break;
                    case "UPDATE":
                        foreach($Arguments as $Args => $Changes){
                            $ArugmentsOut[] = Helper::CleanValues(strip_tags($Args))." = ".$Changes;
                        }
                    break;
                    case "INSERT":
                        foreach($Arguments as $Args => $Changes){
                            $ArugmentsOut1[] = Helper::CleanValues(strip_tags($Args));
                            $ArugmentsOut2[] = ":".Helper::CleanValues($Changes);
                        }
                        
                    break;
                }
               
            }
         
            if($Statement == "DELETE"):
                return $State. Helper::CleanValues($ColumTable);
            endif;


            if($Statement == "INSERT"){
                $CheckColumn = Helper::CleanValues($ColumTable);
                $CheckArgument2 = is_array($Arguments) ? "(".implode(" , ",$ArugmentsOut1).")".$State[1]."(".implode(" , ",$ArugmentsOut2).")" : "(".Helper::CleanValues($Arguments).")".$State[1]."(:".Helper::CleanValues($Arguments).")"; 
                $val = $State[0].$CheckColumn.$CheckArgument2;
                return $val;
            }else{
                   
            $CheckColumn = is_array($ColumTable) ? implode(",",$SelectOut) : Helper::CleanValues($ColumTable);
            $CheckArguments = is_array($Arguments) ? implode(",",$ArugmentsOut) : $Arguments;
                if(strtolower($CheckColumn)=="all")
                {
                    $CheckColumn = "*";
                }
                $val = $State[0].$CheckColumn.$State[1].$CheckArguments;
                return $val;
            }

           
        }
    }

    protected function WhereClause($Value = null){
        if(!is_null($Value)){
            if(is_array($Value)){   
                foreach($Value as $Keys => $vals){
                    $out[] = Helper::CleanValues(strip_tags($Keys))." = ".$vals;
                }
            }
            $CheckingWhereClause = is_array($Value) ? " WHERE ".implode(" AND ",$out) : " WHERE ".Helper::CleanValues($Value)." = :".Helper::CleanValues($Value);

     
        return $CheckingWhereClause;
        }
    }


    protected function CheckerifExist($ToCheck,$ReturnVal,$TheWhereClause,$TheFromClause,$TheSelectClause){
        $sql = $this->Query($TheSelectClause,$TheFromClause,"SELECT").$this->WhereClause($TheWhereClause);
        return $this->db->Checker($sql,$ToCheck,$ReturnVal);
    }
    

    protected function Generate($column,$table,$where,$lenght = 2){
        if(!empty($column) && !empty($table) && !empty($where)){
        GenerateNew:do
		{
			$Check = Helper::RandomGen($lenght);
				$sql = $this->Query($column,$table,"SELECT").$this->WhereClause($where);
					$Exist = $this->db->SelectStatement($sql,$Check,true);

			if($Exist)
			{
			goto GenerateNew;
			}
			else
			{
				return $Check;
			}
			
		}
		while(true);
            }
    }


}