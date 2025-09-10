<?php
$i = 0;
while($i < 101)
{
  echo $i;
  echo "<br/>";
  $i = $i + 10;
}

$a = 1;
while($a < 11)
{
  $b = 1;
  while($b < 11)
  {
    echo $b.".";
    $b++;
  }
  $a++;
  echo "<br/>";
}

$a = 1;
while($a < 11)
{
  if ($a == 7) {
    $a++;
    continue;
  }
  echo $a;
  $a++;
}
?>
