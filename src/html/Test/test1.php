<?php
$page = $_GET["page"];
$totalpages = 41;
$x = ($page / 2) - 0.5;
$i = 0;
echo "<div class='linesL'>";
for ($i = 1; $i <= $x; $i++) {
    echo "<img src='/src/img/line.png' class='".$i."'>";
    sleep(0.1);
}
echo "</div>";

$x =  ($totalpages - ($page)) / 2;
echo $x;
$i = 0;
echo "<div class='linesR'>";
for ($i = 1; $i <= $x; $i++) {
    echo "<img src='/src/img/line.png' class='".$i."'>";
    sleep(0.1);
}
echo "</div>";