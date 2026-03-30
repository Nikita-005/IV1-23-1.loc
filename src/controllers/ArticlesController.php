<?php

namespace src\controllers;

use src\exceptions\NotFoundException;
use src\models\Article;
use src\models\Users;
use src\exceptions\NotFoundException;
class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }
    public function view($id)
    {
        $article = Article::getById($id);
        if($article !== null){
            $this->view->renderHtml('articles/view.php', ['article' => $article]);
        }else{
           throw new NotFoundException();
        }

    }
    public function edit($id)
    {
        $article = Article::getById($id);
        if($article === null){
            throw new NotFoundException();
        }

        if(!empty($_POST)){
            $article->updateFromArray($_POST);
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }
    public function add()
    {
        $article = new Article();
        $article->setName('Новая статья');
        $article->setText('Текст новой статьи');
        $article->setAuthorId(1);
        $article->save();
    }
    public function delete($id)
    {
        $article = Article::getById($id);
        if($article === null){
            throw new NotFoundException();
        }
        $article->delete();
    }
}