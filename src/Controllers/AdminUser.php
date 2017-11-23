<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;

class Adminuser extends CoreController
{
    public function show()
    {
        $data = [
            'admin' => 'user'
        ];
        $html = $this->renderer->render('Adminuser', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function update()
    {
        $user = $this->authFunc();
        if ($user && $_POST['newPass'] === $_POST['conNewPass']) {
            DBUpdateByID ('user_tb', [
                'password' => $_POST['newPass']
            ], 0);
            $data = [
                'admin' => 'user',
                'message' => '<div class="alert alert-primary" role="alert">Password has been changed successfully</div>'
            ];
            $html = $this->renderer->render('Adminuser', $data);
            $this->response->setContent($html);
        } else {
            $data = [
                'admin' => 'user',
                'message' => '<div class="alert alert-danger" role="alert">Failed to change password</div>'
            ];
            $html = $this->renderer->render('Adminuser', $data);
            $this->response->setContent($html);
            CoreController::session();
        }
    }

    public function login(){
        $user = $this->authFunc();
        if($user) {
            $data = [
                'admin' => 'admin',
                'user' => $user[0]["user_name"]
            ];
            $_SESSION['userName'] = $user[0]["user_name"];
            $html = $this->renderer->render('Admin', $data);
            $this->response->setContent($html);
        } else {
            $data = [
                'message' => '<div class="alert alert-danger" role="alert">Password is invalid</div>',
            ];
            $html = $this->renderer->render('Login', $data);
            $this->response->setContent($html);

        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        CoreController::session();

    }

    public function authFunc(){
        return DBSelectWhere('user_tb',
            [
                ['password', '=', $_POST['cuPass']],
                ['user_name', '=', $_POST['userName']]
            ]
        );
    }
}