<?php
session_start();

class DB
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=Veranaturopathe2', 'root', 'root');
    }


    public function select($table, $args = [])
    {
        $where = "";
        if (!empty($args)) {
            $where .= " WHERE ";
            foreach ($args as $key => $value) {
                $where_args[] = "$key=?";
            }
            $where .= implode(' AND ', $where_args);
        }
        $sql = "SELECT * FROM $table $where;";
        $sth =  $this->db->prepare($sql);
        $sth->execute(array_values($args));
        $list = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function get_user($id)
    {
        $list = $this->select('user', ['id' => $id]);
        return current($list);
    }

    public function login($user, $pass)
    {
        $list = $this->select('user', ['name' => $user, 'password' => $pass]);
        if (!empty($list)) {
            return current($list);
        } else {
            return false;
        }
    }
}
