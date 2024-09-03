<?php
include 'koneksi.php';
session_start();
$id_user = $_SESSION['id_user'];



if(isset($_POST['add'])) {
    if(isset($id_user)) {

        if(isset($_SESSION['keranjang'])) {
            
            $item_array_id = array_column($_SESSION['keranjang'], 'id');
            if(!in_array($_GET["id"], $item_array_id)) {
                $count = count($_SESSION['keranjang']);
                $item_array = array(
                'id' => $_GET['id'],
                'nama' => $_POST['nama'],
                'harga' => $_POST['harga'],
                'foto' => $_POST['foto'],
                'jumlah' => $_POST['jumlah']
            );
            
            $_SESSION['keranjang'] [$count] = $item_array;
            echo "<script>
            alert('Berhasil dimasukkan ke keranjang');
            document.location.href = 'keranjangPage.php'
            </script>";
        } else {
            echo "<script>
            alert('Sudah ada ke keranjang');
            </script>";
        }
    }else {
        $item_array = array(
        'id' => $_GET['id'],
        'nama' => $_POST['nama'],
        'harga' => $_POST['harga'],
        'foto' => $_POST['foto'],
        'jumlah' => $_POST['jumlah']
    );

    $_SESSION['keranjang'] [0] = $item_array;
    echo "<script>
    alert('Berhasil dimasukkan ke keranjang');
    document.location.href = 'keranjangPage.php'
    </script>";
}
}
}

if(isset($_GET['aksi'])) {
    if($_GET['aksi'] == 'hapus') {
        foreach($_SESSION['keranjang'] as $key => $value) {
            if($value['id'] == $_GET['id']) {
                unset($_SESSION['keranjang'] [$key]);
                echo "<script>
                alert('Produk di hapus dari keranjang');
                document.location.href = 'keranjangPage.php'
                </script>";
        }
    }
    } else if($_GET['aksi'] == 'beli') {
        $totalHarga = $_GET['total'];
        $query = mysqli_query($koneksi, "INSERT INTO transaksi (tanggal,id_pelanggan,total_harga) VALUES ('".date("Y-m-d")."','$id_user','$totalHarga')");
        $id_transaksi = mysqli_insert_id($koneksi);

        foreach($_SESSION['keranjang'] as $key => $value) {
            $id_produk = $value['id'];
            $jumlah = $value['jumlah'];
            $sql = "INSERT INTO detail (id_transaksi, id_produk, jumlah) VALUES ($id_transaksi, $id_produk, $jumlah)";
            $res = mysqli_query($koneksi,$sql);

            if($res > 0) {
                unset($_SESSION['keranjang']);
                echo "<script>
                alert('Terima kasih sudah berbelanja');
                </script>";
                echo "<script>
                window.location = 'cetak.php?id=".$id_transaksi."';
                </script>";
            }
        }

       
    }
} else {
    echo "<script>
    alert('Login dulu');
    document.location.href = 'index.php'
    </script>";
}

    ?>