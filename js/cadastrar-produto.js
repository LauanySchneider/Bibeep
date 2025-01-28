function calcularValorTotal() {
    // Obter os valores de preço unitário e quantidade
    var valorUnitario = parseFloat(document.getElementById('valorUnitario').value);
    var quantidade = parseInt(document.getElementById('quantidade').value);

    // Se ambos os valores forem válidos, calcular o valor total
    if (!isNaN(valorUnitario) && !isNaN(quantidade)) {
        var valorTotal = valorUnitario * quantidade;
        document.getElementById('valorTotal').value = valorTotal.toFixed(2); // Exibir o valor total com 2 casas decimais
    } else {
        document.getElementById('valorTotal').value = ''; // Limpar o campo se algum valor for inválido
    }
}

function calcularValorVenda(){
    var valorUnitario = parseFloat(document.getElementById('valorUnitario').value);
    var margemLucro = parseFloat(document.getElementById('margemLucro').value);

    if(!isNaN(valorUnitario) && !isNaN(margemLucro)){
        var valorVenda = valorUnitario * margemLucro;
        document.getElementById('valorVenda').value=valorVenda.toFixed(2);
    } else{
        document.getElementById('valorVenda').value = '';
    }
}