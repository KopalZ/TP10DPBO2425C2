<!DOCTYPE html>
<html>
<head>
    <title>Arcane Chronicles Dashboard</title>
    <link rel="stylesheet" href="style.css"> <style>
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 30px; }
        .card { background: #0f3460; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #6c5ce7; }
        .card h3 { margin: 10px 0; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔮 Arcane Chronicles</h1>
        <h3 style="color: #ccc; font-weight: normal;">Game Database Management System</h3>
        
        <div class="menu-grid">
            <div class="card">
                <h3>🏰 GUILDS</h3>
                <p>Kelola Data Guild</p>
                <a href="views/guild_list.php" class="btn">Masuk</a>
            </div>
            <div class="card">
                <h3>🧙‍♂️ WIZARDS</h3>
                <p>Kelola Karakter</p>
                <a href="views/wizard_list.php" class="btn">Masuk</a>
            </div>
            <div class="card">
                <h3>📖 GRIMOIRES</h3>
                <p>Kelola Senjata/Buku</p>
                <a href="views/grimoire_list.php" class="btn">Masuk</a>
            </div>
            <div class="card">
                <h3>🧪 POTIONS</h3>
                <p>Kelola Item</p>
                <a href="views/potion_list.php" class="btn">Masuk</a>
            </div>
        </div>
    </div>
</body>
</html>