<?php
/**
 *
 */

class Vr extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->parse('vr/vr.tpl', 'vr');
    }

    public function id($id = 0)
    {
        $this->data["id"] = $id;

        $machine_model = $this->pc_or_android_or_ios($_SERVER['HTTP_USER_AGENT']);
//        $machine_model = 'ios';
        switch ($id) {
            case 1:
                if ($machine_model == 'ios') {
                    $url = "/file/mp4/r0/r0.m3u8";
                } else {
                    $url = "/file/shika1.mp4";
//              $url = "/file/shika1.mp4";
                }
                break;
            case 2:
//                $url = "http://133.18.49.35/mp4/r2/r2.m3u8";
                if ($machine_model == 'ios') {
                    $url = "/file/mp4/r2/r2.m3u8";
                } else {
                    $url = "/file/R0010028_er.MP4";
                }
                break;
            case 3:
                if ($machine_model == 'ios') {
                    $url = "/file/mp4/r3/r3.m3u8";
                } else {
                    $url = "/file/R0010040_er.MP4";
                }
                //            $url = "/file/R0010046_er.MP4";
                break;
            case 4:
                $url = "/file/hk.mp4";
                break;
            case 5:
                $url = "/file/kr.mp4";
                break;
            case 6:
                $url = "/file/fuji.mp4";
                break;
            default:
                if ($machine_model == 'ios') {
                    $url = "/file/mp4/r3/r3.m3u8";
                } else {
                    $url = "/file/R0010040_er.MP4";
                }
                //            $url = "/file/R0010046_er.MP4";
                break;
        }

        $this->data["url"] = $url;

        if (strpos($url, '.m3u8') !== false) {
            $this->smarty->view('vr/vr.tpl', $this->data);
        } else {
            $this->smarty->view('vr/vrm.tpl', $this->data);
        }
    }

    /**
     * デバイス判定
     * @param  string $ua ユーザエージェント
     * @return string pc|android|ios
     */
    public function pc_or_android_or_ios($ua = null)
    {
        if (is_null($ua)) {
            $ua = $_SERVER['HTTP_USER_AGENT'];
        }

        if (preg_match('/iPhone|iPod|iPad/ui', $ua)) {
            return 'ios';
        } else if (preg_match('/Android/ui', $ua)) {
            return 'android';
        } else {
            return 'pc';
        }
    }
}


