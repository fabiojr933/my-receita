<?php

namespace app\site\entities;

class Receita
{
    private $id;
    private $titulo;
    private $slug;
    private $linhaFina;
    private $descricao;
    private $categoria;
    private $data;
    private $CategoriaTitulo;
    private $thumb;

    //Constructor
    public function __construct($id = null, $titulo = '', $slug = '', $linhaFina = '', $descricao = '', $categoria = '', $data = '', $CategoriaTitulo = '', $thumb = '')
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->slug = $slug;
        $this->linhaFina = $linhaFina;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->data = $data;
        $this->data = $CategoriaTitulo;
        $thumb = $thumb;
    }

    //Setteres 
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
    public function setLinhaFina($linhaFina)
    {
        $this->linhaFina = $linhaFina;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function setCategoriaTitulo($CategoriaTitulo)
    {
        $this->setCategoriaTitulo = $CategoriaTitulo;
    }
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
    }


    //Getters
    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getSlug()
    {
        return $this->slug;
    }
    public function getLinhaFina()
    {
        return $this->linhaFina;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getCategoriaTitulo()
    {
        return $this->CategoriaTitulo;
    }
    public function getThumb()
    {
        return $this->thumb;
    }
}
