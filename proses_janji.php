<?php
function simpanDataKeFile() {
    // Memeriksa apakah request merupakan POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form dan menghindari XSS dengan htmlspecialchars
        $nama = htmlspecialchars($_POST['nama']);
        $telpon = htmlspecialchars($_POST['nomor']);
        $hari = htmlspecialchars($_POST['tanggal']);
        
        // Membuat string data yang akan disimpan ke dalam file
        $data = "Nama: $nama\nNo Telpon: $telpon\nTanggal: $hari\n\n";
        
        // Nama file yang akan disimpan datanya
        $file = 'data.txt';
        
        // Menyimpan data ke dalam file dengan fungsi file_put_contents()
        // Fungsi ini akan menulis data ke file (menggunakan mode append dengan FILE_APPEND)
        // dan akan mengembalikan jumlah byte yang ditulis atau false jika gagal
        if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
            // Menampilkan pesan bahwa data telah disimpan
            echo "<p>Data telah disimpan ke dalam <strong>$file</strong>.</p>";
            echo "<p>Nama: $nama</p>";
            echo "<p>Nomor Telpon: $telpon</p>";
            echo "<p>Tanggal: $hari</p>";
        } else {
            // Menampilkan pesan jika gagal menyimpan data
            echo "<p>Gagal menyimpan data ke dalam file <strong>$file</strong>.</p>";
        }
    } else {
        // Menampilkan pesan jika form belum di-submit dengan benar
        echo "<p>Form belum di-submit dengan benar.</p>";
    }
}

// Panggil fungsi untuk memproses data
simpanDataKeFile();
?>
