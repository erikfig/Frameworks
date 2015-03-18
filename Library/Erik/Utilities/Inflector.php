<?php  
  
namespace Erik\Utilities;  
  
trait Inflector  
{  
  
    public function upperCamelCase($string=null)
    {
        $string=strtolower($string);
        $string=ucwords($string);
        $string=str_replace(' ', '', $string);
        
        return $string;
    }

    public function slug($string=null,$separator='-')
    {
        $string=strtolower($string);
        $string=str_replace(' ', $separator, $string);
        
        return $string;
    }
  
}
