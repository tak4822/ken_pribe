<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;

class Login
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(
        Request $request,
        Response $response,
        BackendRenderer $renderer
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }
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