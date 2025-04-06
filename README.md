# 🐳 Laboratório Docker: Utilização Prática no Cenário de Microsserviços

🔗 **Repositório original:** [github.com/denilsonbonatti/toshiro-shibakita](https://github.com/denilsonbonatti/toshiro-shibakita)  
👨‍🏫 **Autor** do projeto original: **Denilson Bonatti** - Instrutor na **Digital Innovation One**

---
   
#### 📌  Projeto adaptado e implementado por **Thiago Correia** durante o Bootcamp Santander - Linux para Iniciantes.

Um ambiente de desenvolvimento simples com **Docker**, ideal para aprendizado, testes e experimentações com containers.


A estrutura de microsserviços foi construída **localmente**, sem necessidade de instâncias EC2 da AWS, utilizando **Docker Containers**.

---

## 🚀 Tecnologias Utilizadas

- PHP 7.4+
- MySQL 5.7+
- Apache
- Docker + Docker Compose
- HTML + CSS (front-end básico)

---

## 🧱 Estrutura de Microsserviços

O projeto simula uma aplicação com os seguintes containers:

- 🧩 **3 containers PHP/Apache** — inserem dados aleatórios em um banco de dados.
- 🗄️ **1 container MySQL** — responsável pelo armazenamento dos dados.
- 🌐 **1 container Nginx** — funciona como *Load Balancer*, distribuindo as requisições entre os containers PHP.

---

## 📁 Estrutura de Diretórios

    linux-projeto3-docker/
    ├── docker-compose.yml
    ├── app/
    │   ├── Dockerfile
    │   ├── home.html
    │   ├── listar.php
    │   ├── inserir.php
    │   └── style.css
    ├── database/
    │   └── banco.sql
    ├── nginx/
    │   └── nginx.conf
    └── README.md

---

## ⚙️ Pré-requisitos

Antes de rodar o projeto, é necessário ter instalado:

- Docker
- Docker Compose

### 💻 Instalação no Ubuntu

    sudo apt update
    sudo apt install docker.io docker-compose -y
    sudo systemctl start docker
    sudo systemctl enable docker

---

### ▶️ Como Executar o Projeto

1. Crie um fork desse repositório

2. Clone ou copie a estrutura do projeto.
    
    ```
    git clone https://github.com/seu-usuario/linux-projeto3-docker.git

3. No terminal, navegue até o diretório do projeto.

    ```
    cd linux-projeto3-docker

4. Execute o comando:

        docker-compose up --build

5. Acesse no navegador:
   
    http://<IP_DA_VM>:4500/home.html

    Exemplo:

    http://192.168.1.100:4500/home.html


A cada clique no botão de inserção do dashboard ou atualização da página inserir.php, o Nginx redireciona a requisição para um dos containers PHP disponíveis, que insere um novo registro aleatório no banco de dados.

---

### 🔄 Load Balancing com Nginx

O arquivo nginx.conf define um upstream com três servidores (php1, php2, php3), todos ouvindo na porta 80.
A porta externa 4500 é exposta para acesso via navegador.

---

### 🧪 Teste

Acesse no navegador:

    http://<IP_DA_VM>:4500/home.html

- A cada clique no botão de inserção do dashboard ou atualização da página inserir.php, um dos containers PHP insere dados no MySQL.

---

### ❌ Encerrar e remover containers

    docker-compose down -v
