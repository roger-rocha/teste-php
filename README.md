## Teste PHP

O projeto foi feito todo em Laravel, usei um pouco de Bootstrap e Jquery

Coloquei o projeto rodando em uma instancia da AWS para facilitar o teste.

Link: http://18.228.228.81/empresa

Fiz a maioria das validações e requisitos desejáveis

Para conseguir extrair os dados dos aniversariante atráves do endpoint http://18.228.228.81/api/niver?id_empresa=1&mes=01

![Screenshot (48)](https://user-images.githubusercontent.com/74687838/185253500-ddcfefaa-7f4a-427f-86ba-b9089fe4215d.png)

Os parametros para a requisição são id_empresa, mes.

-------------------------------------------------------------------------------------------------------------------------------------

Caso queira importar o projeto e usar na maquina local, deve setar um banco mysql e colocar no .env do projeto as suas credenciais

Foi utilizado nesse projeto PHP 8.0 e Laravel 9

Executar esses comandos dentro do diretorio projeto

"npm i", "composer u" para instalar algumas dependencias

Executar o comando "php artisan migrate" (para criar as tabelas no banco) , "php artisan db:seed" (popular algumas coisas no banco), "php artisan key:generate" 

Logo após pode executar o comando "php artisan serve" que irá iniciar o projeto no seu localhost:8000

A pagina inicial é http://localhost8000/empresa
