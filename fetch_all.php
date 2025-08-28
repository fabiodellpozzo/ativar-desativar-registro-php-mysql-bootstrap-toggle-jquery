<?php
$conn = new mysqli("localhost", "root", "", "registrodb");

$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Total de registros
$total_result = $conn->query("SELECT COUNT(*) AS total FROM registros");
$total_row = $total_result->fetch_assoc();
$total_pages = ceil($total_row['total'] / $limit);

// Registros paginados
$result = $conn->query("SELECT * FROM registros ORDER BY id DESC LIMIT $start, $limit");

echo '<table class="table table-bordered">
<tr><th>ID</th><th>Título</th><th>Status</th><th>Data</th><th>Ações</th></tr>';

while($row = $result->fetch_assoc()){
  $checked = ($row["status"] === "Ativo") ? "checked" : "";
  echo '<tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["titulo"].'</td>
    <td>
      <input type="checkbox" class="status_toggle" data-id="'.$row["id"].'" '.$checked.'
        data-toggle="toggle" data-on="Ativo" data-off="Inativo"
        data-onstyle="success" data-offstyle="danger">
    </td>
    <td>'.$row["criado_em"].'</td>
    <td><button class="btn btn-danger btn-sm delete" data-id="'.$row["id"].'">Excluir</button></td>
  </tr>';
}
echo '</table>';

// Paginação inteligente: máximo 3 links
echo '<nav><ul class="pagination">';

$start_page = max(1, $page - 1);
$end_page = min($total_pages, $start_page + 2);

for($i = $start_page; $i <= $end_page; $i++){
  $active = ($i == $page) ? 'active' : '';
  echo '<li class="'.$active.'"><a href="#" class="page-link-gerenciar" data-page="'.$i.'">'.$i.'</a></li>';
}

echo '</ul></nav>';

$conn->close();
?>
