<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;

class Drawings extends CoreController
{
    public function show()
    {
        $data = [
            'title' => $this -> title,
            'page' => 'drawings',
            'drawings' => DBSelectAll('drawings_tb')
        ];
        $html = $this->renderer->render('Drawings', $data);
        $this->response->setContent($html);

    }
}