## Requisitos

* PHP 8.2 ou superior
* Composer

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env".<br>
Alterar no arquivo .env as credenciais do banco de dados.<br>
Alterar no arquivo .env as credenciais do o servidor de e-mail.<br>
Servidor Iagente: https://www.iagente.com.br/solicitacao-conta-smtp/origin/celke<br>

Instalar as dependências do PHP
```
composer install
```

Gerar a chave
```
php artisan key:generate
```

Executar as migration
```
php artisan migrate
```

Executar as seed
```
php artisan db:seed
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Para acessar a API, é recomendado utilizar o Insomnia para simular requisições à API.
```
http://127.0.0.1:8000/api/
```

## Lista de requisições no Insomnia
Backup das requisições do Insomnia disponível no diretório "Insomnia".<br>
Criar as variáveis de ambiente:
```
{
	"URL": "http://menu_ip_da_maquina:8000/api/",
	"TOKEN": "gerar_token_na_rota_login_e_colocar_aqui"
}

## Sequencia para criar o projeto
Criar o projeto com Laravel
```
composer create-project laravel/laravel .
```

Criar o arquivo de rotas para API
```
php artisan install:api
```

Executar as migration
```
php artisan migrate
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Executar as seed
```
php artisan db:seed
```
