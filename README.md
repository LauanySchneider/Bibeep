# 🚀 Bibeep - Cadastro de codigos de barras
Seja bem-vindo ao Bibeep! Este projeto foi criado para permitir o cadastro de codigos de barras e informações de produtos e a exibição de uma lista com todos os dados cadastrados, tudo armazenado em um banco de dados. Com ele, você pode cadastrar informações como Codigo do Produto, Marca, Nome do Produto, Cor, Quantidade, Valor Unitario e Margem de Lucro, e ver a lista de Produtos com o seu Valor Total e Valor de Venda em tempo real com foto. 😎


# 👤 Autor
Este projeto foi desenvolvido por [Lauany Schneider Souza & Murilo Garcia Ribeiro]. ✨


# 📋 Funcionalidades
Cadastro de Produto 📝

• Adicione informações de um novo produto: Codigo do Produto, Marca, Nome do Produto, Cor, Quantidade, Valor Unitario e Margem de Lucro.
O sistema valida se todos os campos foram preenchidos corretamente.
Após a validação, o sistema calcula o Valor Total e o Valor de Venda e adiciona no bando de dados.


Listagem de Produtos 📊

• Visualize todos os produtos cadastrados em uma tabela organizada.
As informações são carregadas diretamente do banco de dados.
Você pode atualizar a lista a qualquer momento para visualizar novos usuários.

Exclusão de Produtos 🗑️

• Exclua produtos da lista com um simples clique.
A exclusão é feita no Banco de Dados e a tabela é atualizada automaticamente.


# 🛠️ Tecnologias Utilizadas
• HTML: Estruturação da página de cadastro e administração.
• CSS: Estilização das páginas, utilizando fontes e cores para uma interface agradável.
• JavaScript: Lógica de controle de formulários, validação de dados e manipulação.
• Bootstrap: Framework para estilizar componentes como a barra de navegação e botões.
• Banco de Dados: Armazenamento local dos dados do usuário no navegador.
• FrameWork Laravel: Biblioteca PHP.




# 🚀 Como Usar
1. Clone ou Baixe o Repositório
Você pode clonar o repositório ou baixar como um arquivo zip:


1. Clone o repositório:
    ```bash
    git clone https://github.com/LauanySchneider/Bibeep.git
    ```

2. Entre no diretório do projeto:
    ```bash
    cd Bibeep
    ```

3. Instale as dependências do Composer:
    ```bash
    composer install
    ```

Caso necessite do instalador .exe do Composer, user este link (https://getcomposer.org/download/)

4. Faca a copia das variveis de ambiente e baixe, arquivo necessario para que funcione o Bibeep:
https://drive.google.com/drive/folders/1nyN8F1sni1w9J0muEQWi-zIeOKONJAjf?usp=sharing


     ```bash
    copy .env.example .env
    ```



5. Configure o banco de dados no arquivo `.env` :

## Database Configuration
Para conectar com o PostgreSQL database, voce precisa configurar as seguintes  variaveis de ambiente:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=crud_produtos
DB_USERNAME=postgres
DB_PASSWORD=postgres
   ```

6. Execute as migrações do banco de dados:
    ```bash
     php artisan key:generate
    ```
     ```bash
     php artisan migrate
    ```


## COMO EXECUTAR 


1. Abra o terminal no VSCode, certifique-se se esta na pasta Bibeep:
    ```bash
    php artisan serve
    ```
    


  

# ⚠️ Dificuldades Conhecidas


• Devido a sua complexidade, o Laravel pode ser difícil de se trabalhar, onde você arruma de um lado e para em um outro ponto, necessário tomar cuidado com as alterações e guardar um backup.

# 💡 Dicas e Sugestões:

Este projeto pode ser expandido com a inclusão de mais funcionalidades,espero que este projeto seja útil para você! 😄 Caso tenha dúvidas ou sugestões, fique à vontade para abrir uma issue ou fazer um pull request. 🙌
