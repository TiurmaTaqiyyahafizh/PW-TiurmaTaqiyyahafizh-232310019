<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
        .actions a { margin-right: 5px; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Daftar Pengguna</h1>

    <?php if (!empty($message)): ?>
        <div class="message <?php echo strpos($message, 'success') !== false ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <p><a href="/pembelajaran-6/public/create">Tambah Pengguna Baru</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($user['address']); ?></td>
                    <td><?php echo htmlspecialchars($user['birthdate']); ?></td>
                    <td><?php echo htmlspecialchars($user['gender']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    <td class="actions">
                        <a href="/pembelajaran-6/public/edit/<?php echo htmlspecialchars($user['id']); ?>">Edit</a> |
                        <form action="/pembelajaran-6/public/delete/<?php echo htmlspecialchars($user['id']); ?>" method="POST" style="display:inline;">
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Belum ada data pengguna.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>