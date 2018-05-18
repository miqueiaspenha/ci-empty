<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Firebase\JWT\JWT;

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->set_session();
    }

    protected function set_session()
    {
        if(!class_exists('CI_Session')) {
            return;
        }
        if(!class_exists('Twig')) {
            return;
        }
        $this->twig->addGlobal('session', $this->session);
    }
}

class REST_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Accept: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, X-Authorization, Authorization');
        header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
        header('Content-Type: application/json');
    }

    public function get_data($array = false)
    {
        return json_decode(file_get_contents('php://input'), $array);
    }

    public function write_output($message = [], $http_status = 400)
    {
        $this->output->set_status_header($http_status);
        return $this->output->set_output(json_encode($message));
    }

    public function generate_token($data = '')
    {
        return JWT::encode($data, getenv('SECRET_KEY'));
    }
}
