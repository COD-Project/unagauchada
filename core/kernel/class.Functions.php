<?php

/**
 *
 */

final class Func
{

  final static function encrypt(string $e) : string
  {
    // Function made to be used in user passwords
    $str = '';
    for ($i = 0; $i < strlen($e); $i++) {
      $str .= ($i % 2) != 0 ? md5($e[$i]) : $i;
    }
    return md5($str);
  }

  final static function encrypt_with_key(string $e, string $key) : string
  {
    // Function made to be used in networks passwords
     $result = '';
     for($i = 0; $i < strlen($e); $i++) {
        $char = substr($e, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
     }
     return base64_encode($result);
  }

  final static function decrypt_with_key(string $e, string $key) : string
  {
    // Function made to be used in networks passwords
     $result = '';
     $e = base64_decode($e);
     for($i = 0; $i < strlen($e); $i++) {
        $char = substr($e, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
     }
     return $result;
  }

  final public static function redirect(string $url = URL)
  {
    header('location: ' . $url);
  }
  //------------------------------------------------
  /**
    * Alias de Empty, más completo
    *
    * @param midex $var: Variable a analizar
    *
    * @return true si está vacío, false si no, un espacio en blanco cuenta como vacío
  */
  final static function emp($var) : bool
  {
    return (isset($var) && empty(trim(str_replace(' ','',$var))));
  }

  //------------------------------------------------
  /**
    * Analiza que TODOS los elementos de un arreglo estén llenos, útil para analizar por ejemplo que todos los elementos de un formulario esté llenos
    * pasando como parámetro $_POST
    *
    * @param array $array, arreglo a analizar
    *
    * @return true si están todos llenos, false si al menos uno está vacío
  */
  final static function all_full(array $array) : bool
  {
    foreach($array as $e) {
      if(self::emp($e) and $e != '0') {
        return false;
      }
    }
    return true;
  }

  //------------------------------------------------
  /**
    * Alias de Empty() pero soporta más de un parámetro
    *
    * @param infinitos parámetros
    *
    * @return true si al menos uno está vacío, false si todos están llenos
  */
   final public static function e() : bool
   {
     for ($i = 0, $nargs = func_num_args(); $i < $nargs; $i++) {
       if(self::emp(func_get_arg($i)) and func_get_arg($i) != '0') {
         return true;
       }
     }
     return false;
   }

}

?>
