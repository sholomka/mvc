<?php

namespace  Application\Models;

use Application\Core\Model;

use Application\Core\SimPageNav;

class ModelAdmin extends Model
{

    const COUNT_PER_PAGE = 3;

    public static $allTasks = "SELECT COUNT(*) FROM tasks";

    /**
     * @return array
     */
    public function getData()
    {
        $start = $this->request->getProperty('start', 0);

        $getTasks = "SELECT 
                          id,
                          name, 
                          email, 
                          description, 
                          image, 
                          status
                       FROM tasks";


//        $getTasks = "SELECT
//                          id,
//                          name,
//                          email,
//                          description,
//                          image,
//                          status
//                       FROM tasks
//                       LIMIT " . $start . ", " . self::COUNT_PER_PAGE;

        $stmt = $this->doStatement($getTasks);

        if ($result = $stmt->fetchAll(\PDO::FETCH_OBJ)) {
            return $result;
        }
    }

    public function getNav()
    {

        $start = $this->request->getProperty('start', 0);


        $all = $this->doStatement(self::$allTasks)->fetchColumn();



        $pagenav = new SimPageNav();

        return $pagenav->getLinks($all, self::COUNT_PER_PAGE, $start, 10, 'start');
   }


}

