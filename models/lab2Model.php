<?php
require_once("core/Model.php");

class Lab2Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTableNames()
    {
        $result = $this -> db -> query("SHOW TABLES;");
        $tables = array();
        while($row = $result -> fetch_row())
            $tables[] = $row[0];

        return $tables;
    }

    public function getTableData($tableName)
    {

        $result = $this -> db -> query("SELECT * FROM $tableName");
        if($result)
        {
            $table = array();
            $row1 = $result -> fetch_assoc();
            $heads = array();
            $rowTemp = array();

            foreach($row1 as $key => $value)
            {
                $heads[] = $key;
                $rowTemp[] = $value;
            }

            $table[] = $rowTemp;


            while($row = $result -> fetch_row())
            {
                $table[] = $row;
            }

            $data['heads'] = $heads;
            $data['table'] = $table;
            return $data;
        }else return array();
    }
}
