<!DOCTYPE html>
<head>
    <title>LIVE UPDATE CORONA</title>
    <link rel="shortcut icon" href="/img/virus.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="refresh" content="60">
    <?php include 'data.php';?>
</head>
<body>
    <center><h1>PANTAU CORONA BERSAMA SAMA</h1></center>
</div>
<center><?php
if(isset($_GET["negara"])){
$negara = $_GET["negara"];
ambil($negara);
}else{
    $negara = 'indonesia';
    ambil($negara);
}
?></center>
</body>

</html>