<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# CMS API

Api desenvolvida em Laravel para o desafio <b>Tech Plantão Ativo</b>. <br />
Desenvolvido por <b>Jose de Barros Campelo Neto</b> <br />
<a href="https://linkedin.com/in/campeloneto1" target="_blank">LinkedIn</a>
<a href="https://github.com/campeloneto1" target="_blank">GitHub</a>

# API hospedada na AWS

http://18.231.246.233/cms/public

# Blueprint da Api

https://cms89.docs.apiary.io/

# Instalação usando Docker

#### Requisitos para utilização

* Docker
* Docker Compose
* Composer

#### Configuração do ambiente 
Para configurar o ambiente serão necessários alguns passos:
    
* Clone o repositório no seu ambiente de desenvolvimento e execute os comandos a seguir
    
        git clone https://github.com/campeloneto1/cms.git
        
*   Execute os comandos:

        cd cms/
        composer install
    
* Execute o comando para subir o container

        docker-compose up

* A URL da aplicação será 
    
    http://localhost:8080/public

#Instalação manual    

#### Requisitos para utilização

* Servidor Apache
* MySql
* PHP ^8.1
* Composer

#### Configuração de ambiente


Para configurar o ambiente serão necessários alguns passos:

* Clone o repositório no seu ambiente de desenvolvimento

        git clone https://github.com/campeloneto1/cms.git

        
* Execute os comandos:

        cd cms/
        composer install
        
* Crie um banco de dados no Mysql

        mysql -u root -p;
        #informe a senha do usuário root
        CREATE DATABASE cms;
        CREATE USER 'cms'@'localhost' IDENTIFIED BY 'Cms123456!'; 
        GRANT ALL PRIVILEGES ON cms . * TO 'cms'@'localhost'; 

* Altere o nome do arquivo .env.example para .env e informe os seguintes dados referente a conexão com o MySql:

        DB_HOST=127.0.0.1     #endereço IP do bd
        DB_PORT=3306          #porta utilizada pelo bd
        DB_DATABASE=cms       #nome do banco de dados
        DB_USERNAME=cms       #usuário com permições para alterações no banco informado
        DB_PASSWORD=Cms123456!    #senha do usuário

* Abra o terminal na pasta da aplicação e execute os seguintes comandos:

        php artisan key:generate
        php artisan migrate:fresh --seed
        php artisan passport:install
        
* Se estiver utilizando linux, execute o seguinte comando:
    
        sudo chmod 775 -R cms/         

* Se a aplicação for hospedada em um servidor apache (No Ubuntu, fica na pasta '/var/www/html'), basta utilizar a seguinte URL com os end-points disponíveis na seção Requisições

    http://localhost/cms/public

* Caso não tenha um servidor apache, execute o comando a seguir

        php artisan serve

    
* A URL da aplicação será 
    
    http://localhost:8000

# Autenticação [/api/login]

## Realizar login [POST]

A aplicação utiliza Laravel Passport, para proteção de end-points e autenticação de usuários, para isso, se faz necessário realizar uma requisição de login.

Estão diponíveis três usuários:

* cpf: 11111111111, senha: 123456
* cpf: 22222222222, senha: 123456
* cpf: 33333333333, senha: 123456

Observação 01: Sempre que realizer login com um usuário, todas as outras sessões do usuário serão desativadas.    
    
Observação 02: Foi estabelecido um limite de 5 requisições por minuto no end-point /api/login, para evitar ataques de força bruta.

Observação 03: A API irá retornar um token a ser utilizado nas requisições para os demais end-poins, o token deve ser do tipo **Authorization Bearer Token**

+ Request Criar um post

    + Headers

            Accept: application/json
            Content-Type: application/json
            
    + Attributes (Login)

+ Response 200 (application/json)

    + Attributes (ReturnLogin)    

# Posts 

# Listar e Cadastrar [/api/posts]

## Listar posts [GET]
Retorna todos os posts.

+ Request (application/json)

    + Headers
    
            Authorization: Bearer {token}

+ Response 200 (application/json)

    + Attributes (array[Return])
    

## Cadastrar post [POST]

Cadastrar um novo post.

+ Request Criar um post

    + Headers

            Accept: application/json
            Content-Type: application/json
            Authorization: Bearrer {token}
            
    + Attributes (Create)

    + Body

            {
                "title": "hotel",
                "author": "Jett Hilpert",
                "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
                "tags": [
                    "node",
                    "organizing",
                    "webapps",
                    "domain",
                    "developer",
                    "https",
                    "proxy"
                ],
                
            }

+ Response 201 (application/json)

    + Attributes (Return)    
    
    + Body

                {
                    "title": "hotel",
                    "author": "Jett Hilpert",
                    "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
                    "tags": [
                        "node",
                        "organizing",
                        "webapps",
                        "domain",
                        "developer",
                        "https",
                        "proxy"
                    ],
                    "id": 4
                }


# Filtro [/api/posts?tag={tag}]    

 + Parameters

    + tag: planning (string) - Tag do post.

## Filtrar por tag [GET]

Retorna todos os posts que possuam a {tag} passada na URL.

+ Request (application/json)

    + Headers
    
            Authorization: Bearer {token}

+ Response 200 (application/json)

    + Attributes (array[Return])
    
    + Body
    
                [
                    {
                        "id": 1,
                        "title": "Notion",
                        "author": "Marcia Thiel",
                        "content": "Sed soluta nemo et consectetur reprehenderit ea reprehenderit sit. Aut voluptate sit omnis qui repudiandae. Cum sit provident eligendi tenetur facere ut quo. Commodi voluptate ut aut deleniti.",
                        "tags": [
                            "organization",
                            "planning",
                            "collaboration",
                            "writing",
                            "calendar"
                        ]
                    }
                ]

# Filtro [/api/posts/{tag}]    

 + Parameters

    + tag: organization (string) - Tag do post.

## Filtrar por tag [GET]

Para utilização de uma URL mais amigável, basta colocar uma '/' após o endpoint 'posts' e informar o nome da {tag} que deseja filtrar. <br />
Retorna todos os posts que possuam a {tag} passada na URL.

+ Request (application/json)

    + Headers
    
            Authorization: Bearer {token}

+ Response 200 (application/json)

    + Attributes (array[Return])    
    
    + Body
    
                [
                    {
                        "id": 1,
                        "title": "Notion",
                        "author": "Marcia Thiel",
                        "content": "Sed soluta nemo et consectetur reprehenderit ea reprehenderit sit. Aut voluptate sit omnis qui repudiandae. Cum sit provident eligendi tenetur facere ut quo. Commodi voluptate ut aut deleniti.",
                        "tags": [
                            "organization",
                            "planning",
                            "collaboration",
                            "writing",
                            "calendar"
                        ]
                    }
                ]

# Edição e Exclusão [/api/posts/{id}] 

 + Parameters

    + id: 1 (number) - Id do post.


## Editar post [PUT]
Altera as informções do post com {id} informado no parâmetro passado na URL.

Na requisição pode ser passados todos os parametros ou apenas os que deseja alterar.

+ Request (application/json)

    + Headers
    
            Authorization: Bearer {token}
    
    + Attributes (Update)       
    
    + Body 
    
                {
                    "title": "hotel 3",
                }

+ Response 200 (application/json)

    + Attributes (Return)
    
    + Body
    
                {
                    "id": 1,
                    "title": "hotel 3",
                    "author": "Jett Hilpert",
                    "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
                    "tags": [
                        "node",
                        "organizing",
                        "webapps",
                        "domain",
                        "developer",
                        "https",
                        "proxy"
                    ]
                }


## Excluir post [DELETE]

Exclui o post referente ao {id} informado como parâmetro da URL.

+ Request (application/json)

    + Headers
    
            Authorization: Bearer {token}
            
   
+ Response 204 (application/json)


# Data Structures

## Id (object)
+ id (number) - Id do post

## Tag (object)
+ tag (string) - Tag do post

## Token (object)
+ token (string) - Token de sessão

## Create (object)
+ title (string, required) - Título do post
+ author (string, required) - Autor do post
+ content (string, required) - Texto do post
+ tags (array[string], required) - Texto do post

## Return (object)
+ id (number, required) - Id do post
+ title (string, required) - Título do post
+ author (string, required) - Autor do post
+ content (string, required) - Texto do post
+ tags (array[string], required) - Texto do post

## Update (object)
+ title (string, optional) - Título do post
+ author (string, optional) - Autor do post
+ content (string, optional) - Texto do post
+ tags (array[string], optional) - Texto do post

## Login (object)
+ cpf (string, required) - CPF do usuário
+ password (string, required) - Senha do usuário

## User (object)
+ id (number) - Id do usuário
+ nome (string) - Nome do usuário
+ cpf (string) - CPF do usuário

## ReturnLogin (object)
+ token (string) - Token de seção
+ user (User) - Usuário
