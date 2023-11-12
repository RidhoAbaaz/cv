<?php
include 'connect.php';

function getCVData()
{
    global $connection;
    $query = "SELECT * FROM cv_data WHERE id = 1"; // Sesuaikan dengan id CV 
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_array($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['Nama']);
    $alamat = htmlspecialchars($_POST['Alamat']);
    $telepon = htmlspecialchars($_POST['Telepon']);
    $email = htmlspecialchars($_POST['Email']);
    $web = htmlspecialchars($_POST['Web']);
    $pendidikan = htmlspecialchars($_POST['Pendidikan']);
    $pengalaman_kerja = htmlspecialchars($_POST['Pengalaman_kerja']);
    $keterampilan = htmlspecialchars($_POST['Keterampilan']);
    $foto_path = htmlspecialchars($_POST['Foto_path']);

    $query = "UPDATE cv_data SET 
        Nama = ?, 
        Alamat = ?, 
        Telepon = ?, 
        Email = ?, 
        Web = ?, 
        Pendidikan = ?, 
        Pengalaman_kerja = ?, 
        Keterampilan = ?, 
        Foto_path = ? 
        WHERE id = 1"; // Sesuaikan dengan id CV 

    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $nama, $alamat, $telepon, $email, $web, $pendidikan, $pengalaman_kerja, $keterampilan, $foto_path);

    if (mysqli_stmt_execute($stmt)) {
        echo 'Data berhasil diperbarui';
        print 'Data berhasil diperbarui';
    } else {
        echo 'Terjadi kesalahan saat memperbarui data';
        print 'Data gagal diperbarui';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    header('Location: update.php');
    exit();
}

$data = getCVData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <title>Update CV</title>
</head>

<body class="p-3">
    <!-- <div class="container mt-5"> -->
    <nav class="navbar sticky-top bg-body-tertiary biru">
        <div class="container-fluid">
            <h1>Update CV</h1>
            <a class="navbar-brand" href="/cv">View</a>
        </div>
    </nav>
    <div class="card">
        <div class="p-3">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" id="nama" type="text" name="Nama" value="<?php echo $data['Nama']; ?>" placeholder="Nama" required>
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" id="alamat" type="text" name="Alamat" value="<?php echo $data['Alamat']; ?>" placeholder="Alamat" required>
                        <label for="telepon" class="form-label">Telepon</label>
                        <input class="form-control" id="telepon" type="text" name="Telepon" value="<?php echo $data['Telepon']; ?>" placeholder="Telepon" required>
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" id="email" type="email" name="Email" value="<?php echo $data['Email']; ?>" placeholder="Email" required>
                        <label for="web" class="form-label">Web</label>
                        <input class="form-control" id="web" type="text" name="Web" value="<?php echo $data['Web']; ?>" placeholder="Web" required>
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <textarea class="form-control" id="pendidikan" name="Pendidikan" rows="3" placeholder="Pendidikan" required><?php echo $data['Pendidikan']; ?></textarea>
                        <label for="pengalamanKerja" class="form-label">Pengalaman Kerja</label>
                        <textarea class="form-control" id="pengalamanKerja" name="Pengalaman_kerja" rows="3" placeholder="Pengalaman Kerja" required><?php echo $data['Pengalaman_kerja']; ?></textarea>
                        <label for="keterampilan" class="form-label">Keterampilan</label>
                        <textarea class="form-control" id="keterampilan" name="Keterampilan" rows="3" placeholder="Keterampilan" required><?php echo $data['Keterampilan']; ?></textarea>
                        <label for="formFile" class="form-label">Foto Path</label>
                        <input class="form-control" type="text" id="formFile" name="Foto_path" value="<?php echo $data['Foto_path']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
</body>

</html>