<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;

class AdminHOme extends CoreController
{
    public function show()
    {
        $data = [
            'admin' => 'home',
            'home' => DBSelectAll('home_tb')[0]
        ];
        $html = $this->renderer->render('AdminHome', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function showEdit()
    {
        $data = [
            'admin' => 'homeUpdate',
            'home' => DBSelectAll('home_tb')[0]
        ];

        $html = $this->renderer->render('UpdateHome', $data);
        $this->response->setContent($html);
        CoreController::session();

    }
    public function update(){
        if($_POST['upload'] !== ''){
            $video = $_POST['upload'];
        } else {
            $video = $_POST['preImage'];
        }

        if(DBUpdateByID(
            'home_tb',
            [
                'video' => $video,
                'greeting_head' => $_POST['head'],
                'greeting_sub_head' => $_POST['sub'],
                'greeting_text' => $_POST['text'],
            ],
            '1'
        ) ) {
            $message = '<div class="alert alert-primary" role="alert">Home page has been edited successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to edit Home page</div>';
        }

        $data = [
            'admin' => 'home',
            'home' => DBSelectAll('home_tb')[0],
            'message' => $message
        ];

        $html = $this->renderer->render('AdminHome', $data);
        $this->response->setContent($html);
        CoreController::session();
    }
}