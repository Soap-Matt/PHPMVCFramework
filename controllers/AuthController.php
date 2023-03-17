<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{

    public function login(Request $request) {
        if ($request->isPost()) {
            echo "HANDLING FORM SUBMSSION";
        } else {
            $this->setLayout('auth');
            return $this->render('login');
        }
    }

    public function register(Request $request) {
        $registerModel = new RegisterModel();
        $this->setLayout('auth');
        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return "success!";
            }

            return $this->render('register', ["registerModel" => $registerModel]);

        }

        return $this->render('register', ["registerModel" => $registerModel]);
    }



}
