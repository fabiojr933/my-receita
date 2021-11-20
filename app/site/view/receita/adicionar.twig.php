{% extends "partials/body.twig.php" %}
{% block title %} Nova Receita - Receita {% endblock %}
{% block body %}
<h1>Nova Receita</h1>

<hr>
<form action="{{BASE}}receita/inserir" onsubmit="return validar(false);" method="post">
    <div class="row">
        <div class="col-md-5">
            <label for="txtTitulo">Titulo</label>
            <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Titulo">
        </div>
        <div class="col-md-4">
            <label for="txtSlug">Slug</label>
            <input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Slug">
        </div>
        <div class="col-md-3">
            <label for="slCategoria">Categoria</label>
            <select name="slCategoria" id="slCategoria" class="form-control">
                {% for categoria in listaCategoria %}
                <option value="{{categoria.id}}">{{categoria.titulo}}</option>
                {% endfor %}
            </select>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-12">
            <label for="txtLinhaFina">Thumb</label>
            <input type="text" id="txtThumb" name="txtThumb" class="form-control" placeholder="Thumb">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <label for="txtLinhaFina">Linha fina</label>
            <input type="text" id="txtLinhaFina" name="txtLinhaFina" class="form-control" placeholder="Linha Fina">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label for="txtDescricao">Conteudo</label>
            <textarea type="text" id="txtDescricao" name="txtDescricao" class="form-control" placeholder="Descrição"></textarea>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-10">
            <div id="dvAlert">
                <div class="alert alert-info">
                    Preencha correntamente todos os campos
                </div>
            </div>
        </div>
        <div class="col-md-2 text-right">
            <input type="submit" value="adicionar" class="btn btn-success w-100">
        </div>
    </div>
</form>
<script src="{{BASE}}js/receita.js"></script>
<script src="{{BASE}}vendor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('txtDescricao');
</script>
{% endblock %}