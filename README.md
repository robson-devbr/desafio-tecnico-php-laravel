<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Desafio Técnico – Desenvolvedor(a) PHP/Laravel (Pleno/Sênior)

## Descrição do Projeto

Este projeto é uma aplicação Laravel construída com base nos requisitos solicitados para o desafio técnico. A aplicação foi estruturada de forma a refletir os princípios SOLID e busca ser escalável, testável e segura. A seguir, estão as funcionalidades desenvolvidas, como rodar o projeto localmente, exemplos de uso das APIs e como rodar os testes automatizados.

## Funcionalidades

* **Autenticação e Autorização**: Utiliza Laravel Sanctum para autenticação via token.
* **Cadastro de Usuários**: Formulário de registro com nome, e-mail, senha, e endereço completo (integração com a API ViaCEP para preenchimento automático do endereço).
* **Login**: Autenticação via API REST com retorno de token.
* **Recuperação de Senha**: Envio de token de recuperação de senha via e-mail utilizando eventos e listeners.
* **Home Protegida**: Página que lista usuários com filtros por nome e e-mail. Acesso restrito a usuários autenticados.
* **Admin Panel (extra)**: Dashboard com métricas básicas e funcionalidades para editar e excluir usuários (somente para administradores).
* **Docker & Infraestrutura**: O projeto é executado em um ambiente Docker com serviços para Laravel, MailHog, e Banco SQLite.

---

## Tecnologias Utilizadas

* **Laravel 8/9**
* **Laravel Sanctum** (para autenticação via token)
* **PHP 8.2+**
* **Banco de Dados SQLite**
* **MailHog** (para simulação de envio de e-mails)
* **Docker** (para infraestrutura)
* **ViaCEP API** (para integração de preenchimento automático de endereço)
* **Tailwind CSS** (para estilização das views)

---

## Como Rodar o Projeto Localmente

### Pré-requisitos

* Docker (com Docker Compose)
* Git
* PHP 8.2+

### Passos para Rodar o Projeto

1. **Clone o repositório**:

   ```bash
   git clone https://github.com/seuusuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. **Instale as dependências**:

   O projeto utiliza Docker para configuração do ambiente. Para rodá-lo, siga os passos abaixo.

   * **Rodando o Docker**:

     Execute o seguinte comando para subir os containers:

     ```bash
     docker-compose up --build
     ```

     Isso vai subir os containers necessários para o Laravel, o banco SQLite e o MailHog.

3. **Acesse o container do Laravel**:

   Para interagir com o Laravel dentro do container Docker, rode:

   ```bash
   docker-compose exec -it laravel-app bash
   ```

4. **Instale as dependências do Laravel**:

   Dentro do container Docker, execute:

   ```bash
   composer install
   ```

5. **Instale as dependências do Nodejs**:

   Dentro do container Docker, execute:

   ```bash
   npm install
   ```

6. **Gere a chave da aplicação Laravel**:

   Execute o comando para gerar a chave de criptografia da aplicação:

   ```bash
   php artisan key:generate
   ```

7. **Rodar as migrações (opcional, caso use banco SQLite)**:

   O banco de dados SQLite será configurado automaticamente, mas você pode rodar as migrações com:

   ```bash
   php artisan migrate
   ```

8. **Vai abrir a porta http://localhost:8000/**:

 Execute na url:

   ```bash
   http://localhost:8000/
   ```
9. **Em http://localhost:8000/ você será guiado para o login**

10. **Acesse o MailHog para testar os e-mails**:

   O MailHog estará disponível em [http://localhost:8025](http://localhost:8025), onde você pode ver os e-mails enviados, incluindo os de recuperação de senha.

11. **Acesse a aplicação**:

   Você pode acessar a aplicação no navegador através de [http://localhost:8000](http://localhost:8000).

---

## Rotas da API

Aqui estão as rotas disponíveis para a API:

### **Autenticação**

* **POST /api/register**: Registra um novo usuário.

  * Payload:

    ```json
    {
      "name": "Nome Completo",
      "email": "email@example.com",
      "password": "senha",
      "password_confirmation": "senha",
      "role": "admin/user",
      "cep": "12345678",
      "street": "Rua Teste",
      "number": "123",
      "neighborhood": "Bairro Teste",
      "city": "Cidade Teste",
      "state": "SP"
    }
    ```

* **POST /api/home**: Realiza o login e retorna o token.

  * Payload:

    ```json
    {
      "email": "email@example.com",
      "password": "senha"
    }
    ```

* **POST /api/forgot-password**: Envia um e-mail com o token de recuperação de senha.

  * Payload:

    ```json
    {
      "email": "email@example.com"
    }
    ```

* **POST /api/reset-password**: Reseta a senha do usuário.

  * Payload:

    ```json
    {
      "email": "email@example.com",
      "password": "nova_senha",
      "password_confirmation": "nova_senha",
      "token": "token_de_recuperacao"
    }
    ```

### **Rotas Protegidas**

* **GET /api/users**: Lista os usuários cadastrados com paginação.

  * Requer autenticação (token).
* **GET /api/home**: Página protegida com as informações do usuário autenticado.

---

## Testes Automatizados

Para rodar os testes automatizados do projeto, execute os seguintes comandos dentro do container Docker:

1. **Testes unitários**:

   ```bash
   php artisan test --filter=Unit
   ```

2. **Testes de integração**:

   ```bash
   php artisan test --filter=Integration
   ```

---

## Considerações Finais

* **Arquitetura**: A aplicação foi estruturada seguindo o padrão de arquitetura limpa (Clean Architecture) para garantir que a aplicação seja escalável e fácil de manter. Foram utilizados padrões como Repository Pattern, Service Layer e Service Provider para garantir a separação das responsabilidades.

* **Autenticação**: O Laravel Sanctum foi utilizado para autenticação via tokens, garantindo segurança nas rotas protegidas.

* **Banco de Dados SQLite**: Escolhi o SQLite pela simplicidade e portabilidade. Ideal para um ambiente de desenvolvimento.

* **Envio de E-mails**: O envio de e-mails foi feito de maneira assíncrona usando o MailHog no Docker, o que permite simular o envio de e-mails sem a necessidade de uma configuração real de SMTP.


