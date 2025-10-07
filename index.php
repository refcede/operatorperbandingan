<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Kalkulator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* CSS Variables untuk Tema */
        :root {
            --bg-color: #f0f4f8;
            --card-bg-color: #ffffff;
            --text-color: #333333;
            --title-color: #0056b3;
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            --icon-color: #007bff;
            --math-icon-bg-color: rgba(0, 86, 179, 0.15);
        }

        /* Reset dan Pengaturan Dasar */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Poppins', sans-serif; /* <-- FONT BARU DITERAPKAN DI SINI */
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
            position: relative;
        }

        .container {
            text-align: center;
            z-index: 10;
            position: relative;
        }

        /* --- ANIMASI KONTEN BARU --- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-title {
            font-size: 2.5em;
            color: var(--title-color);
            margin-bottom: 40px;
            font-weight: 600;
            /* Animasi untuk judul */
            opacity: 0; /* Mulai dari transparan */
            animation: fadeInUp 0.8s ease forwards;
            animation-delay: 0.2s;
        }

        .card-container {
            display: flex;
            gap: 30px;
            justify-content: center;
        }

        .card {
            background-color: var(--card-bg-color);
            border-radius: 15px;
            padding: 30px 40px;
            box-shadow: var(--card-shadow);
            width: 180px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Animasi untuk kartu */
            opacity: 0; /* Mulai dari transparan */
            animation: fadeInUp 0.8s ease forwards;
        }

        /* Delay animasi untuk setiap kartu agar muncul berurutan */
        .card:nth-child(1) { animation-delay: 0.4s; }
        .card:nth-child(2) { animation-delay: 0.6s; }
        .card:nth-child(3) { animation-delay: 0.8s; }
        /* --------------------------- */

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        body.dark-mode .card:hover {
             box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .card-icon {
            font-size: 3.5em;
            color: var(--icon-color);
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.1em;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .theme-switcher {
            /* ... CSS tidak berubah ... */
            position: absolute; top: 20px; right: 20px; width: 50px; height: 26px;
            background-color: #ccc; border-radius: 13px; cursor: pointer;
            transition: background-color 0.3s; z-index: 20;
        }
        .theme-switcher .slider {
            position: absolute; top: 3px; left: 3px; width: 20px; height: 20px;
            background-color: white; border-radius: 50%; transition: transform 0.3s;
        }
        body.dark-mode .theme-switcher { background-color: #444; }
        body.dark-mode .theme-switcher .slider { transform: translateX(24px); }

        /* Animasi Background Ikon Matematika (tidak berubah) */
        .animated-background {
            position: absolute; width: 100%; height: 100%;
            top: 0; left: 0; overflow: hidden; z-index: 1;
        }
        .animated-background .math-icon-bg {
            position: absolute; display: flex; justify-content: center; align-items: center;
            width: 60px; height: 60px; background: none; animation: animate 25s linear infinite;
            bottom: -150px; color: var(--math-icon-bg-color); font-size: 2em; opacity: 0.9;
        }
        .animated-background .math-icon-bg:nth-child(1) { left: 10%; font-size: 4em; animation-delay: 0s; animation-duration: 22s; }
        .animated-background .math-icon-bg:nth-child(2) { left: 25%; font-size: 2em; animation-delay: 2s; animation-duration: 15s; }
        .animated-background .math-icon-bg:nth-child(3) { left: 70%; font-size: 3em; animation-delay: 4s; animation-duration: 18s; }
        .animated-background .math-icon-bg:nth-child(4) { left: 40%; font-size: 2.5em; animation-delay: 0s; animation-duration: 16s; }
        .animated-background .math-icon-bg:nth-child(5) { left: 60%; font-size: 1.8em; animation-delay: 0s; animation-duration: 11s; }
        .animated-background .math-icon-bg:nth-child(6) { left: 85%; font-size: 4.5em; animation-delay: 3s; animation-duration: 28s; }
        
        @keyframes animate {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-120vh) rotate(360deg); opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="animated-background">
        <span class="math-icon-bg"><i class="fas fa-plus"></i></span>
        <span class="math-icon-bg"><i class="fas fa-minus"></i></span>
        <span class="math-icon-bg"><i class="fas fa-times"></i></span>
        <span class="math-icon-bg"><i class="fas fa-divide"></i></span>
        <span class="math-icon-bg"><i class="fas fa-equals"></i></span>
        <span class="math-icon-bg"><i class="fas fa-percent"></i></span>
    </div>

    <div class="container">
        <h1 class="main-title">Pusat Kalkulator</h1>
        <div class="card-container">
            <div class="card" onclick="location.href='kalkulator.php'">
                <div class="card-icon"><i class="fas fa-calculator"></i></div>
                <div class="card-title">Kalkulator Standar</div>
            </div>
            <div class="card" onclick="location.href='kalkulator_ipk.php'">
                <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="card-title">Kalkulator IPK</div>
            </div>
            <div class="card" onclick="location.href='kalkulator_perbandingan.php'">
                <div class="card-icon"><i class="fas fa-balance-scale"></i></div>
                <div class="card-title">Kalkulator Perbandingan</div>
            </div>
        </div>
    </div>

    <script>
        // ... JavaScript tidak berubah ...
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        const applyTheme = (theme) => {
            if (theme === 'dark') { body.classList.add('dark-mode'); } 
            else { body.classList.remove('dark-mode'); }
        };
        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);
        themeToggle.addEventListener('click', () => {
            const isDarkMode = body.classList.contains('dark-mode');
            if (isDarkMode) {
                applyTheme('light');
                localStorage.setItem('theme', 'light');
            } else {
                applyTheme('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>

</body>
</html>