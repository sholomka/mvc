<?php

namespace  Application\Core;

class View
{
    public function generate($contentView, $templateView, $data = null)
    {
        include_once('application/views/' . $templateView);
    }
}

