<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;

class Admin extends CoreController
{
    public function show()
    {
        $data = [
            'admin' => 'admin',
            'user' => $_SESSION['userName']
        ];
        $html = $this->renderer->render('Admin', $data);
        $this->response->setContent($html);
        CoreController::session();

    }
}