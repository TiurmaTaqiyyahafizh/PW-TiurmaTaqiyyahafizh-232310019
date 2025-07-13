<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulir</h2>
        <p>di harapkan isi formulir</p>

        <form>
            <div class="mb-3">
                <label for="inputNama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="inputNama" aria-describedby="namaHelp" placeholder="Masukkan nama Anda">
                <div id="namaHelp" class="form-text">Kami tidak akan pernah membagikan nama Anda dengan orang lain.</div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan email Anda">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Buat kata sandi">
            </div>
            <div class="mb-3">
                <label for="inputPesan" class="form-label">Pesan</label>
                <textarea class="form-control" id="inputPesan" rows="3" placeholder="Tulis pesan Anda di sini"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="checkSayaSetuju">
                <label class="form-check-label" for="checkSayaSetuju">Saya setuju dengan syarat dan ketentuan</label>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Formulir</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>