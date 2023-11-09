<?php

namespace App\Db;
use \PDO;
use \PDOException;

class Database{
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DBNAME = 'vagas_estudo';

    private $table;
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){    
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASS);

            //Quando ocorre algum tipo de erro de sintaxe ou no banco em si, o PDO lança um warning, logo, o sistema continua rodando
            //quero que ele trave o sistema em situações assim, logo 
            //abaixo temos alguns atributos do proprio PDO para nos auxiliar nisso, e lançar a exception como erro.
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query, $params = []){
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function insert($values){
        $fields = array_keys($values);
        //array_pad -> função legal
        $binds = array_pad([], count($fields), '?');
        
        //monta a query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
        
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = isset($where) ? 'WHERE '.$where : '';
        $order = isset($order) ? 'ORDER BY '.$order : '';
        $limit = isset($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }


    public function update($where, $values){
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode(' = ?, ', $fields).' = ? WHERE '.$where;
        $this->execute($query, array_values($values));
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        return true;
    }




}