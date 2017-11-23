<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;

class Home extends CoreController
{
    public function show()
    {
        $data = [
            'title' => $this -> title,
            'page' => 'home',
            'home' => DBSelectAll ('home_tb')[0]
        ];
        $html = $this->renderer->render('Home', $data);
        $this->response->setContent($html);

    }
}