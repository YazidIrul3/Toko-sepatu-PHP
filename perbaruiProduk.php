<?php 
include '../perbaruiData.php';
include '../tampilkanData.php';

$id_sepatu = (int)$_GET['id_sepatu'];

$data_sepatu = tampilkan("SELECT * FROM product WHERE id=$id_sepatu");
// $data_news['items'];
session_start();
if(!isset($_SESSION['role']) == 'admin') {
    echo "<script>
    document.location.href = '../login.php'
    </script>";
}
if(isset($_POST['perbarui'])) { 
    if(perbarui_sepatu($_POST, $id_sepatu) > 0 ) {
        echo "<script>
        alert('Data updated success');
        document.location.href = 'produk.php';
        </script>";
    } else {
        echo "<script>
        alert('Data updated failed');
        document.location.href = 'produk.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Data</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div class="flex flex-col justify-center items-center gap-5 h-screen">
        <form method="POST" enctype="multipart/form-data" class="bg-slate-50 shadow-slate-900 w-3/6 shadow-sm p-2 flex flex-col gap-3" >
            <div class="flex flex-col justify-center gap-2 w-full">
            <label class="font-bold">Nama</label>
            <input require
                class=" bg-slate-50 p-2 text-slate-900"
                type="text"
                name="nama"
                placeholder="nama"
                value="<?php foreach($data_sepatu['items'] as $data) echo $data['nama'] ?>"
                />
            </div>
            
            <div class="flex flex-col justify-center gap-2 w-full">
                <label class="font-bold">Brand</label>
                <select name="brand" id="" value="<?php foreach($data_sepatu['items'] as $data) echo $data['brand'] ?>">
                    <option>Adidas</option>
                    <option>Nike</option>
                    <option>Puma</option>
                    <option>Specs</option>
                    <option>New Balance</option>
                    <option>Ortuseight</option>
                    <option>Ardiles</option>
                </select>
            </div>
            
            <div class="flex flex-col justify-center gap-2 w-full">
                <label class="font-bold">Jenis</label>
                <select name="jenis" id="" value="<?php foreach($data_sepatu['items'] as $data) echo $data['jenis'] ?>">
                    <option>Sneakers</option>
                    <option>Futsal</option>
                    <option>Sepak bola</option>
                    <option>Basket</option>
                    <option>Running</option>
                </select>
            </div>
            
            <div class="flex flex-col justify-center gap-2 w-full">
                <label class="font-bold">Deskripsi</label>
                    <textarea
                     class=" bg-slate-50 p-2 text-slate-900" 
                     name="deskripsi" 
                     id=""><?php foreach($data_sepatu['items'] as $data) echo $data['deskripsi'] ?></textarea>
                    </div>
                    
                    <div class="flex flex-col justify-center gap-2 w-full">
                        <label class="font-bold">Foto</label>
                        <input require type="hidden" name="foto" value="<?php foreach($data_sepatu['items'] as $data) echo $data['foto'] ?>">
                    </div>
                    
                    <div class="flex flex-col justify-center gap-2 w-full">
                        <label class="font-bold">Harga</label>
                        <input require type="number" value="<?php foreach($data_sepatu['items'] as $data) echo $data['harga'] ?>" class=" bg-slate-50 p-2 text-slate-900" name="harga" placeholder="harga">
                </div>
                
                <div class="flex flex-col justify-center gap-2 w-full">
                    <label class="font-bold">Stock</label>
                    <input require value="<?php foreach($data_sepatu['items'] as $data) echo $data['stock'] ?>" type="number" class=" bg-slate-50 p-2 text-slate-900" name="stock" placeholder="stock">
                </div>
                
                <button type="submit" name="perbarui" class="bg-yellow-500 text-slate-50 font-bold py-2 hover:bg-yellow-600">
                    Perbarui
                </button>
            </form>
        </div>

        <footer>
        <div class="text-center p-3 bg-slate-900 text-slate-50">
            © <?php echo date('Y'); ?> Copyright By
            <a class="text-slate-50" href="">Yazid Khairul</a>
        </div>
    </footer>
</body>
</html>