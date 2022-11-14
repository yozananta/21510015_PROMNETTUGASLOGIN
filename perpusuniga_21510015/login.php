<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="assets/css/loginlogo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="theme-color" content="#7952b3">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

*{
    margin: 0px;
    padding: 0px;
}

body{
    font-family: 'Exo', sans-serif;
}


.context {
    width: 100%;
    position: absolute;
    top:50vh;
    
}

.context h1{
    text-align: center;
    color: #fff;
    font-size: 50px;
}


.area{
    background: #242526;  
    width: 100%;
    height:100vh;
    
   
}


.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: #242526;
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }

}

    </style>


    <link href="assets/signin.css" rel="stylesheet">
</head>

<body class="area text-center">
    
<div class="area" >
        
    </div >
    <ul class="circles">
        
        

        <br><br><br><br><br>
    <main class="form-signin area">
        <form action="ceklogin.php" method="POST">
            <img class="mb-4" src="assets/loginlogo.png" alt="" width="72">
            <h1 class="h3 mb-3 fw-normal text-white">Login</h1>
            <?php
                    session_start();
                    if(isset($_SESSION['gagal'])){
                    ?>
                        <div class="alert bg-white text-danger text-center">
                            <b>Username/Password Salah!</b>
                        </div> 
            <?php
                        session_destroy();
                      }
                    
                    if(isset($_SESSION['gagal-login'])){?>
                        <script>
                            Swal.fire({
                                icon: 'warning',
                                title: '<?= $_SESSION['gagal-login']?>',
                                text: 'Login Dulu Yaa..!',
                            }).then(function(){
                                document.location.href = 'login.php';
                            });
                        </script>
                       <?php  session_destroy();
                    }
            ?>


            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username..."
                    required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword"
                    placeholder="Password..." required>
                <label for="floatingPassword">Password</label>
            </div>

            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
            <p class="mt-5 mb-3 text-white">&copy; Yozakha Kirnanta <?= date('Y')?></p>
        </form>
    </main>
        <li><img src="assets/loginlogo.png" style="width: 150px"></li>
        <li><img src="assets/loginlogo.png" style="width: 15px"></li>
        <li><img src="assets/loginlogo.png" style="width: 25px"></li>
        <li><img src="assets/loginlogo.png" style="width: 150px"></li>
        <li><img src="assets/loginlogo.png" style="width: 110px"></li>
        <li><img src="assets/loginlogo.png" style="width: 20px"></li>
        <li><img src="assets/loginlogo.png" style="width: 60px"></li>
        <li><img src="assets/loginlogo.png" style="width: 20px"></li>
        <li><img src="assets/loginlogo.png" style="width: 20px"></li>
        <li><img src="assets/loginlogo.png" style="width: 80px"></li>

    </ul>



</body>

</html>