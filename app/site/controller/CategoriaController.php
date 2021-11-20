<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\CategoriaModel;

class CategoriaController extends Controller
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }
    public function index()
    {
        $this->load('categoria/main', [
            'listaCategoria' => $this->categoriaModel->lerTodos(),
        ]);
    }
    public function adicionar()
    {
        $this->load('categoria/adicionar');
    }

    public function editar($categoriaId = 0)
    {
        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);
        if ($categoriaId <= 0) {
            $this->showMessagem(
                'Formulario invalido',
                'Os dados fornecidos estão incompletos',
                'categoria/adicionar',
                '200'
            );
            return;
        }
        $categoria = $this->categoriaModel->lerPorId($categoriaId);
        if ($categoria->titulo == null) {
            $this->showMessagem(
                'Categoria não encontrado',
                'Os dados fornecidos estão incompletos',
                'categoria/adicionar',
                '200'
            );
            return;
        }
        $this->load('categoria/editar', [
            'categoria' => $categoria,
            'categoriaId' => $categoriaId
        ]);
    }

    public function insert()
    {
        $titulo = filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING);

        if (strlen($titulo) < 2 || strlen($slug) < 3) {
            $this->showMessagem(
                'Formulario invalido',
                'Os dados fornecidos estão incompletos',
                'categoria/adicionar',
                '200'
            );
            return;
        }
        $result = $this->categoriaModel->inserir($titulo, $slug);
        if ($result <= 0) {
            $this->showMessagem(
                'Erro',
                'Houver um erro ao tentar cadastrar, tente novamente',
                'categoria/adicionar',
                '200'
            );
            return;
        }
        redirect(BASE . 'categoria/editar/' . $result);
    }
    public function alterar($categoriaId = 0)
    {
        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);
        $titulo = filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING);
        if ($categoriaId <= 0 || strlen($titulo) < 2 || strlen($slug) < 3) {
            $this->showMessagem(
                'Formulario invalido',
                'Os dados fornecidos estão incompletos',
                'categoria/adicionar',
                '200'
            );
            return;
        }
        if (!$this->categoriaModel->alterar($categoriaId, $titulo, $slug)) {
            $this->showMessagem(
                'Erro',
                'OHouve um erro ao tentar alterar os dados, tente novamente, ou chame o suporte',
                'categoria/editar/' . $categoriaId,
                '200'
            );
            return;
        }
        redirect(BASE . 'categoria/editar/' . $categoriaId);
    }
}
