<?php
// include_once("models/Dummy.model.php");
include_once("models/Model.model.php");
class ApiController extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    // public function getallproduct(){
    //     header("Access-Control-Allow-Origin: *");
    //     header("Content-Type: application/json; charset=UTF-8");
    //     return json_encode($this->publicproducts(),JSON_PRETTY_PRINT);
    // }
    public function getallproduct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        $hasil = json_encode($this->getAll("barang"), JSON_PRETTY_PRINT);
        file_put_contents("hitam.json", $hasil);
        $file = "hitam.json";
        $barang = file_get_contents($file);
        $data = json_decode($barang, True);
        $data[] = array(
            "kd_brg" => "BRG007",
            "nama_brg" => "Mouse Wireless Rexus",
            "harga_brg" => "1725000",
            "stok_brg" => "10"
        );
        foreach ($data as $key => $v) {
            if ($v['kd_brg'] == 'BRG001') {
                array_splice($data, $key, 1);
            }
        }
        $json_file = json_encode($data, JSON_PRETTY_PRINT);
        $barang = file_put_contents($file, $json_file);

        return $json_file;
    }
}
