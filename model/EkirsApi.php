<?php    
include_once ("EkirsController.php");
$controller=new Controller();
$a = "";
if (isset($_POST["a"])) {
    $a = $_POST["a"];
}
if (isset($_GET["a"])) {
    $a = $_GET["a"];
}

$b = "";
if (isset($_POST["b"])) {
    $b = $_POST["b"];
}
if (isset($_GET["b"])) {
    $b = $_GET["b"];
}
if (isset($_FILES['b']['name'])) {
    $b = $_FILES['b'];
}

$c = "";
if (isset($_POST["c"])) {
    $c = $_POST["c"];
}
if (isset($_GET["c"])) {
    $c = $_GET["c"];
}


$d = "";
if (isset($_POST["d"])) {
    $d = $_POST["d"];
}
if (isset($_GET["d"])) {
    $d = $_GET["d"];
}

$e = "";
if (isset($_POST["e"])) {
    $e = $_POST["e"];
}
if (isset($_GET["e"])) {
    $e = $_GET["e"];
}

$f = "";
if (isset($_POST["f"])) {
    $f = $_POST["f"];
}
if (isset($_GET["f"])) {
    $f = $_GET["f"];
}

$g = "";
if (isset($_POST["g"])) {
    $g = $_POST["g"];
}
if (isset($_GET["g"])) {
    $g = $_GET["g"];
}

$h = "";
if (isset($_POST["h"])) {
    $h = $_POST["h"];
}
if (isset($_GET["h"])) {
    $h = $_GET["h"];
}

$i = "";
if (isset($_POST["i"])) {
    $i = $_POST["i"];
}
if (isset($_GET["i"])) {
    $i = $_GET["i"];
}


$j = "";
if (isset($_POST["j"])) {
    $j = $_POST["j"];
}
if (isset($_GET["j"])) {
    $j = $_GET["j"];
}


$k = "";
if (isset($_POST["k"])) {
    $k = $_POST["k"];
}
if (isset($_GET["k"])) {
    $k = $_GET["k"];
}


$l = "";
if (isset($_POST["l"])) {
    $l = $_POST["l"];
}
if (isset($_GET["l"])) {
    $l = $_GET["l"];
}

$m = "";
if (isset($_POST["m"])) {
    $m = $_POST["m"];
}
if (isset($_GET["m"])) {
    $m = $_GET["m"];
}

$n = "";
if (isset($_POST["n"])) {
    $n = $_POST["n"];
}
if (isset($_GET["n"])) {
    $n = $_GET["n"];
}

$n = "";
if (isset($_POST["n"])) {
    $n = $_POST["n"];
}
if (isset($_GET["n"])) {
    $n = $_GET["n"];
}

$o = "";
if (isset($_POST["o"])) {
    $o = $_POST["o"];
}
if (isset($_GET["o"])) {
    $o = $_GET["o"];
}

$p = "";
if (isset($_POST["p"])) {
    $p = $_POST["p"];
}
if (isset($_GET["p"])) {
    $p = $_GET["p"];
}

$q = "";
if (isset($_POST["q"])) {
    $q = $_POST["q"];
}
if (isset($_GET["q"])) {
    $q = $_GET["q"];
}

$r = "";
if (isset($_POST["r"])) {
    $r = $_POST["r"];
}
if (isset($_GET["r"])) {
    $r = $_GET["r"];
}

$s = "";
if (isset($_POST["s"])) {
    $s = $_POST["s"];
}
if (isset($_GET["s"])) {
    $s = $_GET["s"];
}

$z = "";
if (isset($_POST["z"])) {
    $z = $_POST["z"];
}
if (isset($_GET["z"])) {
    $z = $_GET["z"];
}
/////////
$draw = "";
if (isset($_GET["draw"])) {
    $draw = $_GET["draw"];
}
$start = "";
if (isset($_GET["start"])) {
    $start = $_GET["start"];
}
$length = "";
if (isset($_GET["length"])) {
    $length = $_GET["length"];
}

$runData = new stdClass();
$runData->a = $a;
$runData->b = $b;
$runData->c = $c;
$runData->d = $d;
$runData->e = $e;
$runData->f = $f;
$runData->g = $g;
$runData->h = $h;
$runData->i = $i;
$runData->j = $j;
$runData->k = $k;
$runData->l = $l;
$runData->m = $m;
$runData->n = $n;
$runData->o = $o;
$runData->p = $p;
$runData->q = $q;
$runData->r = $r;
$runData->s = $s;
$runData->z = $z;

$response = $controller -> runApp($runData);
echo json_encode($response);         
            
?>