<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\ReceitaModel;

class HomeController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $receitaModel = new ReceitaModel();
        $receitas = $receitaModel->lerTodosPorCategoria2(400);
        $this->load('home/main', ['receitas' => $receitas]);
    }
}
