<?php
session_start();
if(session_destroy())
{
  echo("<script>location.href = '/online_market/index.php';</script>");
}
?>