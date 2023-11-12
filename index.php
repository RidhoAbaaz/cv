<?php

include_once('connect.php');

$fix = mysqli_query($connection, "SELECT * FROM cv_data");
$data = mysqli_fetch_array($fix);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title>Curriculum Vitae</title>
</head>

<body>
    <section>
        <div class="profile">
            <h5>Curriculum Vitae</h5>
            <img src="<?php echo $data['Foto_path']; ?>" alt="my foto">
            <a class="btn btn-outline-dark" href="update.php?antrian=$data[id]">UPDATE</a>
            <a class="btn btn-outline-dark" href="">DOWNLOAD</a>
        </div>
        <div class="biodata">
            <div class="title">
                <h5>Nama</h5>
                <h5>Alamat</h5>
                <h5>Telepon</h5>
                <h5>Email</h5>
                <h5>Web</h5>
                <h5>Pendidikan</h5>
                <h5>Pengalaman Kerja</h5>
            </div>
            <div class="data">
                <?php
                echo "<p>" . $data['Nama'] . "</p> ";
                echo "<p>" . $data['Alamat'] . "</p> ";
                echo "<p>" . $data['Telepon'] . "</p> ";
                echo "<p>" . $data['Email'] . "</p> ";
                echo "<p>" . $data['Web'] . "</p> ";
                echo "<p>" . $data['Pendidikan'] . "</p> ";
                echo "<p>" . $data['Pengalaman_kerja'] . "</p> ";
                ?>
            </div>
        </div>
    </section>
</body>

</html>