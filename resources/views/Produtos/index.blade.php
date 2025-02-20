<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>Produtos</h1>

        <!-- Mensagem de Sucesso -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulário de Busca -->
        <input type="text" id="codigoBusca" class="form-control mb-3" placeholder="Buscar por Código" onkeyup="buscarCodigo()">

        <!-- Tabela de Produtos -->
        <table class="table table-bordered" id="tabelaProdutos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Marca</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr class="produto" data-codigo="{{ $produto->codigo }}">
                        <td>{{ $produto->codigo }}</td>
                        <td>{{ $produto->marca }}</td>
                        <td>{{ $produto->produto }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->valorVenda }}</td>
                        <td>
                            <!-- Editar Produto -->
                            <a href="#" onclick="editarProduto({{ $produto->id }})">Editar</a>
                            <!-- Excluir Produto -->
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Formulário de Cadastro de Produto -->
        <h2>Cadastrar Produto</h2>
        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" id="formProduto">
            @csrf
            <div class="mb-3">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" name="codigo" id="codigo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" name="marca" id="marca" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="produto" class="form-label">Produto:</label>
                <input type="text" name="produto" id="produto" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="valorUnitario" class="form-label">Valor Unitário:</label>
                <input type="text" name="valorUnitario" id="valorUnitario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="margemLucro" class="form-label">Margem de Lucro (%):</label>
                <input type="text" name="margemLucro" id="margemLucro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" name="imagem" id="imagem" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <!-- Modal de Edição de Produto -->
        <div id="modalEditarProduto" class="modal" tabindex="-1" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Produto</h5>
                        <button type="button" class="btn-close" onclick="fecharModal()"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEditarProduto" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="editCodigo" class="form-label">Código:</label>
                                <input type="text" name="codigo" id="editCodigo" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="editMarca" class="form-label">Marca:</label>
                                <input type="text" name="marca" id="editMarca" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="editProduto" class="form-label">Produto:</label>
                                <input type="text" name="produto" id="editProduto" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="editQuantidade" class="form-label">Quantidade:</label>
                                <input type="number" name="quantidade" id="editQuantidade" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="editValorUnitario" class="form-label">Valor Unitário:</label>
                                <input type="text" name="valorUnitario" id="editValorUnitario" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="editMargemLucro" class="form-label">Margem de Lucro (%):</label>
                                <input type="text" name="margemLucro" id="editMargemLucro" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="editImagem" class="form-label">Imagem:</label>
                                <input type="file" name="imagem" id="editImagem" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Função para buscar produtos por código
        function buscarCodigo() {
            const input = document.getElementById('codigoBusca');
            const filter = input.value.toUpperCase();
            const table = document.getElementById('tabelaProdutos');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const td = row.getElementsByTagName('td')[0];
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }
        }

        // Função para editar produto
        function editarProduto(id) {
            // Obtém os dados do produto (isso pode ser feito com Ajax, mas aqui vamos simular)
            const produto = {
                codigo: '123',
                marca: 'Marca X',
                produto: 'Produto X',
                quantidade: 10,
                valorUnitario: 50,
                margemLucro: 20
            };

            document.getElementById('editCodigo').value = produto.codigo;
            document.getElementById('editMarca').value = produto.marca;
            document.getElementById('editProduto').value = produto.produto;
            document.getElementById('editQuantidade').value = produto.quantidade;
            document.getElementById('editValorUnitario').value = produto.valorUnitario;
            document.getElementById('editMargemLucro').value = produto.margemLucro;

            const form = document.getElementById('formEditarProduto');
            form.action = `/produtos/${id}`;

            document.getElementById('modalEditarProduto').style.display = 'block';
        }

        // Função para fechar o modal
        function fecharModal() {
            document.getElementById('modalEditarProduto').style.display = 'none';
        }
    </script>
</body>
</html>


