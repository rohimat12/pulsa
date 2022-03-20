<?php 
include 'api.php';

$api = new API();

$data = $api->getSaldo("deposit", "depo");

echo $data;

// $harga = $api->list_harga("prepaid", "pricelist");
$transaksi = $api->transaksi("ref-id", "xld10", "087800001230", "test1", true);

echo $transaksi;