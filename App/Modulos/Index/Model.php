<?php
/**
 *Model de Index
 *
 * PHP version 5
 *
 * @category Erik
 * @package  Core
 * @author   Erik Figueiredo <falecom@erikfigueiredo.com.br>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://blog.erikfigueiredo.com.br/
 *
 */
 use Erik\Core\Master_Model;
 
 /**
 * Index_Model()
 *
 * @category Erik
 * @package  Core
 * @author   Erik Figueiredo <falecom@erikfigueiredo.com.br>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://blog.erikfigueiredo.com.br/
 *
 */

class Index_Model extends Master_Model
{

    /**
     * Retorna os registros deste Model
     *
     * @return  Não retorna nada
     *
     */
    public function teste()
    {
        return $this->db->read('all', ['where'=>['id'=>3]]);
    }
}
