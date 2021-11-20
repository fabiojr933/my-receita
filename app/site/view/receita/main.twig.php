{% extends "partials/body.twig.php" %}
{% block title %} receita listar - Receita {% endblock %}
{% block body %}
<h1>Receita</h1>
<a href="{{BASE}}receita/adicionar/" class="btn btn-primary">Nova receita</a>

<hr>
<br>
<br>
<form action="{{BASE}}receita/" method="post">
    <div class="row">
        <div class="col-md-8">
            <select name="slCategoria" id="slCategoria" class="form-control">
                {% for categoria in listaCategorias %}
                <option value="{{categoria.id}}" {{categoria.id == categoriaId ? 'SELECTED' : '' }}>{{categoria.titulo}}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-md-4">
            <input type="submit" value="Buscar" class="btn btn-success">
        </div>
    </div>
</form>

<br>
<br>
<div class="overflow-auto">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Publicado</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            {% for r in receitas %}
            <tr>
                <td>{{r.id}}</td>
                <td>{{r.titulo}}</td>
                <td>{{r.slug}}</td>
                <td>{{r.data}}</td>
                <td>
                    <a href="{{BASE}}receita/editar/{{r.id}}" class="btn btn-warning ml-3">Editar</a>
                    <a href="{{BASE}}receita/ver/{{r.id}}" class="btn btn-info ml-7 ">Ver</a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}