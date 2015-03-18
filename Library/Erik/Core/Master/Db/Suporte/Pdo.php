<?php
 
namespace Erik\Core\Master\Db;

class Suporte_Pdo
{

    protected function getCampos(Array $campos)
    {
        $save['sql']='';
        foreach ($campos as $key => $value) {
            $save['sql'].='`'.$key.'` = :'.$key.' ';
            $save['save'][':'.$key]=$value;            
        }
        
        return $save;
    }
    
    protected function pdo($sql, $values)
    {
        $this->pdoPrepare($sql);
        $this->pdoBindValue($values);
        $this->pdoExecute($values);
    }
    
    protected function pdoPrepare($sql)
    {
        $this->mysql_exec=$this->mysql->prepare($sql);
    }
    
    protected function pdoBindValue($values)
    {
        foreach ($values as $k=>$v) {
            $this->mysql_exec->bindValue(':'.$k, $v);
        }
    }
    
    protected function pdoExecute(Array $values=array())
    {
        $this->mysql_exec->execute($values);
    }
}
