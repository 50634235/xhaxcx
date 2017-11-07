<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.thinkphp.cn>
// +----------------------------------------------------------------------

/**
 * 前台配置文件
 * 所有除开系统级别的前台配置
 */

return array(

    // 预先加载的标签库
    'TAGLIB_PRE_LOAD' => 'OT\\TagLib\\Article,OT\\TagLib\\Think',

    /* 主题设置 */
    'DEFAULT_THEME' => 'default', // 默认模板主题名称

    /* SESSION 和 COOKIE 配置 */
    'COOKIE_PREFIX' => 'onethink_home_', // Cookie前缀 避免冲突

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__IMG__' => __ROOT__ . '/Application/' .MODULE_NAME. '/Static/images',
        '__CSS__' => __ROOT__ . '/Application/' .MODULE_NAME . '/Static/css',
        '__JS__' =>__ROOT__ . '/Application/' .MODULE_NAME. '/Static/js',
        '__PUBLIC__' => __ROOT__ . '/Public',
        '__CORE_IMAGE__'=>__ROOT__.'/Application/Core/Static/images',
        '__CORE_CSS__'=>__ROOT__.'/Application/Core/Static/css',
        '__CORE_JS__'=>__ROOT__.'/Application/Core/Static/js',
        '__APPLICATION__'=>__ROOT__.'/Application/'
    ),
    'LANG_SWITCH_ON' => true,
    'LANG_AUTO_DETECT' => false, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'        => 'zh-cn,en', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
    'DEFAULT_LANG'=>'zh-cn',


    'NEED_VERIFY' => true,//此处控制默认是否需要审核，该配置项为了便于部署起见，暂时通过在此修改来设定。

    /* SESSION设置 */
    'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session
    'SESSION_OPTIONS'       =>  array(), // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE'          =>  'db', // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_EXPIRE'        => 600,                //session过期时间
    // 'SESSION_PREFIX'        =>  '', // session 前缀
    'VAR_SESSION_ID'      =>  'session_id',     //sessionID的提交变量

    //小程序配置参数
    'xcx'=>array(
        'appid' =>'wx16231ad9090cd2ca',
        'secret'=>'09eda3f19175588456f56639e2379777',

        'mchid' => '',
        'key' => '',

        //这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
        'notify_url'=>'https://xxx.xxxx.com/index.php/Api/Wxpay/notify',

    ),
);

