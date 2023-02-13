<?php

$scores = array(100, 80, 80, 70, 60, 70, 100); // Skor pemain yang dimasukkan

// Membuat fungsi untuk menentukan peringkat
function getRankings($scores) {
  $ranks = array();
  $scoresWithRank = array();
  
  // Mengurutkan skor dari yang tertinggi ke terendah
  rsort($scores);
  
  // Menentukan peringkat setiap skor
  $rank = 1;
  $currentScore = $scores[0];
  $scoresWithRank[$currentScore] = $rank;
  for ($i = 1; $i < count($scores); $i++) {
    if ($scores[$i] < $currentScore) {
      $rank++;
      $currentScore = $scores[$i];
    }
    $scoresWithRank[$scores[$i]] = $rank;
  }
  
  // Menentukan peringkat GITS
  foreach ($scores as $score) {
    $ranks[] = $scoresWithRank[$score];
  }
  
  return $ranks;
}

// Menampilkan peringkat GITS
$ranks = getRankings($scores);
echo "Peringkat GITS: " . implode(", ", $ranks);

?>
