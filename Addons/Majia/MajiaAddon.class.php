<?php
/**
 * 马甲插件
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-4-2
 * Time: 下午3:32
 * @author &擦幹眼淚！<1543049682@qq.com>
 */
namespace Addons\Majia;
use Common\Controller\Addon;
require_once(ONETHINK_ADDON_PATH . 'Majia/Common/function.php');

class MajiaAddon extends Addon
{
    public $info = array(
        'name' => 'Majia',
        'title' => '马甲插件',
        'description' => '管理员可以切换多个账号登录',
        'status' => 1,
        'author' => 'OS首席开发者-&擦幹眼淚！',
        'version' => '1.0'
    );

    public function install()
    {
        return true;
    }

    public function uninstall()
    {
        return true;
    }

    /**
     * 设置skin钩子代码
     * @param $param 相关参数
     * @author &擦幹眼淚！<1543049682@qq.com>
     */
    public function personalMenus($param)
    {

        $uids=getMajiaUids();

        $group=explode(";",$uids);
        array_pop($group);
        foreach ($group as $v){
            $group1[]=explode(":",$v);

        } unset($v);
        $group2=array();
        foreach ($group1 as $v1){
            $group2[$v1[0]]=$v1[1];
        }
       unset($v);unset($v1);
        $str='';
        foreach ($group2 as $g){
          $str.= $g.',';
        }
        unset($g);
        $g2=explode(",",$str);
        $flag=0;
        if(in_array(is_login(),$g2)){
                $flag=1;

        }
      if($flag==1){
            echo '<li>
                        <a data-type="ajax" data-url="'.addons_url('Majia://Majia/change').'" data-title="切换马甲！" data-toggle="modal">
                            <span class="glyphicon glyphicon-star"></span>切换马甲
                        </a>
                  </li>';
        }
        unset($flag);
    }
    
} 