{% extends "partials/body.twig.php" %}
{% block title %} receita listar - Receita {% endblock %}
{% block body %}
<h1>Receita</h1>
<h1>{{receita.0.titulo}}</h1>
<h2>{{receita.0.linhaFina}}</h2>
<br><br>
<a href="{{BASE}}receita/editar/{{receita.0.id}}" class="btn btn-primary">Editar receita</a>
<br>
<div class="overflow-auto mt-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Slug</th>
                <th>Categoria</th>
                <th>Publicação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{receita.0.id}}</td>
                <td>{{receita.0.slug}}</td>
                <td>{{receita.0.categoriaTitulo}}</td>
                <td>{{receita.0.data | date('d/m/Y')}}</td>
            </tr>
        </tbody>
    </table>
    <div class="mt-3">
        {{receita.0.descricao | raw}}
    </div>
</div>
{% endblock %}