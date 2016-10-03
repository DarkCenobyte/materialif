<?php

namespace Components;

class Renderer
{
  private $smarty;
  private $parent;

  public function __construct($parent)
  {
    $reflection = new \ReflectionClass($parent);
    $this->parent = $reflection->getShortName();
    $this->smarty = new \Smarty();

    $this->smarty->setTemplateDir(__DIR__ . '/../caches/smarty/templates');
    $this->smarty->setCompileDir(__DIR__ . '/../caches/smarty/templates_c');
    $this->smarty->setCacheDir(__DIR__ . '/../caches/smarty/cache');
    $this->smarty->setConfigDir(__DIR__ . '/../caches/smarty/configs');
  }

  /**
   * Render a view from /view/'controller-name'/$name
   */
  public function render($name, $params = [])
  {
    if (isset($params) && is_array($params)) {
      foreach ($params as $key => $value) {
        $this->smarty->assign($key, $value);
      }
    }

    $this->smarty->display('views/' .
      'default/' . //@TODO: replace by config from db : template name
      strtolower(substr($this->parent, 0, -10)) .
      '/' . $name . '.tpl'
    );
  }
}
