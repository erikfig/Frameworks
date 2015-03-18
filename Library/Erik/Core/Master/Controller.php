<?php
 
namespace Erik\Core;

class Master_Controller
{

    Use \Erik\Utilities\Request;
   
    public $request;
    public $mvc;
    public $model;
    public $view;

    public function __construct($returnMvc)
    {
        
        $this->mvc=$returnMvc;
        
        $modelName=$this->mvc['model'].'_Model';
        $this->model=new $modelName($returnMvc);
        
        $this->view=new Master_View($returnMvc);
        
    }
 
}
