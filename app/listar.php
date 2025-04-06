<?php

ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

$servername = "mysql";
$username = "root";
$password = "Senha123";
$database = "meubanco";

$link = new mysqli($servername, $username, $password, $database);

if ($link->connect_error) {
    die("Conexão falhou: " . $link->connect_error);
}

echo "<table border='1' cellpadding='5'><tr><th>ID</th><th>Nome</th><th>Tipo</th><th>Fornecedor</th><th>Host</th></tr>";

$sql = "SELECT * FROM dados ORDER BY ProdutoID DESC";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ProdutoID']}</td>
                <td>{$row['Nome']}</td>
                <td>{$row['Tipo']}</td>
                <td>{$row['Fornecedor']}</td>
                <td>{$row['Host']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhum dado encontrado.</td></tr>";
}
echo "</table>";
$link->close();
?>

<p><a href="home.html" style="display:inline-block; margin-bottom:15px;">Voltar ao Dashboard</a></p>
