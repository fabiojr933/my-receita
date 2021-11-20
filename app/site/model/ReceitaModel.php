<?php

namespace app\site\model;

use app\core\Model;
use app\site\entities\Receita;

class ReceitaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function inserir(Receita $receita)
    {
        $sql = 'INSERT INTO receita (titulo, linha_fina, descricao, slug, categoria_id, data, thumb) VALUES(:titulo, :linha_fina, :descricao, :slug, :categoria_id, :data, :thumb)';
        $params = [
            ':titulo' => $receita->getTitulo(),
            ':linha_fina' => $receita->getLinhaFina(),
            ':descricao' => $receita->getDescricao(),
            ':slug' => $receita->getSlug(),
            ':categoria_id' => $receita->getCategoria(),
            ':data' => $receita->getData(),
            ':thumb' => $receita->getThumb()
        ];
        if (!$this->pdo->executeNonQuery($sql, $params)) {
            return -1;
        }
        return $this->pdo->getLastID();
    }

    public function alterar(Receita $receita)
    {
        $sql = 'UPDATE receita SET titulo = :titulo, slug = :slug, linha_fina = :linha_fina, descricao = :descricao, categoria_id = :categoriaid, thumb = :thumb WHERE id = :id';
        $params = [
            ':id' => $receita->getId(),
            ':titulo' => $receita->getTitulo(),
            ':slug' => $receita->getSlug(),
            ':linha_fina' => $receita->getLinhaFina(),
            ':descricao' => $receita->getDescricao(),
            ':categoriaid' => $receita->getCategoria(),
            ':thumb' => $receita->getThumb()
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function lerPorId(int $receitaId)
    {
        $sql = 'SELECT * FROM receita WHERE id = :id ';
        $dr = $this->pdo->executeQueryOneRow($sql, [
            ':id' => $receitaId,
        ]);
        return $this->collection($dr);
    }

    public function lerTodosPorCategoria(int $categoriaId)
    {
        $sql = 'SELECT r.*, c.titulo as categoriaTitulo FROM receita r  INNER JOIN categoria c  ON  r.categoria_id = c.id  WHERE categoria_id = :categoriaId';
        $dt = $this->pdo->executeQuery($sql, [
            ':categoriaId' => $categoriaId,
        ]);
        $lista = [];
        foreach ($dt as $dr) {
            $lista[] = $this->collection($dr);
        }
        return $lista;
    }

    public function lerTodosPorCategoria2($limit = 100)
    {
        $sql = 'SELECT r.*, c.titulo as categoriaTitulo FROM receita r  INNER JOIN categoria c  ON  r.categoria_id = c.id  LIMIT :limit';
        $dt = $this->pdo->executeQuery($sql, [
            ':limit' => $limit
        ]);
        $lista = [];
        foreach ($dt as $dr) {
            $lista[] = $dr;
        }
        return $lista;
    }

    public function pesquisar(string $p)
    {
        $sql = 'SELECT r.*, c.titulo as categoriaTitulo FROM receita r  INNER JOIN categoria c  ON  r.categoria_id = c.id  WHERE r.titulo LIKE :titulo 
        or r.linha_fina LIKE :titulo2 ';
        $dt = $this->pdo->executeQuery($sql, [
            ':titulo' => "%{$p}%",
            ':titulo2' => "%{$p}%"
        ]);
        $lista = [];
        foreach ($dt as $dr) {
            $lista[] = ($dr);
        }
        return $lista;
    }

    public function lerTodosPorReceita(int $id)
    {
        $sql = 'SELECT r.*, c.titulo as categoriaTitulo FROM receita r  INNER JOIN categoria c  ON  r.categoria_id = c.id  WHERE r.id = :id';
        $dt = $this->pdo->executeQuery($sql, [
            ':id' => $id,
        ]);
        $lista = [];
        foreach ($dt as $dr) {
            $lista[] = $dr;
        }
        return $lista;
    }

    public function lerUltimos($limit = 10)
    {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id ORDER BY r.data DESC LIMIT :limit';
        $dt = $this->pdo->executeQuery($sql, [
            ':limit' => $limit
        ]);

        $lista = [];

        foreach ($dt as $dr)
            $lista[] =  $this->collection($dr);

        return $lista;
    }

    public function collection($arr)
    {
        $receita = new Receita();
        $receita->setId($arr['id'] ?? null);
        $receita->setTitulo($arr['titulo'] ?? null);
        $receita->setSlug($arr['slug'] ?? null);
        $receita->setLinhaFina($arr['linha_fina'] ?? null);
        $receita->setDescricao($arr['descricao'] ?? null);
        $receita->setCategoria($arr['categoria_id'] ?? null);
        $receita->setCategoriaTitulo($arr['categoriaTitulo'] ?? null);
        $receita->setData($arr['data'] ?? null);
        $receita->setThumb($arr['thumb'] ?? null);
        return $receita;
    }
}
