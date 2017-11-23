<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;

class AdminBooks extends CoreController
{

    public function show()
    {
        $data = [
            'admin' => 'books',
            'books' => DBSelectAll('books_tb')
        ];
        $html = $this->renderer->render('AdminBooks', $data);
        $this->response->setContent($html);
        CoreController::session();

    }

    public function showInsert()
    {
        $data = [
            'admin'=> 'edit'
        ];
        $html = $this->renderer->render('InsertBook', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function store()
    {
        DBInsert('books_tb', [
            'image' => $_POST['upload'],
            'title' => $_POST['title'],
            'sub_title' => $_POST['sub'],
            'sub_title_color' => $_POST['subColor'],
            'description' => $_POST['description'],
            'btn_text' => $_POST['btnText'],
            'btn_url' => $_POST['btnUrl'],
        ]);
        $data = [
            'admin' => 'books',
            'books' => DBSelectAll('books_tb')
        ];
        $html = $this->renderer->render('AdminBooks', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function delete()
    {
        $message = '';
        $id = $this->request->getParameter('id');
        if (DBDelete('books_tb', ['id' => $id]) ) {
            $message = '<div class="alert alert-primary" role="alert">It has been deleted successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to delete it</div>';
        }

        $data = [
            'admin' => 'books',
            'books' => DBSelectAll('books_tb'),
            'message' => $message
        ];
        $html = $this->renderer->render('AdminBooks', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function showEdit()
    {
        $id = $this->request->getParameter('id');
        $data = [
            'admin' => 'edit',
            'book' => DBSelectById('books_tb', $id )
        ];

        $html = $this->renderer->render('UpdateBook', $data);
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
            'books_tb',
            [
                'image' => $image,
                'title' => $_POST['title'],
                'sub_title' => $_POST['sub'],
                'sub_title_color' => $_POST['subColor'],
                'description' => $_POST['description'],
                'btn_text' => $_POST['btnText'],
                'btn_url' => $_POST['btnUrl'],
            ],
            $_POST['updateId']
            ) ) {
            $message = '<div class="alert alert-primary" role="alert">'. $_POST['title'] .' has been edited successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to edit '.$_POST['title'].'</div>';
        }

        $data = [
            'admin' => 'books',
            'books' => DBSelectAll('books_tb'),
            'message' => $message
        ];
        $html = $this->renderer->render('AdminBooks', $data);
        $this->response->setContent($html);
        CoreController::session();
    }
}