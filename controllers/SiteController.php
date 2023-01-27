<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{

    public function contact() {
        return $this->render('contact');
    }

    public function handleContact(Request $request) {
        return 'Handling contact form submission';
    }

    public function home() {
        $params = [
            'name' => 'Matthew De Jager'
        ];

        return $this->render('home', $params);
    }



}
