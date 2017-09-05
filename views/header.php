<!doctype html>
<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/sheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/script.js"></script>
    <?php
        if(isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
    ?>
</head>
<body>
    
    <?php Session::init();?>
    
    <div id="header">
        header<br/>
        <a href="<?php echo URL; ?>index">Index</a>
        <a href="<?php echo URL; ?>help">Help</a>
        <?php if(Session::get('loggedIn') == TRUE): ?>
        <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
        <?php else: ?>
        <a href="<?php echo URL; ?>login">Login</a>
        <?php endif; ?>
    </div>

    <div id="content">