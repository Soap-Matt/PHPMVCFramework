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

    public function getBody() {
        $data = [];
        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $data[$key] = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
            }
        }

        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                echo filter_input(INPUT_GET, $value, FILTER_SANITIZE_SPECIAL_CHARS);
                $data[$key] = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
            }
        }

        return $data;
    }
}
