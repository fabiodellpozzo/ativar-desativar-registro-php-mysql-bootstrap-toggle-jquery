<?php
$conn = new mysqli("localhost", "root", "", "registrodb");

$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Total de registros ativos
$total_result = $conn->query("SELECT COUNT(*) AS total FROM registros WHERE status = 'Ativo'");
$total_row = $total_result->fetch_assoc();
$total_pages = ceil($total_row['total'] / $limit);

// Registros ativos paginados
$result = $conn->query("SELECT * FROM registros WHERE status = 'Ativo' ORDER BY id DESC LIMIT $start, $limit");

echo '<ul class="list-group">';
while($row = $result->fetch_assoc()){
  echo '<li class="list-group-item">
    <strong>'.$row["titulo"].'</strong><br>
    <small>'.$row["conteudo"].'</small>
  </li>';
}
echo '</ul>';

// Paginação inteligente: máximo 3 links
echo '<nav><ul class="pagination">';

$start_page = max(1, $page - 1);
$end_page = min($total_pages, $start_page + 2);

for($i = $start_page; $i <= $end_page; $i++){
  $active = ($i == $page) ? 'active' : '';
  echo '<li class="'.$active.'"><a href="#" class="page-link-ativos" data-page="'.$i.'">'.$i.'</a></li>';
}

echo '</ul></nav>';


$conn->close();
?>
