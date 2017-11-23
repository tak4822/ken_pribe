<?php declare(strict_types = 1);

namespace src\Controllers;
use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;
include __DIR__ . '/../../src/helper/SQL.php';
class CoreController
{
    public function __construct
    (
        Request $request,
        Response $response,
        BackendRenderer $renderer
    )
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
        $this->title = DBSelectAll('common_tb')[0]['title'];
    }

    public function session(){
        if ( !isset($_SESSION['userName'] ) ) {
            $data =[];
            $html = $this->renderer->render('Login', $data);
            $this->response->setContent($html);
        }
    }
}