<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## lista_produtos_v2
O lista_produtos_v2 é uma nova versão do listagem_produtos onde foi realizado o projeto em Laravel e adicionado outras funções extras.
Neste projeto será possível ao usuário:

- Visualizar uma lista de produtos;
- Adicionar um novo produto a listagem;
- Editar o produto adicionado à lista;
- Remover o produto adicionado à lista;


## Clonando o repositório
Utilize o comando git clone para fazer a clonagem do repositório:
git clone https://github.com/lucasmramires/listra_produtos_v2.git

Caso preferir, pode realizar o download diretamente pelo Github.


## Instalar as dependências via composer
Para que todas as dependências do projeto sejam instaladas, você precisa instalar o composer. Caso não tenha o composer instalado, você pode fazer o download aqui.
Após o composer instalado, inciamos a instalação das dependências com o comando:
composer require laravel/ui

Execute o código abaixo para instealar as dependências do projeto
composer install

Continuamos com a instalação do npm para que o Bootstrap.css seja corretamente configurado.
npm install

### Criar uma cópia do arquivo .env
Precisamos gerar um arquivo .env para colocarmos as informações de configuração. Para isto, faça uma cópia do arquivo '.env.example' e renomeie para '.env'.

## Gerar uma chave de encriptação
Por padrão, o Laravel exige uma chave de encriptação para seus projetos. Para isto, geramos a chave através do comando:
php artisan key:generate

## Criar um banco de dados
Crie o banco de dados e coloque as informações relativas ao mesmo dentro do arquivo '.env'.

## Realize a migração do banco de dados
Para iniciarmos o banco de dados com as tabelas necessárias, rode os comandos:
php artisan migrate
php artisan db:seed --force

## Rode a aplicação
Após todas etapas concluidas, podemos rodar a aplicação:
php artisan serve

O Laravel utiliza a porta 8000, então você poderá acessar no seu localhost:8000.
