<?php 

//koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'map');

//DAFTAR/REGISTRASI
if(isset($_POST['register'])){
    //jika tombol register di klik
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    //fungsi enkripsi
    $epassword = password_hash($password, PASSWORD_DEFAULT);

    //insert to db
    $insert = mysqli_query($koneksi, "INSERT INTO user(username,password) values('$username','$epassword')");

    if($insert){
        //jika berhasil
        header('location:login.php');
    }else {
        //jika gagal
        echo'
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php";
        </script>
        ';
    }
}

//LOGIN
if(isset($_POST['login'])){
    //jika tombol login di klik
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    //insert to db
    $cekdb = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    $hitung = mysqli_num_rows($cekdb); //cek apakah data ada atau tidak, klo ada berupa angka, kalo tidak 0
    $pw = mysqli_fetch_array($cekdb);
    $passwordsekarang = $pw['password'];

    if($hitung>0){ //jika ada maka angka pasti diatas angka 0
        //jika ada
        //verifikasi password
        if(password_verify($password, $passwordsekarang)){
            //jika password nya benar
            echo'
            <script>
                alert("anda berhasil login");
                window.location.href="mapsuser.php";
            </script>
            ';
            // header('location:mapuser.php'); //redirect ke halaman home/halaman utama    
        }else{
            //jika password salah
        echo'
        <script>
            alert("Password anda salah");
            window.location.href="login.php";
        </script>
        ';
        }
        
    }else {
        //jika gagal
        echo'
        <script>
            alert("Login gagal");
            window.location.href="login.php";
        </script>
        ';
    }
}


?>