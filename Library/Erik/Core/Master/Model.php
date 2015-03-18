<?php
 
namespace Erik\Core;

use App\Core\Config;

class Master_Model
{

    use \Erik\Utilities\Inflector;

    public $mvc,$table;
    protected $inflector,$db,$mysql;
    

    public function __construct($returnMvc)
    {
        
        $config = new Config();
        $db = $config->database;
        
        $this->table = $this->slug($returnMvc['model'], '_');
        if (isset($this->configs['table'])) {
            $this->table=$this->configs['table'];
        }
        if ($this->table) {
            $data_source='Erik\Core\Master\Db_'.$db['tipo'];
            $this->db=new $data_source($db,$this->table);
        }
        
    }
    
}
