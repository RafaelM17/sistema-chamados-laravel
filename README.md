# Sistema de Chamados

Sistema de chamados desenvolvido em Laravel para gerenciamento de solicitações internas, com distribuição automática de atendimento.

---

## 🚀 Como rodar o projeto

- git clone https://github.com/RafaelM17/sistema-chamados.git
- composer install
- cp .env.example .env
- php artisan key:generate
- configurar banco de dados no arquivo .env
- php artisan migrate
- php artisan serve

---

## 🧠 Funcionalidades

- Criar chamados
- Editar chamados
- Listar chamados
- Visualizar chamados
- Excluir chamados

---

## 👥 Responsáveis

O sistema trabalha com responsáveis pré-cadastrados que podem ser atribuídos aos chamados.

---

## ⚙️ Regra de distribuição automática

Ao criar um chamado, o sistema pode atribuir automaticamente o responsável com menor carga de trabalho.

Para isso, ele:
- Conta quantos chamados em aberto cada responsável possui
- Ordena do menor para o maior número de chamados
- Atribui o chamado ao responsável com menor quantidade

### Chamados considerados em aberto:
- aberto
- em andamento

---

## 🧱 Tecnologias utilizadas

- Laravel
- PHP
- MySQL
- Blade

---

## 🌐 Rotas principais (resource)

- /chamados → listagem
- /chamados/create → criação
- /chamados/{id}/edit → edição
- /chamados/{id} → visualização

---

## 📌 Observação

O projeto utiliza resource routes do Laravel para organização padrão de CRUD.