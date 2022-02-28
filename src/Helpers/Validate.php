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
}