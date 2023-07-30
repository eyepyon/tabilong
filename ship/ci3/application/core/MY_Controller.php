<?php

/**
 * stvboxnavi.MY_controller.php
 *
 * @author: aida
 * @version: 2014-09-04 15:27
 */
class MY_Controller extends CI_Controller {

	var $data = array();

	public function __construct() {
		parent::__construct();

		// ライブラリ群のロード
		$libraries = array( 'parser','session' );
		$this->load->library( $libraries );
		//
		$helpers = array( 'cookie', 'url', 'form' );
		$this->load->helper( $helpers );

		if ( ENVIRONMENT == 'development' ) {
//			$this->output->enable_profiler( true );
		}

		$base_url = base_url();
		//
        $base_url = str_replace("http://","//",$base_url);
        $base_url = str_replace("https://","//",$base_url);

		$this->data['base_url'] = $base_url;

//		$loginName = $this->session->userdata('user_account');
//		$loginName = $this->session->userdata('email');
		$loginName = "";
		//
		$current_url = current_url();
		//
		if ( !$loginName && !strpos( $current_url, 'member' ) && !strpos( $current_url, 'admin' ) ) {

			$uri = uri_string();
			//
//          $redirectUrl = '/member/';
//			$redirectUrl = '';
//			if ( $uri != "" ) {
//				$redirectUrl .= sprintf( "?u=%s", $uri );
//			}
//			redirect( $redirectUrl );
//			exit;
		}

		$this->data['loginName'] = $loginName;

	}

	/**
	 * ページ情報の組み込みおよびテンプレートの表示を行う。
	 *
	 * (モジュール別テンプレート配置先)
	 *   APPPATH/modules/(モジュール名)/view/(テンプレート名)
	 *
	 * (共通テンプレート配置先)
	 *   APPPATH/view/(テンプレート名)
	 *
	 * @param string $target 設定パス(アクション名/メソッド名で記述)。
	 * @param string $pageInfo
	 * @param bool $return_string
	 */
	public function parse( $target, $pageInfo = "", $return_string = FALSE ) {

		// テンプレート情報の取得
		$template_name = $target;
		//　テンプレート表示
		$CI =& get_instance();
		$CI->output->set_header( 'Content-Type: text/html; charset=' . HTML_ENCODING );
		$this->parser->html_parse( $template_name, $this->data, $return_string, TRUE, HTML_ENCODING );
	}


}
