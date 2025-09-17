<?php
class testParent
{
    public function f1()
    {
        echo 1;
    }
    
    // Tambahkan parameter di sini juga
    public function f2($a)
    {
        // Anda bisa memberikan implementasi default jika perlu
        echo "Ini dari parent: " . $a;
    }
}

class testChild extends testParent 
{
    function f2($a)
    {
        echo $a;
    }
}

$a = new testChild();
$a->f2('ankur'); // Sekarang valid dan akan mencetak 'ankur'
?>