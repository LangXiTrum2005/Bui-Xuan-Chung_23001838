<?php
$name = "Bùi Xuân Chung";
$score = 9.5;

if ($score >= 8) {
    $rank = "Giỏi";
} elseif ($score >= 6.5) {
    $rank = "Khá";
} elseif ($score >= 5) {
    $rank = "Trung bình";
} else {
    $rank = "Yếu";
}

echo "Họ tên: $name<br>";
echo "Điểm: $score<br>";
echo "Xếp loại: $rank";
?>