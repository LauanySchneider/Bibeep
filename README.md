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


# 📂 Estrutura de Arquivos
Aqui estão os principais arquivos do projeto:

• index.html: Página de cadastro de usuários.
• admin.html: Página de administração para exibir os usuários cadastrados.
• userCreation.js: Lógica para adicionar usuários ao localStorage e validar os dados.
• admin.js: Lógica para listar e excluir usuários.
• style.css: Estilos gerais do projeto.
• index.css: Estilos específicos da página de cadastro.


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

Caso necessite do Composer, user este link (https://getcomposer.org/download/)

4. Faca a copia das variveis de ambiente e baixe, arquivo necessario para que funcione o Bibeep:
https://drive.google.com/drive/folders/1nyN8F1sni1w9J0muEQWi-zIeOKONJAjf?usp=sharing


     ```bash
    copy .env.example .env
    ```


4. Configure o banco de dados no arquivo `.env` :

  



# ⚠️ Dificuldades Conhecidas
• Apesar de ser um projeto simples, há alguns desafios conhecidos que podem afetar a experiência do usuário:

• Framework Laravel: Pode haver problemas com versões com plugins.

• Interface Responsiva: A interface foi projetada para ser simples, mas pode não ser totalmente otimizada para todos os dispositivos móveis. Ajustes podem ser necessários para telas muito pequenas.

# 💡 Dicas e Sugestões:

Este projeto pode ser expandido com a inclusão de mais funcionalidades, como edição de dados ou integração com um banco de dados real.
Espero que este projeto seja útil para você! 😄 Caso tenha dúvidas ou sugestões, fique à vontade para abrir uma issue ou fazer um pull request. 🙌