<?php

class ModelPortfolio extends Model
{
    public function getData()
    {
        return [
            [
                'Year' => '2012',
                'Site' => 'http://DunkelBeer.ru',
                'Description' => 'Промо-сайт темного пива Dunkel от немецкого производителя 
                 Löwenbraü выпускаемого в России пивоваренной компанией "CАН ИнБев".'
            ],
            [
                'Year' => '2012',
                'Site' => 'http://ZopoMobile.ru',
                'Description' => 'Русскоязычный каталог китайских телефонов компании Zopo на
                 базе Android OS и аксессуаров к ним.'
            ]
        ];
    }
}

