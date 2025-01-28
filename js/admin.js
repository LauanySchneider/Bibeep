function filterTable() {
    // Obter o valor do campo de busca
    var searchValue = document.getElementById("search").value.toUpperCase();
    
    // Obter a tabela e suas linhas
    var table = document.getElementById("dataTable");
    var rows = table.getElementsByTagName("tr");

    // Loop pelas linhas da tabela
    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var codeCell = cells[0]; // A célula com o código
        if (codeCell) {
            var code = codeCell.textContent || codeCell.innerText;
            // Se o código corresponder à busca, mostrar a linha, caso contrário, esconder
            if (code.toUpperCase().indexOf(searchValue) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}