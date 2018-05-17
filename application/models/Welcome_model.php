<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends MY_Model
{

    public $table = 'welcome';

    public function __construct()
    {
        parent::__construct($this->table);
    }

}

/* End of file Welcome_model.php */
/* Location: ./application/models/Welcome_model.php */
