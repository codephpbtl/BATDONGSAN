<?php
function generatePagination($currentPage, $totalPages) {
    echo "<ul class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i == $currentPage) ? 'active' : '';
        echo "<li class='page-item $activeClass'><a class='page-link' href='?page=$i'>$i</a></li>";
    }
    echo "</ul>";
}
?>
