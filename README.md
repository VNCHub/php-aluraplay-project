# php-aluraplay-project
## Portfólio: Sistema CRUD de Vídeos Online em PHP

Este portfólio busca demonstrar uma aplicação web em PHP que realiza operações CRUD (Create, Read, Update, Delete) de vídeos online. O projeto abrange boas práticas no gerenciamento de sessão e cookies para proporcionar uma experiência segura e personalizada aos usuários, incluindo autenticação de usuários.

## Funcionalidades

- **Cadastro de Vídeos:** Adicione novos vídeos à plataforma.
- **Listagem de Vídeos:** Visualize a lista de todos os vídeos disponíveis.
- **Atualização de Vídeos:** Modifique as informações dos vídeos existentes.
- **Exclusão de Vídeos:** Remova vídeos da plataforma.
- **Login de Usuários:** Autentique-se para acessar recursos protegidos.

## Tecnologias Utilizadas

- **PHP 8.1+:** Linguagem de programação principal.
- **HTML e CSS:** Estruturação e estilização da interface.
- **SQLite:** Banco de dados para armazenar informações sobre os vídeos.

## Dependências

Certifique-se de ter o seguinte para executar o projeto:

- **PHP 8.1 ou mais recente:** [Download do PHP](https://www.php.net/downloads)
- **Extensão PDO_SQLite habilitada:** Consulte o passo a passo abaixo.

    **Passo a Passo para Habilitar PDO_SQLite:**
    1. Abra o arquivo `php.ini` no seu editor de texto preferido.
    2. Localize a linha `;extension=pdo_sqlite` e remova o ponto e vírgula no início para descomentar a linha.
    3. Salve e feche o arquivo `php.ini`.
    4. Reinicie seu servidor PHP.

## Como Executar o Projeto

1. **Configuração do Banco de Dados:**
    - Não é necessário configurar um servidor de banco de dados separado. O SQLite será utilizado e o banco de dados estará incluído no projeto.

2. **Configuração do Ambiente:**
    - Não é necessário configurar credenciais de banco de dados. A configuração padrão do SQLite será usada.

3. **Execução:**
    - Abra o terminal na raiz do projeto e execute o comando `php -S localhost:8000 -t public/`.
    - Acesse `http://localhost:8000` em seu navegador.

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar um pull requests com melhorias.

## Autor

Vinicius Carrocine - [VNCHub](https://github.com/VNCHub)
