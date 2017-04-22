<?php

namespace Application\Core;

use  Application\Exceptions\AppException;
use  Application\Core\Request;

class ApplicationRegistry
{
    /**
     * @var null
     */
    private static $instance = null;

    /**
     * @var
     */
    private $config;

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var
     */
    private $request;

    /**
     * ApplicationRegistry constructor.
     */
    private function __construct()
    {
        $this->config = realpath(implode(DIRECTORY_SEPARATOR, array(__DIR__, '..', 'config', 'config.php')));
    }

    /**
     * @param $key
     * @return mixed|null
     */
    private function get($key)
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }

        return null;
    }

    /**
     * @param $key
     * @param $val
     */
    private function set($key, $val)
    {
        $this->values[$key] = $val;
    }

    /**
     *
     */
    private function getOptions()
    {
        $this->ensure(file_exists($this->config), 'Файл конфигурации не найден');
        $options = require_once($this->config);

        $dsn = 'mysql:host='. $options['db']['host'] .';dbname='. $options['db']['dbname'] .';charset='. $options['db']['charset'];
        $username = $options['db']['username'];
        $password = $options['db']['password'];

        self::setDSN($dsn);
        self::setUserName($username);
        self::setPassword($password);
    }

    /**
     * @param $dsn
     */
    private static function setDSN($dsn)
    {
        self::instance()->set('dsn', $dsn);
    }

    /**
     * @param $username
     */
    private static function setUserName($username)
    {
        self::instance()->set('username', $username);
    }

    /**
     * @param $password
     */
    private static function setPassword($password)
    {
        self::instance()->set('password', $password);
    }

    /**
     * @param $expr
     * @param $message
     * @throws \Exception
     */
    public function ensure($expr, $message)
    {
        if (!$expr) {
            throw new AppException($message);
        }
    }

    /**
     * @return ApplicationRegistry|null
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return mixed|null
     */
    public static function getDSN()
    {
        return self::instance()->get('dsn');
    }

    /**
     * @return mixed|null
     */
    public static function getUserName()
    {
        return self::instance()->get('username');
    }

    /**
     * @return mixed|null
     */
    public static function getPassword()
    {
        return self::instance()->get('password');
    }

    /**
     * @return \Application\Core\Request
     */
    public static function getRequest()
    {
        $instance = self::instance();

        if (is_null($instance->request)) {
            $instance->request = new Request();
        }

        return $instance->request;
    }

    /**
     *
     */
    public function init()
    {
        $dsn = self::getDSN();

        if (!is_null($dsn)) {
            return;
        }

        $this->getOptions();
    }
}