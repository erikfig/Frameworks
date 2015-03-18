<?php
 
namespace Erik\Core\Master;

use PDO;
use Erik\Core\Master\Db\Suporte_Pdo;

class Db_Mysql extends Suporte_Pdo
{
    
    public $db,$table,$mysql;
    protected $mysql_exec;
    
    public function __construct(Array $db,$table)
    {
        $this->db=$db;
        $this->table=$table;
        
        if ((isset($this->db['servidor'])) and (isset($this->db['usuario'])) and (isset($this->db['senha']))) {
            $this->mysql = new PDO(
                'mysql:host='.$this->db['servidor'].';dbname='.$this->db['database'], $this->db['usuario'], $this->db['senha']
            );
            $this->mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    
    public function create(Array $campos)
    {
        
        $save=$this->getCampos($campos);
        
        $fields = implode('`,`', array_keys($campos));
        $values = implode(',', array_keys($save['save']));
        
        $sql='INSERT INTO `'.$this->table.'` (`'.$fields.'`) VALUES('.$values.');';
        
        $this->pdo($sql, $save['save']);
        
    }
    
    public function read($tipo='all', Array $configs=array())
    {
        
        $save['sql']='';
        $save['save']=array();
        $campos ='';
        
        if (!isset($configs['campos'])) {
            $campos='*';
        } else {
            $total=count($configs['campos']);
            $i=1;
            foreach ($configs['campos'] as $v) {
                $campos.='`'.$v.'`';
                if ($i!=$total) {
                    $campos .=' , ';
                }
                $i++;
            }
        }
        
        if (isset($configs['where'])) {
            $ret=$this->getCampos($configs['where']);
            $save['sql'] .= 'WHERE '.$ret['sql'];
            $save['save']=array_merge($ret['save'], $save['save']);
        }
        
        if (isset($configs['group by'])) {
            $ret=$this->getCampos($configs['group by']);
            $save['sql'] .= 'GROUP BY '.$ret['sql'];
        }
        
        if (isset($configs['order by'])) {
            $ret=$this->getCampos($configs['order by']);
            $save['sql'] .= 'ORDER BY '.$ret['sql'];
        }
        if (isset($configs['limit'])) {
            $ret=$this->getCampos($configs['limit']);
            $save['sql'] .= 'LIMIT '.$ret['sql'];
        }
        if (isset($configs['offset'])) {
            $ret=$this->getCampos($configs['offset']);
            $save['sql'] .= 'OFFSET '.$ret['sql'];
        }
        
        $sql = 'SELECT '.$campos.' FROM `'.$this->table.'`'.$save['sql'].';';
        
        $this->pdo($sql, $save['save']);
        
        if ($tipo=='first') {
            return $this->mysql_exec->fetch(PDO::FETCH_ASSOC);
        } elseif ($tipo=='all') {
            return $this->mysql_exec->fetchAll(PDO::FETCH_ASSOC);
        } elseif ($tipo=='count') {
            return $this->mysql_exec->rowCount();
        }
    }
    
    public function update(Array $conditions,Array $campos)
    {
        
        $save=$this->getCampos($campos);
        
        $conditions=$this->getCampos($conditions);
        
        $save['save']=array_merge($save['save'], $conditions['save']);
        
        $sql='UPDATE `'.$this->table.'` SET '.$save['sql'].' WHERE '.$conditions['sql'].';';
        
        $this->pdo($sql, $save['save']);
        
    }
    
    public function delete(Array $conditions)
    {
        $save=$this->getCampos($conditions);
        
        $sql = 'DELETE FROM `'.$this->table.'` '.$save['sql'].';';
        $this->pdo($sql, $save['save']);
    }
    
}