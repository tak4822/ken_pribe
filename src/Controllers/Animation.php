<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;

class Animation extends CoreController
{
    public function show()
    {
        $data = [
            'title' => $this -> title,
            'page' => 'animation',
            'demoreel' => DBSelectAll('demoreel_tb'),
            'things' => DBSelectAll('things_tb'),
            'kids' => DBSelectAll('kids_tb')
        ];
        $html = $this->renderer->render('Animation', $data);
        $this->response->setContent($html);
    }
}