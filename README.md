<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# API CMS

Api criada em <a href="https://laravel.com" target="_blank">Laravel</a> para o desafio Tech Plantão Ativo. <br />
Desenvolvido por Jose de Barros Campelo Neto

## Configuração de ambiente

Para configurar o ambiente serão necessários alguns passos:

Requisitos para utilização: <br />
    * Servidor Apache <br />
    * MySql  <br />
    * PHP 8.1 <br />
    * Laravel 10 

01 Clone o repositório no seu ambiente de desenvolvimento

    git clone https://github.com/campeloneto1/cms.git

02 Execute os comandos:

    cd cmd/
    composer install

03 Altere o nome do arquivo .env.example para .env e informe os seguintes dados:

    DB_HOST=127.0.0.1      #endereço do bd
    DB_PORT=3306           #porta utilizada pelo bd
    DB_DATABASE=laravel    #nome do banco de dados
    DB_USERNAME=root       #usuário com permições para alterações no banco informado
    DB_PASSWORD=           #senha do usuário

04 Abra o terminal na pasta da aplicação e execute os seguintes comandos:

    php artisan migrate:fresh --seed
    php artisan passport:install

Se a aplicação for hospedada em um servidor apache (No Ubuntu na pasta '/var/www/html'), basta utilizar a seguinte url com os end-points informados no item 05

    http://localhost/cms/public

Caso não tenha um servidor apache, execute o comando a seguir
    
    php artisan serve

A url da aplicação será 
    
    http://localhost:8000
    

05 A aplicação possui proteção de rotas, então é necessário realizar o login com as credencias:

    + Request (application/json)
    POST {url-da-aplicacao}/api/login
    {
        'cpf': '11111111111',
        'password': '123456'
    }

    + Response 200 (application/json)
    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxI...",
        "user": {
            "id": 1,
            "nome": "Usuario Teste",
            "cpf": "11111111111",
            "email_verified_at": null,
            "created_at": null,
            "updated_at": null
        }
    }

06 A API irá retornar um token a ser utilizado nas requisições para os demais end-poins, o token deve ser do tipo Authorization Bearer Token

07 Foram criados end-points nas rotas <br />
  07.1 - Retorna todos os postos
    
    + Request
    HEADER Authorization: Bearer {token}
    GET {url-da-aplicacao}/api/posts

    + Response 200 (application/json)
    [
        {
            "id": 1,
            "title": "hotel3",
            "author": "Jett Hilpert2",
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
        },
        {
            "id": 2,
            "title": "json-server",
            "author": "Eldora Schinner",
            "content": "Laudantium illum modi tenetur possimus natus. Sed tempora molestiae fugiat id dolor rem ea aliquam. Ipsam quibusdam quam consequuntur. Quis aliquid non enim voluptatem nobis. Error nostrum assumenda ullam error eveniet. Ut molestiae sit non suscipit.\nQui et eveniet vel. Tenetur nobis alias dicta est aut quas itaque non. Omnis iusto architecto commodi molestiae est sit vel modi. Necessitatibus voluptate accusamus.",
            "tags": [
                "api",
                "json",
                "schema",
                "node",
                "github",
                "rest"
            ]
        },
        {
            "id": 3,
            "title": "fastify",
            "author": "Delpha Balistreri",
            "content": "Eos corrupti qui omnis error repellendus commodi praesentium necessitatibus alias. Omnis omnis in. Labore aut ea minus cumque molestias aut autem ullam. Consectetur et labore odio quae eos eligendi sit. Quam placeat repellendus.\n Odio nisi dolores dolorem ea. Qui dicta nulla eos quidem iusto. Voluptatibus qui est accusamus sint perferendis est quae recusandae. Qui repudiandae cupiditate fugiat est.",
            "tags": [
                "web",
                "framework",
                "node",
                "http2",
                "https",
                "localhost"
            ]
        }
    ]

  07.2 - Retorna todos os posts que possuam a tag passada na URL

    + Request
    HEADER Authorization: Bearer {token}
    GET {url-da-aplicacao}/api/posts?tag={tag}

    + Response 200 (application/json)
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

  07.3 Para utilização de uma URL mais amigável, basta colocar uma '/' após o endpoint 'posts' e informar o nome da tag que deseja filtrar

    + Request
    HEADER Authorization: Bearer {token}
    GET {url-da-aplicacao}/api/posts/{tag}

     + Response 200 (application/json)
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
    

  07.4 Cadastrar um novo post:
     
     + Request (application/json)
     HEADER Authorization: Bearer {token}
     POST {url-da-aplicacao}/api/posts
     {
        "title": "hotel",
        "author": "Jett Hilpert",
        "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
        "tags":["node", "organizing", "webapps", "domain", "developer", "https", "proxy"]
    }

    + Response 201 (application/json)
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

  07.5 Altera as informções do post com {id} informado no parâmetro passado na url, na requisição pode ser passados todos os parametros ou apenas os que deseja alterar
        
    + Request (application/json)
    HEADER Authorization: Bearer {token}
    PUT {url-da-aplicacao}/api/posts/{id}
    {
        "title": "hotel",
        "author": "Jett Hilpert",
        "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
        "tags":["node", "organizing", "webapps", "domain", "developer", "https", "proxy"]
    }

    {
        "title": "hotel",
    }

    + Response 200 (application/json)
    {
        "id": 1,
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
        ]
    }

  07.6  Exclui o post referente ao id informado como parâmetro da url

    + Request
    HEADER Authorization: Bearer {token}
    DELETE {url-da-aplicacao}/api/posts/{id}
    
    + Response 204

