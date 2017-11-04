<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;

class Animation
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
            'name' => $this->request->getParameter('name', 'stranger')
        ];
        $html = $this->renderer->render('Animation', $data);
        $this->response->setContent($html);

    }
}