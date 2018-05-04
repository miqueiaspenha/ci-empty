<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{

    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
    }

    public function rule_example($value)
    {
        $variable = false;
        if ($variable) {
            $this->set_message('rule_example', 'message');
            return false;
        }
        return true;
    }
}
