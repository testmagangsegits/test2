<?php

function calculateRanking($scores, $player_scores) {
    // Menggabungkan array $scores dan $player_scores
    $all_scores = array_merge($scores, $player_scores);
    // Menyortir array $all_scores dari nilai terbesar ke nilai terkecil
    rsort($all_scores);
    // Menghapus duplikasi nilai dalam array $all_scores
    $unique_scores = array_unique($all_scores);
    // Membuat array $ranks untuk menyimpan peringkat setiap pemain
    $ranks = array();
    // Loop untuk setiap nilai yang unik
    foreach ($unique_scores as $score) {
        // Mencari jumlah pemain dengan nilai tertentu
        $count = count(array_keys($all_scores, $score));
        // Menambahkan peringkat pemain ke dalam array $ranks
        for ($i = 0; $i < $count; $i++) {
            $ranks[] = array_search($score, $unique_scores) + 1;
        }
    }
    // Mencari peringkat GITS
    $player_ranks = array();
    foreach ($player_scores as $player_score) {
        $player_ranks[] = array_search($player_score, array_reverse($unique_scores)) + 1;
    }
    // Mengembalikan peringkat GITS
    return array_reverse($player_ranks);
}

// Contoh input
$n = 7;
$scores = array(100, 100, 50, 40, 40, 20, 10);
$m = 4;
$player_scores = array(5, 25, 50, 120);

// Menghitung peringkat pemain
$ranking = calculateRanking($scores, $player_scores);

// Menampilkan hasil
foreach ($ranking as $rank) {
    echo $rank . ' ';
}

?>