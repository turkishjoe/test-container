<?php
/**
 * TODO:
 * Created by PhpStorm.
 * User: prog12
 * Date: 08.03.19
 * Time: 18:44
 */

namespace Model;


abstract class BaseRepository
{
    protected $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findAll(){
        $query = $this->connection->prepare(sprintf('SELECT * from %s', $this->getTableName()));

        return $this->connection->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    abstract protected function getTableName() : string ;
}