<?php

use App\Main;

require_once "vendor/autoload.php";
$data = $_POST['input'];

$arr = "08624524,081523445,0861232,096098,08624524,
081523445,0861232,096098,09624524,081523445,
0861232,096098,08624524,097523445,0361232,036098";
$arr1 = "08624524,081523445,0861232,096098,08624524,
081523445,0861232,088098,091624524,094523445,
0861232,096098,08624524,093523445,0901232,089098";
$main = new Main();
$main->filterTel($data);
$main->getMobifone();
$main->getViettel();
$main->getVinaphone();
//echo "<pre>";
//var_dump($main->getMobifone());

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phan loai so dien thoai</title>
</head>
<body>
<h2>Distribute Telephone</h2>
<form method="post">
    <table>
        <tr>
            <td>
                <textarea name="input" rows="4" cols="30"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <button>Filter</button>
            </td>
        </tr>
    </table>
</form>
<table>
    <tr>
        <th>Viettel</th>
        <th>Mobifone</th>
        <th>Vinaphone</th>
    </tr>
    <td>
        <?php for ($main->viettel->rewind();
                   $main->viettel->valid();
                   $main->viettel->next()): ?>

            <?php echo $main->viettel->current() . "<br>" ?>
        <?php endfor; ?>
    </td>
    <td>
        <?php for ($main->mobifone->rewind();
                   $main->mobifone->valid();
                   $main->mobifone->next()): ?>
            <?php echo $main->mobifone->current() . "<br>" ?>
        <?php endfor; ?>
    </td>
    <td>
        <?php for ($main->vinaphone->rewind();
                   $main->vinaphone->valid();
                   $main->vinaphone->next()): ?>
            <?php echo $main->vinaphone->current() . "<br>" ?>
        <?php endfor; ?>
    </td>
</table>
</body>
</html>
