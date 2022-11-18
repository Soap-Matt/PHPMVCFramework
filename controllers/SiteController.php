<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{

    public function contact() {
        return $this->render('contact');
    }

    public function handleContact() {
        return 'Handling contact form submission';
    }

    public function home() {
        $params = [
            'name' => 'Matthew De Jager'
        ];

        return $this->render('home', $params);
    }



}
