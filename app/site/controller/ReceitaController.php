<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entities\Receita;
use app\site\model\CategoriaModel;
use app\site\model\ReceitaModel;

class ReceitaController extends  Controller
{
    private $receitaModel;

    public function __construct()
    {
        $this->receitaModel = new ReceitaModel();
    }

    public function index()
    {
        $receita = [];
        if (filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT)) {
            $receita = $this->receitaModel->lerTodosPorCategoria(filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT));
        } else {
            $receita = $this->receitaModel->lerUltimos('15');
        }

        $this->load('receita/main', [
            'listaCategorias' => (new CategoriaModel())->lerTodos(),
            'receitas' => $receita,
            'categoriaId' => filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT)
        ]);
    }

    public function adicionar()
    {
        $this->load('receita/adicionar', [
            'listaCategoria' => (new CategoriaModel())->lerTodos()
        ]);
    }

    public function editar($receitaId)
    {
        $receitaId = filter_var($receitaId, FILTER_SANITIZE_NUMBER_INT);
        if ($receitaId <= 0) {
            $this->showMessagem(
                'Formulario invalido',
                'Selecione uma receita valido',
                'receita'
            );
            return;
        }
        $this->load('receita/editar', [
            'listaCategoria' => (new CategoriaModel())->lerTodos(),
            'receita' => $this->receitaModel->lerPorId($receitaId),
            'receitaId' => $receitaId
        ]);
    }
    public function ver($receitaId)
    {
        $receitaId = filter_var($receitaId, FILTER_SANITIZE_NUMBER_INT);
        if ($receitaId <= 0) {
            $this->showMessagem(
                'Formulario invalido',
                'Selecione uma receita valido',
                'receita'
            );
            return;
        }

        $this->load('receita/ver', [
            'receita' => $this->receitaModel->lerTodosPorReceita($receitaId)
        ]);
    }

    public function inserir()
    {
        $receita = $this->getInput();
        if (!$this->validadar($receita, false)) {
            $this->showMessagem(
                'Formulario invalido',
                'Os dados fornecidos estão invalido',
                'receita/adicionar'
            );
            return;
        }
        $result = $this->receitaModel->inserir($receita);
        if ($result <= 0) {
            if (!$this->validadar($receita, false)) {
                $this->showMessagem(
                    'Ops ocorreu algum erro, ao inserir dados',
                    'Tenta novamente ou chame o suporte tecnico',
                    'receita/adicionar'
                );
                return;
            }
        }
        redirect(BASE . 'receita');
    }

    public function alterar($receitaId)
    {
        $receita = $this->getInput();
        $receita->setId($receitaId);
        if (!$this->validadar($receita)) {
            $this->showMessagem(
                'Formulario invalido',
                'Os dados fornecidos estão invalido',
                'receita/adicionar'
            );
            return;
        }
        if (!$this->receitaModel->alterar($receita)) {
            if (!$this->validadar($receita, false)) {
                $this->showMessagem(
                    'Ops ocorreu algum erro, ao inserir dados',
                    'Tenta novamente ou chame o suporte tecnico',
                    'receita/adicionar'
                );
                return;
            }
        }
        redirect(BASE . 'receita');
    }


    //Validação
    private function validadar(Receita $receita, bool $validadeId = true)
    {
        if ($validadeId && $receita->getId() <= 0) {
            return false;
        }
        if (strlen($receita->getTitulo()) < 2) {
            return false;
        }
        if (strlen($receita->getSlug()) < 3) {
            return false;
        }
        if (strlen($receita->getLinhaFina()) < 10) {
            return false;
        }
        if ($receita->getCategoria() <= 0) {
            return false;
        }
        return true;
    }

    public function getInput()
    {
        $receita = new Receita();
        $receita->setTitulo(filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING));
        $receita->setSlug(filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING));
        $receita->setLinhaFina(filter_input(INPUT_POST, 'txtLinhaFina', FILTER_SANITIZE_STRING));
        $receita->setDescricao(filter_input(INPUT_POST, 'txtDescricao', FILTER_SANITIZE_SPECIAL_CHARS));
        $receita->setCategoria(filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT));
        $receita->setData(getCurrentDate());
        $receita->setThumb(filter_input(INPUT_POST, 'txtThumb', FILTER_SANITIZE_STRING));

        return $receita;
    }
}
