<?php

namespace MWManager\Model;

Interface InterfaceDuplicate
{
  public function dontAllowDuplicate(string $name, int $user);
}