<?php 

// SELECT
function tampil($sql){
   global $conn;
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
         $rows[] = $row;
      }
      return $rows;
   }
}


// INSERT
function tambah($produk){
   global $conn;
   
   $kode = htmlspecialchars($produk["kode"]);
   $nama = htmlspecialchars($produk["nama"]);
   $harga = htmlspecialchars($produk["harga"]);

   $sql = "INSERT INTO produk (kode, nama, harga)
   VALUES ('$kode', '$nama', '$harga')";
   
   mysqli_query($conn, $sql);

   return mysqli_affected_rows($conn);
}


// UPDATE
function ubah($produk){
   global $conn;
   global $kodeOld;
   
   $kode = htmlspecialchars($produk["kode"]);
   $nama = htmlspecialchars($produk["nama"]);
   $harga = htmlspecialchars($produk["harga"]);

   $sql = "UPDATE produk SET
               kode='$kode',
               nama='$nama',
               harga='$harga'
            WHERE kode='$kodeOld'";
   
   mysqli_query($conn, $sql);

   return mysqli_affected_rows($conn);
}


// DELETE (hapus data)
function hapus($kode){
    global $conn;

    mysqli_query($conn, "DELETE FROM produk WHERE kode='$kode'");
    
    return mysqli_affected_rows($conn);
}
?>