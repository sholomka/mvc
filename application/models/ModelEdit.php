<?php

namespace  Application\Models;

use Application\Core\Model;

class ModelEdit extends Model
{
    /**
     * @var string
     */
    public static $editTask = "UPDATE tasks
                               SET  
                                   name = ?,
                                   email = ?,
                                   description = ?,
                                   image = ?
                               WHERE id = ?";

    /**
     * @var string
     */
    public static $getTaskById = "SELECT
                                      id,
                                      name, 
                                      email, 
                                      description, 
                                      image, 
                                      status
                                  FROM tasks
                                  WHERE id = ?";

    /**
     * @param $name
     * @param $email
     * @param $description
     * @param $image
     */
    public function editTask($name, $email, $description, $image, $id)
    {
        $stmt = $this->doStatement(self::$editTask, [$name, $email, $description, $image, $id]);

    }


    /**
     * @return array
     */
    public function getDataById($id)
    {
        $stmt = $this->doStatement(self::$getTaskById, [$id]);

        if ($result = $stmt->fetch(\PDO::FETCH_OBJ)) {
            return $result;
        }
    }


}

