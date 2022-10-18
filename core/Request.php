<?php

namespace app\core;

class Request
{

    /**
     * @return false|string
     */
    public function getPath() {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    public function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}
