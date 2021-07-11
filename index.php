 <?php
// panggil koneksinya
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
  <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array </title>
</head>
<body>
   <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>TABEL BARANG (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>kode barang</th>
               <th>nama barang</th>
               <th>harga barang</th>
               <th>stok barang</th>
               <th>diskon barang</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';     
            $sql = 'SELECT  * FROM barang';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_array($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row['kode_barang'] ?></td>
               <td><?php echo $row['nama_barang'] ?></td>
               <td><?php echo $row['harga_barang'] ?></td>
               <td><?php echo $row['stok_barang'] ?></td>
               <td><?php echo $row['diskon_barang'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>TABEL CUSTOMER (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>id_customer</th>
               <th>nama</th>
               <th>alamat</th>
               <th>no_telp</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM customer';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_array($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (Menampilkan semua data transaksi dari tabel customer yang melakukan pemesanan barang)</h4>
      <table>
         <thead>
            <tr>
               <th>Id customer</th>
               <th>Nama customer </th>
               <th>Tanggal transaksi</th>
               <th>Total transaksi</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT pl.Id_customer, Nama_customer, Tanggal_transaksi, Total_transaksi
            FROM customer pl
            JOIN transaksi pn USING(Id_customer)';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_assoc($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row['Id_customer'] ?></td>
               <td><?php echo $row['Nama_customer'] ?></td>
               <td><?php echo $row['Tanggal_transaksi'] ?></td>
               <td><?php echo $row['Total_transaksi'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>left outer Join </h3>
      <h4> (Menampilkan semua data transaksi dari tabel customer beserta data transaksinya dari tabel transaksi )</h4>
      <table>
         <thead>
            <tr>
               <th>Id customer</th>
               <th>Nama customer </th>
               <th>Tanggal transaksi</th>
               <th>Total transaksi</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT pl.Id_customer, Nama_customer, Tanggal_transaksi, Total_transaksi
            FROM customer pl
            LEFT JOIN transaksi USING(Id_customer)';
            $query = mysqli_query($conn, $sql);    
            while ($row = mysqli_fetch_assoc($query))
            {
               ?>
         <tbody>
            <tr>
               <td><?php echo $row['Id_customer'] ?></td>
               <td><?php echo $row['Nama_customer'] ?></td>
               <td><?php echo $row['Tanggal_transaksi'] ?></td>
               <td><?php echo $row['Total_transaksi'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>