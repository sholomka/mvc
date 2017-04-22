<?php

namespace  Application\Models;

use Application\Core\Model;

class ModelAdd extends Model
{
    /**
     * @var string
     */
    public static $addTask = "INSERT INTO tasks
                              (name, email, description, image)
                              values(?, ?, ?, ?)";

    /**
     * @param $name
     * @param $email
     * @param $description
     * @param $image
     */
    public function addTask($name, $email, $description, $image)
    {
        $stmt = $this->doStatement(self::$addTask, [$name, $email, $description, $image]);

    }
}

