<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function index($version = -1)
    {
        if (!$this->input->is_cli_request()) {
            echo '<h1>Acesso restrito ao console!</h1>' . PHP_EOL;
            return;
        }
        if ($version < -1) {
            echo 'Valor passado é inválido' . PHP_EOL;
            return;
        }
        $this->load->library('migration');
        $retorno = ((int) $version) > -1 ? $this->migration->version($version) : $this->migration->current();
        if ($retorno === false) {
            show_error($this->migration->error_string());
            return;
        }
        echo 'Migration completed.' . PHP_EOL;
    }
}
