<?php

namespace  Application\Core\File;

/**
 * Class File
 */
abstract class File
{
    /**
     * Папка загружаемой картинки
     * @var
     */
    protected $uploadDir;

    /**
     * Путь загружаемой картинки
     * @var
     */
    protected $destination;

    /**
     * Имя загруженного файла
     *
     * @var
     */
    protected $savedFileName;

    /**
     * Путь к обрезанной картинки
     * @var
     */
    protected $cropDestination;

    /**
     * Объект запроса
     *
     * @var
     */
    protected $request;

    /**
     * Имя поля в суперглобальном массиве $_FILES
     * @var
     */
    public static $fileKeyName = 'image';

    /**
     * ID авторизированного пользователя
     *
     * @var
     */
    protected $userId;

    public function __construct($userId = null)
    {
        if ($userId === null){
            $this->userId = Auth::getInstance()->getIdentity()->getId();
        } else {
            $this->userId = $userId;
        }
    }

    /**
     * Загрузка файла
     */
    public function upload()
    {
        if (array_key_exists(self::$fileKeyName, $_FILES)) {
            if ($_FILES[self::$fileKeyName]['tmp_name']) {
                $dir = $this->getDirName();
                
                if (!$this->isDirExists($dir)) {
                    $this->createDir($dir);
                }

                //if (!move_uploaded_file($_FILES[self::$fileKeyName]['tmp_name'], $this->destination)) {
                if (!copy($_FILES[self::$fileKeyName]['tmp_name'], $this->destination)) {
                    throw new \Exception("Ошибка загрузки файла\n");
                }
            }
        } else {
            throw new \Exception("Неправильный аттрибут name тега input[type=file]\n");
        }
    }

    /**
     * Удаление файла
     *
     * @param $filePath
     * @return bool
     */
    public static function remove($filePath)
    {
        return unlink($filePath);
    }

    /**
     * Возвращает имя директории
     *
     * @return string
     */
    public function getDirName()
    {
        return dirname($this->destination);
    }

    /**
     * Устанавливает путь назначения для сохранения файла
     *
     * @param $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Имя сохраненного файла
     *
     * @return mixed
     */
    public function getSavedFileName()
    {
        return $this->savedFileName;
    }

    /**
     * Проверяет существует ли директория
     *
     * @param $dir
     * @return bool
     */
    public function isDirExists($dir)
    {
        return is_dir($dir);
    }

    /**
     * Создает директорию
     *
     * @param $dir
     */
    public function createDir($dir)
    {
        mkdir($dir, 0755, true);
    }

    /**
     * Проверяет, существует ли файл
     *
     * @param $filePath
     * @return bool
     */
    public function isFileExists($filePath)
    {
        return file_exists($filePath);
    }
}
