<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# API CMS

Api desenvolvida em Laravel para o desafio <b>Tech Plantão Ativo</b>. <br />
Desenvolvido por <b>Jose de Barros Campelo Neto</b> <br />
<a href="https://linkedin.com/in/campeloneto1" target="_blank">LinkedIn</a>
<a href="https://github.com/campeloneto1" target="_blank">GitHub</a>

## API hospedada na AWS

    http://18.231.246.233/cms/public

Utilizar end-points disponíveis nas seções <b>Autenticação</b> e <b>Requisições</b>

## Instalação local

## Requisitos para utilização

* Servidor Apache <br />
* MySql  <br />
* PHP ^8.1 <br />
* Laravel ^10.10 

## Configuração de ambiente

Para configurar o ambiente serão necessários alguns passos:

01 Clone o repositório no seu ambiente de desenvolvimento

    git clone https://github.com/campeloneto1/cms.git

Observação: Se estiver utilizando linux, talvez seja necessário alterar as permisões de pastas e arquivos com o comando:
    
    sudo chmod 775 -R cms/   

02 Execute os comandos:

    cd cms/
    composer install

03 Crie um banco de dados no Mysql

    mysql -u root -p;
    #informe a senha do usuário root
    CREATE DATABASE cms;
    CREATE USER 'cms'@'localhost' IDENTIFIED BY 'Cms123456!'; 
    GRANT ALL PRIVILEGES ON cms . * TO 'cms'@'localhost'; 

04 Altere o nome do arquivo .env.example para .env e informe os seguintes dados referente a conexão com o MySql:

    DB_HOST=127.0.0.1     #endereço IP do bd
    DB_PORT=3306          #porta utilizada pelo bd
    DB_DATABASE=cms       #nome do banco de dados
    DB_USERNAME=cms       #usuário com permições para alterações no banco informado
    DB_PASSWORD=Cms123456!    #senha do usuário

05 Abra o terminal na pasta da aplicação e execute os seguintes comandos:

    php artisan key:generate
    php artisan migrate:fresh --seed
    php artisan passport:install

Se a aplicação for hospedada em um servidor apache (No Ubuntu, fica na pasta '/var/www/html'), basta utilizar a seguinte URL com os end-points disponíveis na seção Requisições

    http://localhost/cms/public

Caso não tenha um servidor apache, execute o comando a seguir
    
    php artisan serve

A URL da aplicação será 
    
    http://localhost:8000

    
## Autenticação

A aplicação utiliza Laravel Passport, para proteção de end-points e autenticação de usuários, para isso, se faz necessário realizar uma requisição de login. <br /><br />
Estão diponíveis três usuários: <br /><br />
    cpf: 11111111111, senha: 123456 <br />
    cpf: 22222222222, senha: 123456 <br />
    cpf: 33333333333, senha: 123456 <br />

Observação 01: Sempre que realizer login com um usuário, todas as outras sessões do usuário serão desativadas.    

Observação 02: Foi estabelecido um limite de 5 requisições por minuto no end-point /api/login, para evitar ataques de força bruta.   

    + Attributes
         + cpf (string, required)
         + password (string, required)
    
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
        }
    }

A API irá retornar um token a ser utilizado nas requisições para os demais end-poins, o token deve ser do tipo <b>Authorization Bearer Token</b>

## Requisições

### GET /api/posts
Retorna todos os posts.

    + Headers
         Authorization: Bearer {token}
    
    + Request
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

  ### GET /api/posts?tag=planning 
  Retorna todos os posts que possuam a {tag} passada na URL, no exemplo acima, o nome da {tag} é 'planning'.

    + Headers
         Authorization: Bearer {token}

    + Request
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

  ### GET /api/posts/writing
  Para utilização de uma URL mais amigável, basta colocar uma '/' após o endpoint 'posts' e informar o nome da {tag} que deseja filtrar. <br />
  Retorna todos os posts que possuam a {tag} passada na URL, no exemplo acima, o nome da {tag} é 'writing'.

    + Headers
         Authorization: Bearer {token}

    + Request
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
    

  ### POST /api/posts
  Cadastrar um novo post.<br />

    + Headers
         Authorization: Bearer {token}
         
    + Attributes
         + title (string, required)
         + author (string, required)
         + content (string, required)
         + tags (array, required)
     
    + Request (application/json)
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

  ### PUT /api/posts/{id} 
  Altera as informções do post com {id} informado no parâmetro passado na URL. <br />
  
  Na requisição pode ser passados todos os parametros ou apenas os que deseja alterar. <br />

    + Headers
         Authorization: Bearer {token}

    + Attributes
         + title (string, optional)
         + author (string, optional)
         + content (string, optional)
         + tags (array, optional)
        
    + Request (application/json)
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

  ### DELETE /api/posts/{id}  
  Exclui o post referente ao {id} informado como parâmetro da URL.

    + Headers
         Authorization: Bearer {token}

    + Request
    DELETE {url-da-aplicacao}/api/posts/{id}
    
    + Response 204

