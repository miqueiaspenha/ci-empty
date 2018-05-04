<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function index()
    {
        if (!$this->input->is_cli_request()) {
            echo '<h1>Acesso restrito ao console!</h1>';
            return;
        }

        $this->load->library('migration');

        $retorno = ($version) ? $this->migration->version($version) : $this->migration->current();

        if ($retorno) {
            show_error($this->migration->error_string());
            return;
        }
        echo 'Migration completed.';
    }
}
