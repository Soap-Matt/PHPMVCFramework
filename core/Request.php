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

    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    public function isPost(): bool
    {
        return $this->method() === 'post';
    }

    public function getBody() {
        $data = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $data[$key] = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $data[$key] = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
            }
        }

        return $data;
    }
}
