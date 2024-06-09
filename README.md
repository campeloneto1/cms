<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## API CMS

Api criada em Laravel para o desafio Tech Plantão Ativo, 

## Configuração de ambiente

Para configurar o ambiente serão necessários alguns passos:


01 Clone o repositório no seu ambiente de desenvolvimento

    git clone https://github.com/campeloneto1/cms.git

02 Execute o comando:

    composer install

03 Altere o nome do arquivo .env.example para .env e informe os seguintes dados:

    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

04 Abra o terminal na pasta da aplicação e execute os seguintes comandos:

    php artisan migrate:fresh --seed
    php artisan passport:install

Se a aplicação for hospedada em um servidor apache o comando a seguir não precisa ser executado, bastando na requisição informar a url da aplicação

    http://localhost/cms/public

Caso não tenha um servidor apache, execute o comando a seguir
    
    php artisan serve

A url da aplicação será
    
    http://localhost:8000
    

05 A aplicação possui proteção de rotas, então é necessário realizar o login com as credencias:

    POST {url-da-aplicacao}/api/login
    {
        'cpf': '11111111111',
        'password': '123456'
    }

 06 A API irá retornar um token a ser utilizado nas requisições para os demais end-poins, o token deve ser do tipo Authorization Bearer Token

 07 Foram criados end-points nas rotas

 07.1 - Retorna todos os postos

     GET {url-da-aplicacao}/api/posts

 07.2 - Retorna todos os posts que possuam a tag passada na URL
 
     GET {url-da-aplicacao}/api/posts?tag={tag}

 07.3 Para utilização de uma URL mais amigável, basta colocar uma "/" após o endpoint posts e informar o nome da tag que deseja filtrar
 
     GET {url-da-aplicacao}/api/posts/{tag}

07.4 Cadastra um novo post, exemplo de informações:
     
     POST {url-da-aplicacao}/api/posts
         {
            "title": "hotel",
            "author": "Jett Hilpert",
            "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
            "tags":["node", "organizing", "webapps", "domain", "developer", "https", "proxy"]
        }

07.5 Altera as informções do post com id informado no parâmetro passado na url
        
      PUT {url-da-aplicacao}/api/posts/{id}
          {
            "title": "hotel",
            "author": "Jett Hilpert",
            "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
            "tags":["node", "organizing", "webapps", "domain", "developer", "https", "proxy"]
        }

  07.6  Exclui o post referente ao id informado como parâmetro da url
  
      DELETE {url-da-aplicacao}/api/posts/{id}
    
     

