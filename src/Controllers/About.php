<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;
include __DIR__ . '/../../src/helper/SQL.php';
class About
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(
        Request $request,
        Response $response,
        FrontendRenderer $renderer
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }
    public function show()
    {
        $data = [
            'page' => 'about',
            'about' => DBSelectAll('about_tb')
        ];
        $html = $this->renderer->render('About', $data);
        $this->response->setContent($html);

    }
}