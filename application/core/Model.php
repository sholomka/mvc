<?php

namespace  Application\Core;

use Application\Core\ApplicationRegistry;

abstract class Model
{
    /**
     * @var \PDO
     */
    private static $DB;

    /**
     * @var array
     */
    private static $statements = [];

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $registry = ApplicationRegistry::instance();
        $registry->init();
        $dsn = $registry->getDSN();
        $username = $registry->getUserName();
        $password = $registry->getPassword();
        $registry->ensure($dsn, 'DSN не определен');
        self::$DB = new \PDO($dsn, $username, $password);
        self::$DB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param $statement
     * @return mixed|\PDOStatement
     */
    private function prepareStatement($statement)
    {
        if (isset(self::$statements[$statement])) {
            return self::$statements[$statement];
        }
        
        $stmtHandle = self::$DB->prepare($statement);
        self::$statements[$statement] = $stmtHandle;

        return $stmtHandle;
    }

    /**
     * @param $statement
     * @param array|null $values
     * @return mixed|\PDOStatement
     */
    protected function doStatement($statement, array $values = null)
    {
        $sth = $this->prepareStatement($statement);
        $sth->closeCursor();
        $dbResult = $sth->execute($values);

        return $sth;
    }
}

