# Sistema de Chamados

Sistema simples de chamados feito em Laravel.

---

## 🚀 Como rodar o projeto

- git clone do repositório
- composer install
- cp .env.example .env
- php artisan key:generate
- configurar banco no .env
- php artisan migrate
- php artisan serve

---

## 🧠 O que o sistema faz

- Criar chamados
- Editar chamados
- Listar chamados
- Excluir chamados
- Visualizar chamados

---

## 👥 Responsáveis

Existem responsáveis que atendem os chamados.

---

## ⚙️ Regra automática

O sistema atribui automaticamente o chamado para o responsável com menos chamados em aberto.

Chamados em aberto:
- aberto
- em andamento

---

## 🧱 Tecnologias

- Laravel
- PHP
- MySQL
- Blade