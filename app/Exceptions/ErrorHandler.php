<?php

namespace App\Exceptions;

class ErrorHandler
{
  public static function handleException(\Exception $e){
        error_log("Hata Oluştu: " . $e->getMessage());
        echo "Bir hata oluştu. Lütfen daha sonra tekrar deneyin.";
  }
}
