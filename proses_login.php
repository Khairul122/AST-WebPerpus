   <?php
    include 'koneksi.php';
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi, "SELECT * FROM tbl_anggota WHERE username='$username' AND password='$password'");
        if ($query->num_rows > 0) {
            $data = mysqli_fetch_assoc($query);
            session_start();
            $_SESSION['idadmin'] = $data['id_anggota'];
            $_SESSION['nama'] = $data['nis'];
            $_SESSION['nm'] = $data['nm_anggota'];
            echo "<script>location='myakun/index.php';</script>";
        } else {
            echo "<script>alert('Login gagal');</script>";
            echo "<script>location='login.php';</script>";
        }
    }

    ?>
