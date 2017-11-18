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
                $this->stmt = $this->pdo->prepare($sql);
                $this->stmt->execute(array());
        $array='';
                while ($row = $this->stmt->fetch(\PDO::FETCH_ASSOC)) {
                   $array[]=$row;
                }
//var_dump($array);
        return $array;

    }


    function execute()
    {

    }

    function condition()
    {
        return $this;
    }
    protected function clean(){
        $this->operator='';
        $this->whatSelect='';
        $this->where='';
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

