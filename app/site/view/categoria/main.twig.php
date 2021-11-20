{% extends "partials/body.twig.php" %}
{% block title %} Categoria listar - Receita {% endblock %}
{% block body %}
<h1>Categorias</h1>
<a href="{{BASE}}categoria/adicionar/" class="btn btn-primary">Nova categoria</a>

<hr>
<div class="overflow-auto">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Acão</th>
            </tr>
        </thead>
        <tbody>
            {% for categoria in listaCategoria %}
            <tr>
                <td>{{categoria.id}}</td>
                <td>{{categoria.titulo}}</td>
                <td>{{categoria.slug}}</td>
                <td>
                    <a href="{{BASE}}categoria/editar/{{categoria.id}}" class="btn btn-warning">Editar</a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}