<?php

namespace MWManager\Helpers;

trait Validate
{
  public function validateField($field)
  {
    if (isset($field) && (is_null($field) || $field === false || empty($field))){
      return false;
    }
    return true;
  }

  public function checkString(array $data, string $value)
  {
    foreach ($data as $string){
      if (!str_contains($value, $string)){
        continue;
      } else {
        return true;
      }
      return false;
    }
  }
}