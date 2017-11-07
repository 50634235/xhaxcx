<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-4-2
 * Time: 下午3:56
 * @author &擦幹眼淚！<1543049682@qq.com>
 */

function getMajiaUids(){
    $config['uids']='';
    if(!$config['uids']){
        $map['name']    =   'Majia';
        $map['status']  =   1;
        $config  =   D('Addons')->where($map)->getField('config');
        $config=json_decode($config,true);
    }
    return $config['uids'];
      /*  if($config['uids']!=''){
            $uids=explode(',',$config['uids']);
        }else{
            $uids=array();
        }
        S('MAJIA_ADDON_UIDS',$uids,600);
    }
    return $uids;*/
}