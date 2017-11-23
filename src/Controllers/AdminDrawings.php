<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;

class AdminDrawings extends CoreController
{
    public function show()
    {
        $data = [
            'admin' => 'drawings',
            'drawings' => DBSelectAll('drawings_tb')
        ];
        $html = $this->renderer->render('AdminDrawings', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function showInsert()
    {
        $data = [
            'admin'=> 'edit'
        ];
        $html = $this->renderer->render('InsertDrawings', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function store()
    {
        $message ="";
        if (
            DBInsert('drawings_tb', [
                'image' => $_POST['upload'],
                'title' => $_POST['title'],
                'date' => $_POST['date'],
                'description' => $_POST['description']
            ])
        ) {
            $data = [
                'admin' => 'drawings',
                'drawings' => DBSelectAll('drawings_tb')
            ];

        } else {
            $data = [
                'admin' => 'drawings',
                'message' => '<div class="alert alert-danger" role="alert">Failed to create a new drawings</div>'
            ];
        }
        $html = $this->renderer->render('AdminDrawings', $data);
        $this->response->setContent($html);
        CoreController::session();


    }

    public function delete()
    {
        $message = '';
        $id = $this->request->getParameter('id');
        if (DBDelete('drawings_tb', ['id' => $id]) ) {
            $message = '<div class="alert alert-primary" role="alert">It has been deleted successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to delete it</div>';
        }

        $data = [
            'admin' => 'drawings',
            'drawings' => DBSelectAll('drawings_tb'),
            'message' => $message
        ];
        $html = $this->renderer->render('AdminDrawings', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function showEdit()
    {
        $id = $this->request->getParameter('id');
        $data = [
            'admin' => 'edit',
            'drawings' => DBSelectById('drawings_tb', $id )
        ];

        $html = $this->renderer->render('Updatedrawings', $data);
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
            'drawings_tb',
            [
                'image' => $image,
                'title' => $_POST['title'],
                'date' => $_POST['date'],
                'description' => $_POST['description'],
            ],
            $_POST['updateId']
        ) ) {
            $message = '<div class="alert alert-primary" role="alert">'. $_POST['title'] .' has been edited successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to edit '.$_POST['title'].'</div>';
        }

        $data = [
            'admin' => 'drawings',
            'drawings' => DBSelectAll('drawings_tb'),
            'message' => $message
        ];

        $html = $this->renderer->render('AdminDrawings', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

}