<?php

/**
 *
 */
class Info  extends MY_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index()
    {
      redirect("/info/about");
    }

    public function about()
    {
        $data = array();
        $this->smarty->view('info/about.tpl',$data);
    }

    public function privacy()
    {

        $data = array();
        $this->smarty->view('info/privacy.tpl',$data);
    }

    public function kiyaku()
    {
        $data = array();
        $this->smarty->view('info/kiyaku.tpl',$data);
    }


}
