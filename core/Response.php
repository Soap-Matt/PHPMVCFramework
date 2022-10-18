<?php

namespace app\core;

class Response
{

    public function set_status_code($statusCode) {
        http_response_code($statusCode);
    }

}
