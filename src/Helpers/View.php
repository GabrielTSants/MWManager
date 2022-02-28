<?php

namespace MWManager\Helpers;

trait View
{
  public function render(string $path, array $data)
  {
    extract($data);
    require __DIR__.'/../../view/' . $path;
  }
}