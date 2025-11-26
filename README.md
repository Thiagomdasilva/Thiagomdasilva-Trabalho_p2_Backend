✅ README.md — Projeto Laravel + Docker + CRUD de Categorias
📦 Projeto Laravel com Docker + CRUD de Categorias

Aluno: Thiago Marinho da Silva
Matrícula: 202322140

Este projeto consiste em uma aplicação Laravel executando dentro de containers Docker, conectada a um banco MySQL, e implementa um CRUD completo de Categorias, conforme exigido pela atividade.

📘 Objetivos da Entrega

✔ Criar um ambiente Laravel completo usando Docker
✔ Configurar banco MySQL em container
✔ Organizar o projeto seguindo boas práticas
✔ Implementar operações CRUD usando:

Migrations

Models

Controllers

Rotas

Views Blade
✔ Não alterar profundamente o front-end padrão — apenas ajustes simples nos formulários

🛠️ Tecnologias Utilizadas

Laravel 10

PHP 8.2

MySQL 8

Docker + Docker Compose

Composer

Blade Templates

🐳 Como Executar o Projeto (Docker)
1️⃣ Clonar o repositório
git clone https://github.com/seu-repositorio/aqui.git
cd seu-projeto

2️⃣ Criar o arquivo .env

Copie o exemplo:

cp .env.example .env

3️⃣ Atualizar as variáveis do .env para o Docker

Use exatamente assim:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

4️⃣ Subir os containers
docker-compose up -d --build

5️⃣ Instalar dependências do Laravel (dentro do container app)
docker exec -it app composer install

6️⃣ Gerar key do Laravel
docker exec -it app php artisan key:generate

7️⃣ Rodar as migrations
docker exec -it app php artisan migrate

📁 Estrutura do Projeto (importante para avaliação)
/projeto
│
├── docker-compose.yml
├── Dockerfile
├── /src  (Código Laravel)
│   ├── app
│   │   └── Models
│   │       └── Category.php
│   │
│   ├── app/Http/Controllers
│   │       └── CategoryController.php
│   │
│   ├── database/migrations
│   │       └── 2025_xx_xx_create_categories_table.php
│   │
│   ├── resources/views/categories
│   │       ├── index.blade.php
│   │       ├── create.blade.php
│   │       └── edit.blade.php
│   │
│   ├── routes
│       └── web.php
│
└── README.md

🧱 CRUD de Categorias Implementado

Cada categoria possui:

Campo	Tipo
id	int
name	string
description	text
timestamps	padrões
🔧 Migrations

Local: database/migrations/*create_categories_table.php

Cria tabela categories.

🧩 Model

Local: app/Models/Category.php

Configura fillable e relacionamentos.

🎮 Controller

Local: app/Http/Controllers/CategoryController.php

Implementa:

✔ create
✔ store
✔ index
✔ edit
✔ update
✔ destroy

🌐 Rotas

Local: routes/web.php

Usa resource routes:

Route::resource('categories', CategoryController::class);

🖼️ Views Blade

Local: resources/views/categories/

index.blade.php → lista categorias

create.blade.php → formulário de criação

edit.blade.php → formulário de edição

▶️ Acessar o sistema

Depois de subir o Docker:

http://localhost:8000/categories

♻️ Como apagar containers antigos (caso necessário)
docker stop $(docker ps -aq)
docker rm $(docker ps -aq)
docker volume rm $(docker volume ls -q)
docker network prune -f
