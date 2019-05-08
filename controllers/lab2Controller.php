<?php
require_once("core/Controller.php");
class Lab2Controller extends Controller
{
    public function __construct()
    {
        $this -> model = $this -> model("lab2Model");
    }

    public function index()
    {
        if($this -> isLoggedIn())
        {
            $list = array();
            $list = $this -> model -> getTableNames();
            $data['list'] = $list;
            $this -> loadView("lab2", $data);
        }else $data['error'] = "You must be logged in to view this page";
            $this -> loadView("lab2", $data);
    }

    public function table($args = array())
    {
        if(isset($_POST['tableName']))
        {
            $tableName = $_POST['tableName'];
            $table = $this -> model -> getTableData($tableName);
            $data['tableName'] = $_POST['tableName'];
            $data['table'] = $table['table'];
            $data['heads'] = $table['heads'];

            $data['list'] = $this -> model -> getTableNames();

            $this -> loadView("lab2", $data);

        }

    }
    public function remove($args = array())
    {
        $table = $args[2];
        $id = $args[3];
        $q = "DELETE from $table WHERE id = $id";

        $result = $this -> model -> db -> query($q);

        if($result)
        {
            echo "Row Successfully deleted.";

        }else echo $this -> model -> db -> error;
    }

}
