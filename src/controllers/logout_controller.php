<?php
  class LogoutController{
    function home(){

      setcookie("ARTZY_USERNAME", "", time() + (86400 * 30), "/");
      setcookie("ARTZY_PASSWORD", "", time() + (86400 * 30), "/");
      session_destroy();
      header('Location: /Artzy/index.php?controller=login&action=home');

    }
    function error(){

    }
  }
?>
