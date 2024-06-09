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

05 A aplicação possui proteção de rotas, então é necessário realizar o login com as credencias:

    {
        'cpf': '11111111111',
        'password': '123456'
    }

 06 A API irá retornar um token a ser utilizado nas requisições para os demais end-poins, o token deve ser do tipo Authorization Bearer Token

 07 Foram criados end-points nas rotas

     GET http://localhost/cms/public/api/posts -> retorna todos os postos
     GET http://localhost/cms/public/api/posts?tag={tag} -> retorna todos os postos que possuam a tag node
     GET http://localhost/cms/public/api/posts/{tag} -> Para utilização de uma URL mais amigável, basta colocar uma "/" após o endpoint posts e informar o nome da tag que deseja filtrar
     POST http://localhost/cms/public/api/posts -> cadastra um novo post, exemplo de informações:
         {
            "title": "hotel",
            "author": "Jett Hilpert",
            "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
            "tags":["node", "organizing", "webapps", "domain", "developer", "https", "proxy"]
        }
      PUT http://localhost/cms/public/api/posts/{id} -> altera as informções do post com id informado no parâmetro passado na url
          {
            "title": "hotel",
            "author": "Jett Hilpert",
            "content": "Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.",
            "tags":["node", "organizing", "webapps", "domain", "developer", "https", "proxy"]
        }
      DELETE http://localhost/cms/public/api/posts/{id} -> exclui o post referente ao id informado como parâmetro da url
    
     

