function getValueById(id) {
    return document.getElementById(id).value;
}
function getById(id) {
    return document.getElementById(id);
}
function appendHTMLById(id, html) {
    return document.getElementById(id).innerHTML += html;
}
function pesquisar() {
    if (getValueById('txtPesquisa').length <= 2) {
        alert('Formulario invalido');
        return false;
    }
    var form = getById('frmPesquisa')
    var url = form.action + 'busca/' + getValueById('txtPesquisa');
    document.location.href = url;
}