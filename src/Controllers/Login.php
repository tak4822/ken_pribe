<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;

class Login extends CoreController
{
    public function show()
    {
        if ( !isset($_SESSION['userName'] ) ) {
            $data = [

            ];
            $html = $this->renderer->render('Login', $data);
            $this->response->setContent($html);
        } else {
            $data = [
                'admin' => 'admin',
                'user' => $_SESSION['userName']
            ];
            $html = $this->renderer->render('Admin', $data);
            $this->response->setContent($html);
        }


    }
}