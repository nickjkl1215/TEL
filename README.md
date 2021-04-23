# TEL
Avaliação Tecnica

Dados e Passos a serem seguidos.

DADOS

Framework - Laravel, instalador de pacotes - Composer .


PASSOS 

1 - Clonar repositório do git (https://github.com/nickjkl1215/TEL.git)

2 - Ir até a pasta do projeto e selecionar a pasta "Aplication".

3 - Instalar as dependências do composer com "composer install".

4 - Logo após rodar o comando "composer update" para atualizar os módulos.

5 - Instalar o breeze para configurar o UI "composer require laravel/breeze".

6 - Logo na sequencia rodar os comandos abaixo:

- php artisan breeze:install

- npm install npm run dev

7 - Configurar o arquivo .env para o banco "Aplication.sql".

8 - Criar as migrations do projeto com o "php artisan migrate".

9 - Gerar a key do projeto com "php artisan key:generate".

10 - Estou enviando juntamente na pasta TEL um anexo ".sql" do banco, se preciso, criar um banco no phpmyadmin chamado "Aplication" e importar  o arquivo "Aplication.sql".

11 - Agora é só rodar com o comando "php artisan serve".
