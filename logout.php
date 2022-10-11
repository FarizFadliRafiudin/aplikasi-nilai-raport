<?php
    include('./input-config.php');

    session_destroy();

    echo "
    <script>
        alert('logout berhasil');
        window.location = 'login.php';
    </script>
    "; 
?>