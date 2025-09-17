<?php
class Test
{
    public function __construct()
    {
        //Your logic for constructor
    }

    public function __call($method_name, $parameter)
    {
        if ($method_name == "Function") {
            $count = count($parameter);
            switch ($count) {
                case "1":
                    echo "You are passing 1 argument";
                    break;
                case "2": //Incase of 2 parameter
                    echo "You are passing 2 parameter";
                    break;
                default:
                    throw new exception("Bad argument");
            }
        } else {
            throw new exception("Function $method_name does not exists");
        }
    }
}

$a = new Test();
$a->Function("ankur");
echo "<br>";
$a->Function("techflirt", "ankur");
?>