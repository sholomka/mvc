<?php

namespace  Application\Models;

use Application\Core\Model;

use Application\Core\SimPageNav;

/**
 * Class ModelAdmin
 * @package Application\Models
 */
class ModelAdmin extends Model
{
    /**
     * Запрос на подсчет всех задач
     *
     * @var string
     */
    public static $allTasks = "SELECT COUNT(*) FROM tasks";

    /**
     * Запрос на вывод всех задач
     *
     * @var string
     */
    public static $getTasks = "SELECT 
                                   id,
                                   name, 
                                   email, 
                                   description, 
                                   image, 
                                   status
                               FROM tasks";

    /**
     * @return array
     */
    public function getData()
    {
        $stmt = $this->doStatement(self::$getTasks);

        if ($result = $stmt->fetchAll(\PDO::FETCH_OBJ)) {
            return $result;
        }
    }
}

