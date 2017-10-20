<?php

if (!is_array($_SESSION)) {
  session_set_cookie_params(60 * 24, '/');
  session_start();
}

?>