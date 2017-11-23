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

    public function showTitleEdit() {
        $data = [
            'admin' => 'common',
            'common' => DBSelectAll('common_tb')[0]
        ];

        $html = $this->renderer->render('AdminTitle', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function updateTitleEdit() {
        if(DBUpdateByID(
            'common_tb',
            [
                'title' => $_POST['title']
            ],
            '1'
        ) ) {
            $message = '<div class="alert alert-primary" role="alert">Site title has been edited successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to edit site title</div>';
        }

        $data = [
            'admin' => 'common',
            'common' => DBSelectAll('common_tb')[0],
            'message' => $message
        ];

        $html = $this->renderer->render('AdminTitle', $data);
        $this->response->setContent($html);
        CoreController::session();
    }
}