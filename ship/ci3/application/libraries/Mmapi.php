<?php if ( !defined( 'BASEPATH' ) ) {
	exit('No direct script access allowed');
}

/**
 * monserver.Mmapi.php
 *
 * @author: aida
 * @version: 2015-01-21 17:11
 */
class Mmapi {

	function readRequestJson() {
		$CI =& get_instance();

		$CI->load->library( 'user_agent' );

		$json_string = file_get_contents( 'php://input' );
		$json_array  = json_decode( $json_string, TRUE );

		return $json_array;
	}

//	function readUid() {
//
//		$CI =& get_instance();
//		//
//		$CI->load->model( 'Mmapi_user_model', 'playUserModel' );
//		$CI->load->model( 'Mmapi_monster_model', 'apiMonsterModel' );
//		$CI->load->model( 'Mmapi_item_model', 'apiItemModel' );
//
//		//
//		$auth_key = $CI->input->post( 'auth_key' );
//		if ( $auth_key ) {
//			$userData = $CI->playUserModel->getByAuthKey( trim( $auth_key ) );
//			if ( !$userData ) {
//				$userData = array(
//					"auth_key" => trim( $auth_key )
//				);
//				$user_id  = $CI->playUserModel->setUserData( 0, $userData );
//				//
////				$CI->apiMonsterModel->insertInitMonster($user_id);
//				$CI->apiItemModel->insertInitItem( $user_id );
//
//			} else {
//				$user_id = $userData['user_id'];
//			}
//			return $user_id;
//
//		}
//		return FALSE;
//	}

//	/**
//	 * @return bool
//	 */
//	function readGameKey() {
//
//		$CI =& get_instance();
//		//
//		$CI->load->model( 'Mmapi_mission_model', 'apiMissionModel' );
//		//
//		$game_key = $CI->input->post( 'game_key' );
//		if ( $game_key ) {
//			$keyData = $CI->apiMissionModel->getGameKey( trim( $game_key ) );
//			if ( $keyData ) {
//				return $keyData;
//			}
//		}
//		return FALSE;
//
//	}

//	function uidRead() {
//
//		$CI =& get_instance();
//
//		$CI->load->library( 'user_agent' );
//		//
//		$CI->load->model( 'Mmapi_user_model', 'playUserModel' );
//		$CI->load->model( 'Mmapi_monster_model', 'apiMonsterModel' );
//		$CI->load->model( 'Mmapi_item_model', 'apiItemModel' );
//
//		//
//		$auth_key = $CI->input->post( 'auth_key' );
//		if ( $auth_key ) {
//			$userData = $CI->playUserModel->getByAuthKey( trim( $auth_key ) );
//			if ( !$userData ) {
//				$userData = array(
//					"auth_key" => trim( $auth_key )
//				);
//				$user_id  = $CI->playUserModel->setUserData( 0, $userData );
//				//
////				$CI->apiMonsterModel->insertInitMonster($user_id);
//				$CI->apiItemModel->insertInitItem( $user_id );
//
//			} else {
//				$user_id = $userData['user_id'];
//			}
//			return $user_id;
//		}
//		return FALSE;
//	}

//	function readUidJson( $json_array ) {
//
//		$CI =& get_instance();
//		//
//		$CI->load->model( 'Mmapi_user_model', 'playUserModel' );
//		//
//		if ( !isset($json_array['auth_key']) ) {
//			$this->response_error_status();
//			exit;
//		}
//		$auth_key = trim( $json_array['auth_key'] );
//		if ( $auth_key ) {
//			$userData = $CI->playUserModel->getByAuthKey( $auth_key );
//			if ( !$userData ) {
//				$userData = array(
//					"auth_key" => $auth_key
//				);
//				$user_id  = $CI->playUserModel->setUserData( 0, $userData );
//			} else {
//				$user_id = $userData['user_id'];
//			}
//		} else {
//			$this->response_error_status();
//			exit;
//		}
//		// user_agent
//		//	$ua = $CI->agent->agent_string();
//		//
//		return $user_id;
//	}

//	/**
//	 * @param $json_array
//	 * @return mixed
//	 */
//	function readGameKeyJson( $json_array ) {
//
//		$CI =& get_instance();
//		//
//		$CI->load->model( 'Mmapi_mission_model', 'apiMissionModel' );
//		//
//		if ( !isset($json_array['game_key']) ) {
//			$this->response_error_status();
//			exit;
//		}
//		$game_key = trim( $json_array['game_key'] );
//		if ( $game_key ) {
//			$keyData = $CI->apiMissionModel->getGameKey( $game_key );
//			if ( !$keyData ) {
//				$this->response_error_status();
//				exit;
//			}
//		} else {
//			$this->response_error_status();
//			exit;
//		}
//		return $keyData;
//
//	}

//	/**
//	 * @return mixed
//	 */
//	function uidReadJson() {
//
//		$CI =& get_instance();
//
//		$CI->load->library( 'user_agent' );
//		//
//		$CI->load->model( 'Mmapi_user_model', 'playUserModel' );
//
//		$json_string = file_get_contents( 'php://input' );
//		$json_array  = json_decode( $json_string, TRUE );
//		//
//		if ( !isset($json_array['auth_key']) ) {
//			$this->response_error_status();
//			exit();
//		}
//		$auth_key = trim( $json_array['auth_key'] );
//		if ( $auth_key ) {
//			$userData = $CI->playUserModel->getByAuthKey( $auth_key );
//			if ( !$userData ) {
//				$userData = array(
//					"auth_key" => $auth_key
//				);
//				$user_id  = $CI->playUserModel->setUserData( 0, $userData );
//			} else {
//				$user_id = $userData['user_id'];
//			}
//		} else {
//			$this->response_error_status();
//			exit;
//		}
//		// user_agent
//		//	$ua = $CI->agent->agent_string();
//		//
//		return $user_id;
//	}


	/**
	 * @param array $array
	 * @param int $status_code
	 * @param bool $masterFlg
	 */
	function response_json( $array = array(), $status_code = STATUS_CODE_OK, $masterFlg = FALSE ) {

		$CI =& get_instance();

		if ( $masterFlg == TRUE ) {
			$jsonArray = $array;
		} else {
			$jsonArray = array(
				"status" => $status_code,
			);
			if ( count( $array ) > 0 ) {
				$jsonArray["data"] = $array;
			}
		}

		$jsonData = json_encode( $jsonArray, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );

		$CI->output->set_header( "Content-Type: application/json; charset=utf-8" );
		// フレームセットの一部として表示される事を禁止
		$CI->output->set_header( 'X-FRAME-OPTIONS: DENY' );
		// XSS対策
		$CI->output->set_header( "X-Content-Type-Options: nosniff" );
		// キャッシュOFF
		$CI->output->set_header( "Cache-Control: no-store, no-cache, must-revalidate" );
		$CI->output->set_header( "Cache-Control: post-check=0, pre-check=0" );
		$CI->output->set_header( "Pragma: no-cache" );
		//
		$CI->output->set_output( $jsonData );
	}

	/**
	 * エラーを返す
	 * @param int $status
	 */
	function response_error_status( $status = STATUS_CODE_NG ) {
		$array = array();
		$this->response_json( $array, $status );
	}

//	/**
//	 * @param int $gainCoin
//	 * @param int $allCoin
//	 * @param int $useBoost
//	 * @return int
//	 */
//	function calcStageRank( $gainCoin, $allCoin, $useBoost = 0 ) {
//
//		//		・ステージ評価(★0～★3)
//		//　★0…未クリアまたはブーストクリア
//		//　★1…クリアかつコイン取得率0%～49%
//		//　★2…クリアかつコイン取得率50%～99%
//		//　★3…クリアかつコイン取得率100%
//		//　※最も高い評価のみ保存
//
//		$rank = 0;
//		if ( $useBoost != 1 ) {
//			if ( $gainCoin == $allCoin ) {
//				$rank = 3;
//			} elseif ( $allCoin > 0 ) {
//				$per = $gainCoin / $allCoin * 100;
//				if ( $per < 50 ) {
//					$rank = 1;
//				} else {
//					$rank = 2;
//				}
//			}
//		}
//		return $rank;
//	}
//

}

