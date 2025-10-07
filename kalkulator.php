<?php
$hasil = '';
// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hitung'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];

    // Validasi input harus berupa angka
    if (is_numeric($angka1) && is_numeric($angka2)) {
        switch ($operator) {
            case '+':
                $hasil = $angka1 + $angka2;
                break;
            case '-':
                $hasil = $angka1 - $angka2;
                break;
            case '*':
                $hasil = $angka1 * $angka2;
                break;
            case '/':
                // Mencegah pembagian dengan nol
                if ($angka2 != 0) {
                    $hasil = $angka1 / $angka2;
                } else {
                    $hasil = "Error: Tidak bisa dibagi dengan nol!";
                }
                break;
        }
    } else {
        $hasil = "Error: Input harus berupa angka!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Standar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div id="background-overlay"></div>
    
    <div class="container">
        <button id="theme-toggle" class="theme-toggle"><i class="fas fa-moon"></i></button>
        <a href="index.php" class="back-link">&larr; Kembali ke Menu</a>
        
        <div class="calculator-card">
            <h1>Kalkulator Standar</h1>
            <form action="kalkulator.php" method="post">
                <div class="form-group">
                    <label for="angka1">Angka Pertama</label>
                    <input type="number" step="any" name="angka1" id="angka1" required value="<?= isset($_POST['angka1']) ? htmlspecialchars($_POST['angka1']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="operator">Operator</label>
                    <select name="operator" id="operator">
                        <option value="+" <?= (isset($_POST['operator']) && $_POST['operator'] == '+') ? 'selected' : '' ?>>+</option>
                        <option value="-" <?= (isset($_POST['operator']) && $_POST['operator'] == '-') ? 'selected' : '' ?>>-</option>
                        <option value="*" <?= (isset($_POST['operator']) && $_POST['operator'] == '*') ? 'selected' : '' ?>>*</option>
                        <option value="/" <?= (isset($_POST['operator']) && $_POST['operator'] == '/') ? 'selected' : '' ?>>/</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="angka2">Angka Kedua</label>
                    <input type="number" step="any" name="angka2" id="angka2" required value="<?= isset($_POST['angka2']) ? htmlspecialchars($_POST['angka2']) : '' ?>">
                </div>
                <button type="submit" name="hitung">Hitung</button>
            </form>

            <?php if ($hasil !== ''): ?>
                <div class="result">
                    Hasil: <?php echo htmlspecialchars($hasil); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>