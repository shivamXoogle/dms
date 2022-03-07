<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microtek</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/Style.css';?>" rel="stylesheet" type="text/css">
    <link rel="manifest" href="<?php echo base_url().'assets/manifest.json';?>">
    <link name="theme_color" content="#000">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
   <div class="container-fluid mx-auto" id="section1">
    <div class="row ">
    <div class="col-lg-6 p-5 mx-auto"> 
        <div class="loginView p-5 rounded shadow-lg mt-5">
        <img src="<?php echo base_url().'assets/customImg/microtek.png'?>" class="img-fluid"/>
        <h1 class="mt-4">Dealer <span>Management</span> Portal</h1>
            <h1 class="mt-4">Login Here !!</h1>
            <form id="dealerForm">
            <div class="form-group">
            <label>Email Address</label>
            <input type="text" class="form-control" name="email" required>
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
            <button class="btn" type="submit">Login</button>
            </div>
            </form>
            <div class="form-group">
            <a href="#">Forgot Password</a>
            </div>
        </div>
    </div>
    </div>
   </div>
</body>
<script>

const base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url().'assets/customJS/jquery.js' ?>"></script>
<script src="<?php echo base_url().'assets/customJS/auth.js' ?>"></script>
<script src="<?php echo base_url().'assets/customJS/ServiceWorker.js' ?>"></script>
</html>