<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-4-2
 * Time: 下午3:36
 * @author &擦幹眼淚！<1543049682@qq.com>
 */

namespace Addons\Majia\Controller;

use Home\Controller\AddonsController;

require_once(ONETHINK_ADDON_PATH . 'Majia/Common/function.php');

class MajiaController extends AddonsController
{
    public function change()
    {
        $uids = getMajiaUids();//顶贴:1,100,101;刷评论:102,103,104;
        $group = explode(";", $uids);
        /*
  array(3) {
  [0] => string(16) "顶贴:1,100,101"
  [1] => string(21) "刷评论:102,103,104"
  [2] => string(0) ""}*/
        $count = substr_count($uids['uids'], ';');//2
        $group1=array();
        foreach ($group as $v) {
            $group1[] = explode(":", $v);
        }
        unset($v);
        $group2 = array();
        foreach ($group1 as $v1) {
            $group2[$v1[0]] = $v1[1];
        }
        array_pop($group2);
        unset($v1);
        //$group2
        /*array(3) {
  ["顶贴"] => string(9) "1,100,101"
  ["刷评论"] => string(11) "102,103,104"
  [""] => NULL
}*/
        $group3=array();
        foreach ($group2 as $v2 => $m) {
            $arr[] = $v2; // [0] => string(6) "顶贴" [1] => string(9) "刷评论"
            $group3[] = $m;//[0] => string(9) "1,100,101" [1] => string(11) "102,103,104"
        }
        unset($v2);
        unset($m);
        $k = 0;
        foreach ($group3 as $v3) {
            $group4[] = explode(",", $v3);
            if (count($group4[$k])) {
                $uids = array_diff($group4[$k], array(is_login()));
            }
            $p = 0;
            foreach ($uids as $val) {
                $val = query_user(array('uid', 'nickname'), $val);
                if (isset($val['uid'])) {
                    $users[$k][] = $val;
                    $users[$k][$p]['group'] = $arr[$k];
                    $p++;
                }
            }
            $k++;
        }
        unset($v3);
        unset($k);
        unset($val);
        unset($p);
        foreach ($users as $f) {
            $groups[]['group'] = $f;
        }
        unset($f);
        $this->assign('arr', $arr);
        $this->assign('groups', $groups);
        $now = query_user(array('uid', 'nickname'));
        $this->assign('now_user', $now);
        $this->display(T('Addons://Majia@Majia/change'));
    }

    public function doChange()
    {
        $aUid = I('post.uid', 0, 'intval');
        $uids = getMajiaUids();
        $group = explode(";", $uids);
        array_pop($group);
        $group1 = array();
        foreach ($group as $v) {
            $group1[] = explode(":", $v);

        }
        unset($v);
        $group2 = array();
        foreach ($group1 as $v1) {
            $group2[$v1[0]] = $v1[1];
        }
        unset($v);
        unset($v1);
        $str = '';
        foreach ($group2 as $g) {
            $str .= $g . ',';
        }
        unset($g);
        $g2 = explode(",", $str);
        if (in_array(is_login(), $g2) && in_array($aUid, $g2) && $aUid != is_login()) {
            $memberModel = D('Common/Member');
            $memberModel->logout();
            $memberModel->login($aUid); //登陆
            $result['status'] = 1;
        } else {
            $result['status'] = 0;
        }
        $this->ajaxReturn($result);
    }
} 