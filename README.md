# app-notifier

Pequeno conjunto de páginas PHP para:
- Gerenciar contatos em uma tabela MySQL (index.php)
- Exibir informações do ambiente/servidor (phpinfo.php)

## Aplicações

1) Contact Manager (`index.php`)
- Função: cadastrar e listar contatos (Nome e Celular)
- Banco: utiliza MySQL via `mysqli`
- Tabela: `USERS` (criada automaticamente se não existir)
	- Colunas: `ID` (INT, PK, AI), `NAME` (VARCHAR(45)), `CELLPHONE` (VARCHAR(90))
- UI: Bootstrap 5
- Config: carrega credenciais do arquivo `../config.php` (diretório pai)

2) Info da Máquina (`phpinfo.php`)
- Função: exibe hostname, IP, SO, versão do PHP, software do servidor, tempo de resposta, User-Agent, cabeçalhos da requisição e variáveis de ambiente
- UI: Bootstrap 5

## Requisitos
- PHP 7.4+ (8.x recomendado)
- Servidor web (opcionalmente o servidor embutido do PHP)
- MySQL/MariaDB acessível para o Contact Manager

## Configuração

1) Banco de dados
- Crie um banco (ex.: `app_notifier`). A tabela `USERS` será criada automaticamente pelo `index.php` na primeira execução.

2) Arquivo de configuração de DB
- Crie um arquivo `config.php` no diretório pai deste projeto (atenção ao include: `index.php` usa `include "../config.php";`).
- Exemplo (NÃO versionar com credenciais reais):

```php
<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'seu_usuario');
define('DB_PASSWORD', 'sua_senha');
define('DB_DATABASE', 'app_notifier');
```

## Como executar

- Opção A: servidor embutido do PHP (para desenvolvimento)
	- Aponte o document root para este diretório e acesse:
		- `/index.php` para o Contact Manager
		- `/phpinfo.php` para informações do servidor

- Opção B: Apache/Nginx
	- Configure o VirtualHost/Server Block para o diretório do projeto
	- Garanta que o PHP esteja habilitado e que `../config.php` seja acessível pelo `index.php`

## Observações
- O demo não possui validações avançadas, máscara de telefone ou proteção CSRF; utilize apenas para fins educativos/demonstração.
- Não versão `config.php` com segredos. Prefira variáveis de ambiente/secret managers em produção.
- Ajuste permissões do arquivo de config conforme boas práticas de segurança.

## Estrutura do projeto

```
index.php      # Contact Manager (MySQL)
phpinfo.php    # Info da Máquina/Servidor
LICENSE        # Licença do projeto
README.md      # Este arquivo
```

## Licença

Consulte o arquivo `LICENSE` para detalhes da licença.