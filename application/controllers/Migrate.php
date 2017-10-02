<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($version = '')
    {

        $this->load->library('migration');

        if ($version) {
            $retorno = $this->migration->version($version);
        } else {
            $retorno = $this->migration->current();
        }

        if (!$retorno) {
            show_error($this->migration->error_string());
            return;
        } else {
            echo 'Migration completed.';
        }
    }
}
