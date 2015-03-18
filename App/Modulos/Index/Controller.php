<?php
/**
 * Controller de Index
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
 use Erik\Core\Master_Controller;
 
 /**
 * Index_Controller()
 *
 * @category Erik
 * @package  Core
 * @author   Erik Figueiredo <falecom@erikfigueiredo.com.br>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://blog.erikfigueiredo.com.br/
 *
 */
class Index_Controller extends Master_Controller
{

    /**
     * Action index
     *
     * @return  Não retorna nada
     *
     */
    public function index()
    {
        var_dump($this->model->teste());exit;
    }
}
