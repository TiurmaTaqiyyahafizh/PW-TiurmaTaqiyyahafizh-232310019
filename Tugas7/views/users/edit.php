<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        form div { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="date"], textarea, select {
            width: 300px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
    </style>
</head>
<body>
    <h1>Edit Pengguna</h1>

    <?php if (!empty($message)): ?>
        <div class="message <?php echo strpos($message, 'success') !== false ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <?php if ($user): ?>
    <form action="/pembelajaran-6/public/update/<?php echo htmlspecialchars($user['id']); ?>" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required maxlength="20">
        </div>
        <div>
            <label for="fullname">Fullname:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required maxlength="100">
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="5" required><?php echo htmlspecialchars($user['address']); ?></textarea>
        </div>
        <div>
            <label for="birthdate">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($user['birthdate']); ?>" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Pilih Gender</option>
                <option value="M" <?php echo ($user['gender'] === 'M') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="F" <?php echo ($user['gender'] === 'F') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" maxlength="14">
        </div>
        <div>
            <button type="submit">Update Pengguna</button>
        </div>
    </form>
    <?php else: ?>
        <p>Pengguna tidak ditemukan.</p>
    <?php endif; ?>
    <p><a href="/pembelajaran-6/public/">Kembali ke Daftar Pengguna</a></p>
</body>
</html>