<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;
class About extends CoreController
{
    public function show()
    {
        $data = [
            'title' => $this -> title,
            'page' => 'about',
            'about' => DBSelectAll('about_tb')
        ];
        $html = $this->renderer->render('About', $data);
        $this->response->setContent($html);

    }
}