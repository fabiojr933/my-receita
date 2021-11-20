<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\ReceitaModel;

class PesquisaController extends Controller
{

    public function index()
    {
        $this->showMessagem(
            'Pagina não existe',
            'Os dados fornecidos estão incompletos',
            'categoria/adicionar',
            '404'
        );
        return;
    }
    public function busca(string $busca)
    {
        $busca = filter_var($busca, FILTER_SANITIZE_STRING);
        $busca = strip_tags($busca);
        if (strlen(trim($busca)) <= 2) {
            $this->showMessagem(
                'Formulario invalido',
                'Os dados fornecidos estão incompletos',
                'categoria/adicionar',
                '200'
            );
            return;
        }
        $dado = (new ReceitaModel)->pesquisar($busca);
        $this->load('pesquisa/main', [
            'receitas' => $dado,
            'busca' => $busca,
            'quantidadeResultado' => count($dado)
        ]);
    }
}
