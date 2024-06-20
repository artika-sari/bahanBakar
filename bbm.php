<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
</head>
<body>
    <form action="" method="post" align="center">
        <h1>BAHAN BAKAR</h1>
        <label for="liter">Masukkan Jumlah Liter pembelian : </label>
        <input type="number" name="liter" id="liter"> 
        <br>
            <label for="jenisbbm">Pilih Bahan Bakar</label>
            <select name="jenisbbm">
                <option value="v-super">Shell Super</option>
                <option value="v-power">Shell V-Power</option>
                <option value="diesel">Shell V-Power Diesel</option>
                <option value="v-nitro">Shell V-Power Nitro</option>
            </select>
        <br>
        <button type="submit" name="beli">Beli</button>
    </form>  
</body>
</html>

<?php
class shell {
    protected $ppn = 0.1;
    protected $super = 15420;
    protected $power = 16130;
    protected $powerDiesel = 18310;
    protected $PowerNitro = 16510;
}
class beli extends shell{
    public function setbukti($harga, $liter) {
        $hasil = $harga * $liter + ($harga * $liter * $this -> ppn);
        echo "Anda membeli bahan bakar minyak jenis <b>" . $_POST["jenisbbm"] . "<br></b>";
        echo "Dengan jumlah:  <b>" . $_POST["liter"] . "<br></b>";
        echo"Total yang harus dibayar <b>Rp." . number_format($hasil, 2, ",", ".") . "</b>";
    }

    public function getbukti (){
            if (isset($_POST["beli"])) {
                $liter = $_POST["liter"];
                $jenis = $_POST["jenisbbm"];

                if (!is_numeric($liter)||(empty($jenis))) {
                    echo "isi lengkap!";
                }
                else {
                    $total = new beli();

                    if ($jenis == "v-super"){
                        $harga = $total -> super;
                    } elseif ($jenis == "v-power"){
                        $harga = $total -> power;
                    } elseif ($jenis == "diesel"){
                        $harga = $total -> powerDiesel;
                    } elseif ($jenis == "v-nitro"){
                        $harga = $total -> powerNitro;
                    } else {
                        $harga = 0;
                    } $total -> setbukti ($harga, $liter);
            }
        }
    }
}
$hitung = new beli();
echo $hitung -> getbukti ();
?>