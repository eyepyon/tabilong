<?php

/**
 *
 */
class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index() {
        $this->parse( 'index.tpl', 'index' );
    }

    public function send_message() {
        $this->parse( 'send_message.tpl', 'index' );
    }


}
