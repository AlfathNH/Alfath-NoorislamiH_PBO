<?php

/**
 * Mendefinisikan class exception kustom untuk menangani error spesifik.
 * Method errorMessage() akan memformat pesan error yang lebih informatif.
 */
class customException extends Exception
{
    public function errorMessage()
    {
        // Membuat format pesan error yang akan ditampilkan
        $errorMsg = 'Error caught on line ' . $this->getLine() . ': <b>' . $this->getMessage() . '</b> tidak mengandung kata \'lab4/lab5\' dan tidak valid or is not a valid E-mail address';
        return $errorMsg;
    }
}

/**
 * Array data email yang akan divalidasi.
 * Berisi campuran email valid dengan keyword, email valid tanpa keyword, dan email tidak valid.
 */
$emails = [
    "lab4a@polsub.ac.id",
    "lab4b@polsub.ac.id",
    "lab4c@polsub.ac.id",
    "lab4d@polsub.ac.id",
    "lab5a@polsub.ac.id",
    "lab5b@polsub.ac.id",
    "lab5c@polsub.ac.id",
    "someone@example...com", // Email tidak valid untuk memicu exception
    "mahasiswa@kampus.ac.id" // Email valid tapi bukan 'lab4' atau 'lab5'
];

// Inisialisasi variabel untuk menampung hasil perhitungan
$lab4_emails = [];
$lab5_emails = [];
$valid_count = 0;
$invalid_count = 0;
$other_valid_count = 0;

echo "--- Memulai Pengecekan dan Validasi Email ---<br><br>";

// Melakukan perulangan untuk setiap email di dalam array
foreach ($emails as $email) {
    try {
        // 1. Validasi format email menggunakan FILTER_VALIDATE_EMAIL
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            // Jika format tidak valid, lemparkan (throw) customException
            throw new customException($email);
        }

        // Jika email valid, lanjutkan pengecekan keyword
        $valid_count++;

        // 2. Pengecekan keyword 'lab4' atau 'lab5'
        if (strpos($email, "lab4") !== false) {
            $lab4_emails[] = $email;
            echo "$email mengandung kata 'lab4' dan E-mail valid<br>";
        } elseif (strpos($email, "lab5") !== false) {
            $lab5_emails[] = $email;
            echo "$email mengandung kata 'lab5' dan E-mail valid<br>";
        } else {
            // Jika valid tapi tidak mengandung kedua keyword
            $other_valid_count++;
        }
    } catch (customException $e) {
        // 3. Tangkap (catch) error jika customException dilemparkan
        $invalid_count++;
        echo $e->errorMessage() . "<br>";
    }
}

echo "<br>--- Hasil Akhir ---<br>";

// Menampilkan hasil hitung data email
$count_lab4 = count($lab4_emails);
$count_lab5 = count($lab5_emails);
echo "Terdapat $count_lab4 email lab 4 dan $count_lab5 email lab 5<br>";
if ($other_valid_count > 0) {
    echo "Terdapat $other_valid_count email bukan lab4 5<br>";
}
echo "Total email valid: $valid_count <br>";
echo "Total email tidak valid: $invalid_count <br>";

?>
