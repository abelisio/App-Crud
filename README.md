# Documentação do App Crud de Funcioários


## Visão Geral:

```
Este Crud foi desenvolvida em PHP no BAckend e Vuj no frontend e permite o cadastro de funcionários. Os dados são armazenados em um banco de dados MySQL.
```

## Requisitos

- **PHP 8.3+ ou superior**
- **vuetify**
- **redaxios**
- **Servidor Web (Apache)**
- **Banco de Dados MySQL**
- **Composer** (para gerenciamento de dependências)

## Instalação

1. **Clone o Repositório:**
   
```  
   bash
   git clone https://seu_repositorio.git
   cd seu_repositorio
```

2. **Instale as Dependências:**
   
```   
composer install
```

3. **Configuração do Banco de Dados:**

- **Crie uma nova base de dados no MySQL.**
- **Crie o banco de dados utilizando o arquivo:**

```
banco.sql
```

4. **Configuração da Conexão com o Banco de Dados:**

```
No arquivo env.php insira as credenciais do seu banco de dados:
```
```
define('DB_HOST', 'localhost');
define('DB_NAME', 'nome_do_banco_de_dados');
define('DB_USER', 'usuario');
define('DB_PASS', 'senha');
```

## Uso


1. **Criar um Carnê**
- **Endpoint:** POST: http://127.0.0.1:8000/api/employee
- **Parâmetros:**
- **Name:** O valor total do carnê.
- **address**: A quantidade de parcelas.
- **phone** (formato YYYY-MM-DD): A data do primeiro vencimento. 


2. **Recuperar Parcelas de um Carnê**
Endpoint: GET: http://127.0.0.1:8000/api/employee/{id}

#### Parâmetros:
- **id (int):** O identificador do carnê.

   
- Recebe todas as requisições HTTP.
- Direciona as requisições para o controlador correto, dependendo do método (GET, POST, etc.) e da rota.
  

## Testes

```
Para garantir que a API esteja funcionando corretamente, use ferramentas como Postman ou Insomnia para enviar requisições aos endpoints e verificar as respostas.
```