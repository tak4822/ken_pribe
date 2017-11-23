<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\FrontendRenderer;
use Http\Request;
use Http\Response;

class Books extends CoreController
{
    public function show()
    {
        $data = [
            'title' => $this -> title,
            'page' => 'books',
            'books' => DBSelectAll('books_tb')
        ];
        $html = $this->renderer->render('Books', $data);
        $this->response->setContent($html);

    }
}