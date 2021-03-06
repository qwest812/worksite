<?php
/**
 * Created by PhpStorm.
 * User: PC-1
 * Date: 04.10.2017
 * Time: 13:45
 */

namespace models;


use config\config_Db;

class models_workWithDb
{
    static $pdoConnect;
    protected $operator;
    protected $table;
    protected $whatSelect;
    protected $where;
    protected $sign;
    protected $stmt;
    protected $dsn;
    protected $pdo;
    protected $id;


    function __construct($config)
    {
        $this->dsn = "mysql:host=$config->host;dbname=$config->db;charset=$config->charset";
        $opt = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->pdo = new \PDO($this->dsn, $config->user, $config->pass);
        } catch (\PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }


    }

    function setWhere(array $array)
    {

        $result = 'WHERE';
        foreach ($array as $key => $value) {
            $result .= ' ' . '`' . $key . '`' . ' ' . '=' . ' \'' . $value .'\''. '';
        }
        $this->where = $result;
        return $this;
    }

    function setSign(array $sign = ['='])
    {
        $this->sign = $sign;
        return $this;
    }


    static function connect(config_Db $config)
    {
        if (self::$pdoConnect === null) {
            self::$pdoConnect = new self($config);

        }
        return self::$pdoConnect;
    }


    /**
     * @param $operator
     * @return $this
     * example select/insert/delete/update
     */
    //
    /**
     * @param $array
     * @return $this
     * what we need
     * example select "name"  from ...
     */
    function  param($array)
    {
        return $this;
    }

    /**
     * @return $this
     */
    function select()
    {
        $this->operator = 'SELECT';
        return $this;
    }

    /**
     * @return $this
     */
    function insert()
    {
        $this->operator = 'INSERT';
        return $this;
    }

    /**
     * @return $this
     */
    function delete()
    {
        $this->operator = 'DELETE';
        return $this;
    }

    /**
     *
     */
    function update()
    {
        $this->operator = 'UPDATE';
        return $this;
    }

    /**
     * @param $table
     * @return $this
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }


    /**
     * @param array $whatSelect
     * @return $this
     */
    function setWhatSelect(array $whatSelect = ['*'])
    {

        $result = '';
        if ($whatSelect[0] == '*') {
            $result = $whatSelect[0];
        } else {
            foreach ($whatSelect as $value) {
                $result .= '`' . $value . '`,';

            }
            $result = substr($result, 0, -1);

        }
        $this->whatSelect = $result;
        return $this;
    }

    function  prepareRequest($sql=null)
    {
        if($this->whatSelect==null){

            $this->setWhatSelect();
        }
        if($sql==null){
            $sql = $this->operator . ' ' . $this->whatSelect . ' ' . "FROM" . ' ' . '`' . $this->table . '`' . $this->where;
        }
//var_dump($sql);
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute(array());
        $this->clean();
        while ($row = $this->stmt->fetch(\PDO::FETCH_ASSOC)) {
            yield $row;
        }
        if($this->stmt->rowCount()==0){
                        yield false;
        }

    }
    function prepareRequestReturn($sql=null){
        if($this->whatSelect==null){

                    $this->setWhatSelect();
                }
                if($sql==null){
                    $sql = $this->operator . ' ' . $this->whatSelect . ' ' . "FROM" . ' ' . '`' . $this->table . '`' . $this->where;
                }
//        echo($sql."<br>");
      //  var_dump($sql);
                $this->stmt = $this->pdo->prepare($sql);
                if($this->stmt->execute(array())){
                    $this->id=$this->pdo->lastInsertId();
                    $this->clean();
                            $array='';
                                    while ($row = $this->stmt->fetch(\PDO::FETCH_ASSOC)) {
                                       $array[]=$row;
                                    }
                            return $array;
                }else{
                    return false;
                }


    }

    function condition()
    {
        return $this;
    }
    protected function clean(){
        $this->operator='';
        $this->whatSelect='';
        $this->where='';
        $this->table='';
    }
 function lastId(){
        return $this->id;
    }
    function truncateTable($table){
        $sql='TRUNCATE TABLE `'.$table.'`';
        $this->prepareRequestReturn($sql);
    }
    function lastIdInTabdle($table){
        $sql='SELECT `id` FROM '.$table.' ORDER BY id DESC LIMIT 1';
        $result=$this->prepareRequestReturn($sql);
//        var_dump($result);
//        var_dump($result['id']);
        if(is_array($result)){
            $_SESSION['lastIdInTable']=$result[0]['id'];
            return $result[0]['id'];
        }else{
            $_SESSION['lastIdInTable']='Нет данных';
            return false;
        }

    }
    function getID($table,$param,$value){
            $result=$this->select()->setWhatSelect(['id'])->setTable($table)->setWhere([$param=>$value])->prepareRequestReturn();
            return $result[0]['id'];
        }
    function getInfoById($table,$id){
        $result=$this->select()->setTable($table)->setWhere(['id'=>$id])->prepareRequestReturn();
        return $result[0];
    }
//    function select12($what = '*')
//    {
//        $sql = 'SELECT * name` FROM `all_office` WHERE ?';
//        $stmt = $this->pdo->query('SELECT * FROM `all_office`');
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->execute(array(':name' => 'name'));
//        var_dump($stmt);
//        foreach ($stmt as $row)
//        {
//
//        }
//        while ($row = $stmt->fetch()) {
//            yield $row['name'];
//            echo $row['name'] . "\n";
//        }


}

