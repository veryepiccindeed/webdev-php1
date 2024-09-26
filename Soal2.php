<?php

// Fungsi untuk menggabungkan dua array yang sudah diurutkan
function gabungArray(&$nums1, $m, $nums2, $n) {
    // Inisialisasi indeks untuk nums1, nums2, dan hasil akhir
    $i = $m - 1; // Indeks terakhir dari elemen valid di nums1
    $j = $n - 1; // Indeks terakhir dari elemen di nums2
    $k = $m + $n - 1; // Indeks terakhir dari hasil penggabungan

    // Perulangan untuk menggabungkan nums1 dan nums2 dari belakang
    while ($i >= 0 && $j >= 0) {
        // Jika elemen di nums1 lebih besar, masukkan ke posisi akhir
        if ($nums1[$i] > $nums2[$j]) {
            $nums1[$k] = "<span class='underline'>" . $nums1[$i] . "</span>"; // Menandai elemen dari nums1 dengan underline
            $i--; // Kurangi indeks nums1
        } else {
            // Jika elemen di nums2 lebih besar atau sama, masukkan ke posisi akhir
            $nums1[$k] = $nums2[$j]; // Masukkan elemen dari nums2
            $j--; // Kurangi indeks nums2
        }
        $k--; // Kurangi indeks hasil penggabungan
    }

    // Jika masih ada elemen yang tersisa di nums1, masukkan ke hasil akhir
    while ($i >= 0) {
        $nums1[$k] = "<span class='underline'>" . $nums1[$i] . "</span>"; // Menandai elemen dari nums1 dengan underline
        $i--; // Kurangi indeks nums1
        $k--; // Kurangi indeks hasil penggabungan
    }

    // Jika masih ada elemen yang tersisa di nums2, masukkan ke hasil akhir
    while ($j >= 0) {
        $nums1[$k] = $nums2[$j]; // Masukkan elemen dari nums2
        $j--; // Kurangi indeks nums2
        $k--; // Kurangi indeks hasil penggabungan
    }
}

// Mendapatkan input dari form dan memisahkan menjadi array
$nums1 = isset($_POST['nums1']) ? array_filter(explode(',', $_POST['nums1']), 'strlen') : []; // Memisahkan input nums1 menjadi array
$nums2 = isset($_POST['nums2']) ? array_filter(explode(',', $_POST['nums2']), 'strlen') : []; // Memisahkan input nums2 menjadi array
$m = isset($_POST['m']) ? intval($_POST['m']) : 0; // Mendapatkan jumlah elemen valid di nums1
$n = isset($_POST['n']) ? intval($_POST['n']) : 0; // Mendapatkan jumlah elemen di nums2

// Menyimpan salinan asli dari nums1 dan nums2 untuk ditampilkan nanti
$originalNums1 = array_slice($nums1, 0, $m); // Salinan asli nums1
$originalNums2 = array_slice($nums2, 0, $n); // Salinan asli nums2

// Jika tombol submit ditekan, panggil fungsi gabungArray
if (isset($_POST['submit'])) {
    gabungArray($nums1, $m, $nums2, $n); // Menggabungkan nums1 dan nums2
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Arrays</title>
    <style>
        /* Mengatur gaya untuk elemen body */
        body {
            display: flex; /* Menggunakan flexbox untuk tata letak */
            justify-content: center; /* Menyelaraskan konten secara horizontal ke tengah */
            align-items: center; /* Menyelaraskan konten secara vertikal ke tengah */
            flex-direction: column; /* Mengatur orientasi kolom untuk body */
            height: 100vh; /* Mengatur tinggi viewport */
            background-color: #f0f8ff; /* Warna latar belakang */
            font-family: Arial, sans-serif; /* Mengatur font */
        }
        /* Mengatur gaya untuk elemen container */
        .container {
            width: 50%; /* Lebar container */
        }
        /* Mengatur gaya untuk elemen form */
        form {
            background-color: #ffffff; /* Warna latar belakang form */
            padding: 20px; /* Padding di dalam form */
            border-radius: 10px; /* Sudut melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan */
            text-align: center; /* Teks rata tengah */
            margin-bottom: 20px; /* Margin bawah */
        }
        /* Mengatur gaya untuk input teks dan angka */
        input[type="text"], input[type="number"] {
            padding: 10px; /* Padding di dalam input */
            width: 80%; /* Lebar input */
            border: 2px solid #007BFF; /* Warna dan lebar border */
            border-radius: 5px; /* Sudut melengkung */
            margin-bottom: 10px; /* Margin bawah */
            font-family: Arial, sans-serif; /* Mengatur font */
        }
        /* Mengatur gaya untuk tombol submit */
        input[type="submit"] {
            background-color: #007BFF; /* Warna latar belakang tombol */
            color: white; /* Warna teks */
            padding: 10px 20px; /* Padding di dalam tombol */
            border: none; /* Menghilangkan border */
            border-radius: 5px; /* Sudut melengkung */
            cursor: pointer; /* Mengubah kursor saat hover */
            transition: background-color 0.3s; /* Transisi warna latar belakang */
            font-family: Arial, sans-serif; /* Mengatur font */
        }
        /* Mengatur gaya untuk tombol submit saat hover */
        input[type="submit"]:hover {
            background-color: #0056b3; /* Warna latar belakang saat hover */
        }
        /* Mengatur gaya untuk elemen output */
        .output {
            font-size: 18px; /* Ukuran font */
            font-family: Arial, sans-serif; /* Mengatur font */
            white-space: pre-line; /* Menjaga spasi dan baris baru */
            text-align: left; /* Teks rata kiri */
            width: 80%; /* Lebar output */
            background-color: #fff; /* Warna latar belakang */
            padding: 20px; /* Padding di dalam output */
            border-radius: 10px; /* Sudut melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan */
        }
        /* Mengatur gaya untuk elemen dengan kelas underline */
        .underline {
            text-decoration: underline; /* Garis bawah teks */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Form untuk input array dan jumlah elemen -->
        <form action="" method="post">
            <input type="text" name="nums1" placeholder="Angka di array pertama (pisahkan dengan koma)">
            <input type="number" name="m" placeholder="Jumlah elemen di array pertama">
            <input type="text" name="nums2" placeholder="Angka di array kedua (pisahkan dengan koma)">
            <input type="number" name="n" placeholder="Jumlah elemen di array kedua">
            <input type="submit" name="submit" value="Merge Arrays">
        </form>

        <!-- Menampilkan hasil penggabungan array -->
        <?php if (isset($_POST['submit'])): ?>
            <div class="output">
                <?php if (empty($originalNums1) && empty($originalNums2)): ?>
                    <p>Both arrays are empty. Please provide input.</p>
                <?php else: 
                    // Menampilkan input asli dan hasil penggabungan
                    echo "<strong>Input:</strong><br>";
                    echo "nums1 = [" . implode(", ", $originalNums1) . "], m = $m<br>";
                    echo "nums2 = [" . implode(", ", $originalNums2) . "], n = $n<br><br>";
                    
                    echo "<strong>Output:</strong><br>";
                    echo "[" . implode(", ", $nums1) . "]<br><br>";
                    
                    echo "<strong>Explanation:</strong><br>";
                    echo "The arrays we are merging are [" . implode(", ", $originalNums1) . "] and [" . implode(", ", $originalNums2) . "].<br>";
                    echo "The result of the merge is [" . implode(", ", $nums1) . "] with the <span class='underline'>underlined elements</span> coming from nums1.";
                endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
