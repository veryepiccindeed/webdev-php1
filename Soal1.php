<?php
// Menetapkan nilai maksimum dan minimum untuk jumlah angka
$max = 50;
$min = 1;
// Memeriksa apakah tombol submit telah ditekan
if (isset($_POST['submit'])) {
    // Memeriksa apakah jumlah angka telah dimasukkan
    if (isset($_POST['totalAngka'])) {
        // Menyimpan jumlah angka yang dimasukkan
        $angka = $_POST['totalAngka'];
        // Memastikan jumlah angka tidak kurang dari nilai minimum
        if ($angka < $min) $angka = $min;
        // Memastikan jumlah angka tidak lebih dari nilai maksimum
        if ($angka > $max) $angka = $max;
    }
}

// Fungsi untuk membuat pola palindrome
function palindrome($reps)
{
    // Mencetak output dalam sebuah div dengan kelas "output"
    echo '<div class="output">';
    // Inisialisasi variabel hasil
    $result = "";
    // Perulangan untuk membuat pola palindrome sebanyak $reps
    for ($k = 1; $k <= $reps; $k++) {
        // Jika $k lebih dari 1, maka hasil direset dan baris baru ditambahkan
        if ($k > 1) {
            $result = "";
            echo "<br>"; // Baris baru setelah setiap baris output kecuali baris pertama
        }
        // Menambahkan angka dari 1 hingga $k
        for ($i = 1; $i <= $k; $i++) {
            $result .= $i; // Angka maju
        }
        // Menambahkan angka dari $k-1 hingga 1
        for ($j = $k - 1; $j >= 1; $j--) {
            $result .= $j; // Angka mundur
        }
        // Mencetak hasil
        echo $result;
    }
    // Menutup div "output"
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Mengatur orientasi kolom untuk body */
            height: 100vh;
            background-color: #f0f8ff; /* Warna latar belakang */
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #ffffff; /* Warna latar belakang form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan pada form */
            text-align: center; /* Mengatur teks di tengah */
            margin-bottom: 20px; /* Jarak bawah untuk form */
        }

        input[type="number"] {
            padding: 10px;
            width: 80%; /* Lebar input */
            border: 2px solid #007BFF; /* Warna batas */
            border-radius: 5px;
            margin-bottom: 10px; /* Jarak bawah */
        }

        input[type="submit"] {
            background-color: #007BFF; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer; /* Kursor menjadi pointer saat hover */
            transition: background-color 0.3s; /* Transisi warna */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Warna saat hover */
        }

        .output {
            font-size: 18px; /* Ukuran font */
            white-space: pre-wrap; /* Mempertahankan spasi dan baris baru */
            text-align: center; /* Mengatur teks ke tengah */
            width: 80%; /* Lebar output */
            margin-top: 20px; /* Jarak atas untuk output */
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <input type="number" name="totalAngka" placeholder="Masukkan Jumlah Baris (<?= $min . ' - ' . $max; ?>)" required>
        <input type="submit" name="submit" value="Buat Palindrome">
    </form>

    <?php if (isset($angka)):
        // Memanggil fungsi palindrome dengan parameter jumlah angka
        palindrome($angka);
    endif; ?>
</body>

</html>
