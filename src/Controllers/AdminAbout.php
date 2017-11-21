<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;
include __DIR__ . '/../../src/helper/SQL.php';
class AdminAbout extends CoreController
{
    public function show()
    {
        $data = [
            'admin' => 'about',
            'about' => DBSelectAll('about_tb')
        ];
        $html = $this->renderer->render('AdminAbout', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function showEdit()
    {
        $data = [
            'admin' => 'edit',
            'about' => DBSelectAll('about_tb')
        ];

        $html = $this->renderer->render('UpdateAbout', $data);
        $this->response->setContent($html);
        CoreController::session();

    }
    public function update(){
        if($_POST['upload'] !== ''){
            $image = $_POST['upload'];
        } else {
            $image = $_POST['preImage'];
        }

        if(DBUpdateByID(
            'about_tb',
            [
                'image' => $image,
                'about_me' => $_POST['aboutMe'],
                'news' => $_POST['news'],
            ],
            '1'
        ) ) {
            $message = '<div class="alert alert-primary" role="alert">About page has been edited successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to edit About page</div>';
        }

        $data = [
            'admin' => 'about',
            'about' => DBSelectAll('about_tb'),
            'message' => $message
        ];

        $html = $this->renderer->render('AdminAbout', $data);
        $this->response->setContent($html);
        CoreController::session();
    }
}