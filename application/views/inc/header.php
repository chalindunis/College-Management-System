<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>College Managaement System</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
	<script src="<?php echo base_url('assets\js\jquery-3.1.0.js'); ?>"></script>
	<script src="<?php echo base_url('assets\js\bootstrap.min.js'); ?>"></script>
    <style type="text/css">
        .buttons{
            color: #2196f3;
            border: 1px solid #cabdbd;
            border-radius: 5px;
            padding: 2px 10px 2px 10px;
        }
        .user-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .student-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
    </style>

</head>
<body>

<div id="container">

	<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">COLLEGE MANAGEMENT SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <!-- <?php echo $user_id = $this->session->userdata('user_id'); ?> -->
                    <?php 
                    $user_image = 'UOM logo.png';//$this->session->userdata('user_image'); // Assuming user_image is stored in session
                    if ($user_image): ?>
                        <img src="<?php echo base_url('assets/uploads/' . $user_image); ?>" alt="User Image" class="user-image">
                    <?php endif; ?>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url('index.php/welcome'); ?>">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <?php if ($user_id == '1'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/admin/viewCoadmins'); ?>">Co-Admins</a>
                    </li>  
                <?php elseif ($user_id > '1'):?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/users/list'); ?>">My Students</a>
                    </li>  
                <?php endif;?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('index.php/admin/dashboard'); ?>">Dashboard</a>
                </li>            
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('index.php/welcome/logout'); ?>">Logout</a>
                </li>
                

            </div>
        </div>
    </nav>
</div>



    