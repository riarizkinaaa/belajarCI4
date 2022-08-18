<?php 
$konek = mysqli_connect("localhost","root","","mahasiswa1"); 
$result = mysqli_query($konek,"SELECT * FROM mahasiswa"); 
?>


<html>
    <head>
        <title>Data-Data Pengguna Motor</title>
    </head>
    <body>
            <a href="tambahdata.php" style="text-decoration: none; color: black;">
                tambahkan mahasiswa baru
            </a>
        </div>
        <table  border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NRP</th>
                    <th>email</th>
                    <th>jurusan</th>
                    <th>aksi</th>
                </tr>
           
                <?php
                while($motor = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$motor['nama']."</td>";
                    echo "<td>".$motor['NRP']."</td>";
                    echo "<td>".$motor['email']."</td>";
                    echo "<td>".$motor['jurusan']."</td>";
                    echo "<td>
                    
                    <a href='edit.php?id=$motor[id]'>Edit</a> | 
                    <a href='delete.php?id=$motor[id]'>Delete</a>
                    </td>";
                    echo "</tr>";
                   
                }
                ?>

        </table>
    </body>
</html>