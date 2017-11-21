<?php declare(strict_types = 1);

namespace src\Controllers;

use src\Template\BackendRenderer;
use Http\Request;
use Http\Response;
include __DIR__ . '/../../src/helper/SQL.php';
class AdminAnimation extends CoreController
{
    public function show()
    {
        $data = [
            'admin' => 'animation',
            'demoreel' => DBSelectAll('demoreel_tb'),
            'things' => DBSelectAll('things_tb'),
            'kids' => DBSelectAll('kids_tb')
        ];
        $html = $this->renderer->render('AdminAnimation', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function showInsert()
    {
        $data = [
            'admin'=> 'edit',
            'type' =>  $this->request->getParameter('type')
        ];
        $html = $this->renderer->render('InsertAnim', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function store()
    {
        DBInsert( $_POST['animType'].'_tb', [
            'poster' => $_POST['upload'],
            'title' => $_POST['title'],
            'video_url' => $_POST['animUrl'],
            'description' => $_POST['description'],
        ]);
        $data = [
            'admin' => 'animation',
            'demoreel' => DBSelectAll('demoreel_tb'),
            'things' => DBSelectAll('things_tb'),
            'kids' => DBSelectAll('kids_tb')
        ];
        $html = $this->renderer->render('AdminAnimation', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function delete()
    {
        $message = '';
        $id = $this->request->getParameter('id');
        $table = $this->request->getParameter('type') . '_tb';
        if (DBDelete($table, ['id' => $id]) ) {
            $message = '<div class="alert alert-primary" role="alert">It has been deleted successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to delete it</div>';
        }

        $data = [
            'admin' => 'animation',
            'demoreel' => DBSelectAll('demoreel_tb'),
            'things' => DBSelectAll('things_tb'),
            'kids' => DBSelectAll('kids_tb'),
            'message' => $message
        ];
        $html = $this->renderer->render('AdminAnimation', $data);
        $this->response->setContent($html);
        CoreController::session();
    }

    public function showEdit()
    {
        $id = $this->request->getParameter('id');
        $table = $this->request->getParameter('type') . '_tb';
        $data = [
            'admin' => 'edit',
            'table' => $table,
            'anim' => DBSelectById($table, $id )
        ];

        $html = $this->renderer->render('UpdateAnim', $data);
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
            $_POST['animTable'],
            [
                'poster' => $image,
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'video_url' => $_POST['animUrl'],
            ],
            $_POST['id']
        ) ) {
            $message = '<div class="alert alert-primary" role="alert">'. $_POST['title'] .' has been edited successfully</div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">Failed to edit '.$_POST['title'].'</div>';
        }

        $data = [
            'admin' => 'animation',
            'demoreel' => DBSelectAll('demoreel_tb'),
            'things' => DBSelectAll('things_tb'),
            'kids' => DBSelectAll('kids_tb'),
            'message' => $message
        ];

        $html = $this->renderer->render('AdminAnimation', $data);
        $this->response->setContent($html);
        CoreController::session();
    }
}