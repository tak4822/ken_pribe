<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;
include __DIR__ . '/../../src/helper/SQL.php';
class AdminDrawings
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(
        Request $request,
        Response $response,
        BackendRenderer $renderer
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }
    public function show()
    {
        $data = [
            'admin' => 'drawings',
            'drawings' => DBSelectAll('drawings_tb')
        ];
        $html = $this->renderer->render('AdminDrawings', $data);
        $this->response->setContent($html);
    }

    public function showInsert()
    {
        $data = [
            'admin'=> 'edit'
        ];
        $html = $this->renderer->render('InsertDrawings', $data);
        $this->response->setContent($html);
    }

    public function store()
    {
        DBInsert('drawings_tb', [
            'image' => $_POST['upload'],
            'title' => $_POST['title'],
            'date' => $_POST['date'],
            'description' => $_POST['description'],
        ]);
        $data = [
            'admin' => 'drawings',
            'drawings' => DBSelectAll('drawings_tb')

        ];
        $html = $this->renderer->render('AdminDrawings', $data);
        $this->response->setContent($html);
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
    }

}