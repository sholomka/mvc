<?php
use Models_File_Exceptions_UnsupportedFormatException as UnsupportedFormatException;
use Models_File_Exceptions_FileNotSaveException as FileNotSaveException;

/**
 * Class Models_Image_ImageJPG
 */
class Models_Image_ImageJPG extends Models_Image_Abstract
{
    /**
     * Настройки по умолчанию
     *
     * @throws Models_File_Exceptions_UnsupportedFormatException
     */
    public function init()
    {
        if (!self::isSupport()) {
            throw new UnsupportedFormatException('jpeg');
        }

        $this->setResource(@imagecreatefromjpeg($this->filePath));
    }

    /**
     * Проверяет поддерживается ли формат jpg
     *
     * @return bool
     */
    public static function isSupport()
    {
        $gdInfo = parent::getGDinfo();
        $phpVersion = parent::getShortPHPVersion();

        if ((float) $phpVersion < 5.3) {
            return (bool) $gdInfo['JPG Support'];
        }

        return (bool) $gdInfo['JPEG Support'];
    }

    /**
     * Сохраняет изображение в формате jpg
     *
     * @param $path - путь, по которому сохранится изображение
     * @return $this
     * @throws Models_File_Exceptions_FileNotSaveException
     */
    public function save($path)
    {
        $this->createDirIfNotExists($path);

        if (!imagejpeg($this->getResource(), $path, static::getQuality())) {
            throw new FileNotSaveException($path);
        }

        return $this;
    }
}
