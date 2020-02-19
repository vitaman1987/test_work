<?php

class ActiveRecord
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * @var array
     */
    private $settings;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * ActiveRecord constructor.
     */
    public function __construct()
    {
        $this->settings = require '../config/db.php';
        $this->pdo = new \PDO(
            'mysql:host=' . $this->settings['host']
            . ';port=' . $this->settings['port']
            . ';dbname=' . $this->settings['name'],
            $this->settings['user'],
            $this->settings['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    /**
     * @param array $values
     * @return void
     */
    public function create(array $values): void
    {
        foreach ($values as $key => $value) {
            $values[$key] = "'$value'";
        }

        $this->query(
            'insert into '. $this->tableName
                . '(' . implode(',', array_keys($values)) . ')'
                . 'values (' .  implode(',', array_values($values)) . ');'
        );
    }

    /**
     * @return array|null
     */
    public function all(): ?array
    {
        return $this->query('select * from ' . $this->tableName);
    }

    /**
     * @param string $sql
     * @param array $params
     * @return mixed
     */
    private function query(string $sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        return $sth->execute() ? $sth->fetchAll() : null;
    }
}