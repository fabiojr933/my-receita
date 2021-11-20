
## Configurações

Para realizar as configurações do projeto, basta acessar o arquivo **app/config/global.php** e alterar o valor das constantes.

```php

<?php

define('BASE', '/my-receitas/'); //Qual o diretório que o projeto se encontra
define('UNSET_COUNT', 1); //Quantos paths devem ser removidos da URI

define('DB_HOST', 'localhost'); //Servidor de banco de dados
define('DB_USER', 'root'); //Usuário de acesso ao banco de dados
define('DB_PASS', ''); //Senha de acesso ao banco de dados
define('DB_NAME', 'myreceitas'); //Nome do banco de dados
```

Na root do projeto contém o arquivo **.htaccess**, nele também é necessário fazer uma modificação.

```c
RewriteRule ^((?!public/).*)$ my-receitas/public/$1 [L,NC]
```

Observe que na linha acima temos o caminho para a pasta public, definida como **my-receitas/public/**, sendo assim, troque o caminho **my-receitas** pelo nome da pasta do seu projeto. Obs. Caso esteja na root, remova o caminho **my-receitas**.
