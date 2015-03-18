<?php

namespace Erik\Core;

use App\Core\Config;

class Master_View
{
    public $mvc;
    public $data = array();
    public $base_url;
    public $tema;
    
    public function __construct($returnMvc)
    {
        $this->mvc=$returnMvc;
        $this->base_url=$_SERVER['REQUEST_URI'];
        
        $config = new Config();
        $this->tema = ((isset($config->tema)) and (!empty($config->tema)))?$config->tema:'Default';
        
    }
    
    public function set($var,$value)
    {
        $this->data[$var]=$value;
    }
    
    public function conteudo()
    {
        extract($this->data);
        include ROOT.DS.'APP'.DS.'Modulos'.DS.$this->mvc['controller'].DS.'View'.DS.$this->mvc['action'].'.php';
    }
    
    public function templateUrl($string=null)
    {
        return $this->base_url.'App/Templates/'.$this->tema.'/'.$string;
    }
    
    public function __destruct()
    {
        include ROOT.DS.'APP'.DS.'Templates'.DS.'Default'.DS.'index.php';
        exit;
    }
}