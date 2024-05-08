   <?php
    include 'koneksi.php';
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' AND level='$level'");
        if ($query->num_rows > 0) {
            $data = mysqli_fetch_assoc($query);
            session_start();
            $_SESSION['idadmin'] = $data['id_admin'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama_lengkap'];
            $_SESSION['level'] = $data['level'];
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>alert('Login gagal');</script>";
            echo "<script>location='login.php';</script>";
        }
    }

    ?>
