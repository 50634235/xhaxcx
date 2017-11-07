<?php
/**
* @description 文件说明
* @date 2017-10-31 18:04:55
* @author 王衍生 50634235@qq.com
*/
namespace Wxxcx\Controller;


use Think\Controller;

class BaseController extends Controller
{
    /**seo参数  郑钟良  ThinkOX
     * @var array
     */
    public $_mob_seo = array();
    public $_top_menu_list = array();
    public $appid = '';
    public $secret = '';

    public function _initialize()
    {
        $xcx_config = C('xcx');
        $this->appid = $xcx_config['appid'];
        $this->secret = $xcx_config['secret'];
        // $this->setMobTitle(L(CONTROLLER_NAME));

        // if(!is_login() && CONTROLLER_NAME!='Member'){
        //     if($this->is_weixin()){
        //         $moduleModel = D('Common/Module');
        //         if ($moduleModel->checkInstalled('Weixin')) {
        //             $config = D('Weixin/WeixinConfig')->getWeixinConfig();
        //             if($config['WX_TYPE']==3){
        //                 $redirect =urlencode(U('Weixin/Index/callback','',true,true));
        //                 $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$config['APP_ID']}&redirect_uri={$redirect}&response_type=code&scope=snsapi_userinfo&state=opensns#wechat_redirect";
        //                 redirect($url);
        //                 exit;
        //             }

        //         }
        //     }
        // }
    }
    /**
     * [jsonReturn description]
     * @Author   王衍生                      50634235@qq.com
     * @DateTime 2017-11-03T14:59:01+0800
     * @param    [type]                   $data           [description]
     * @param    [type]                   $err_code       [description]
     * @param    [type]                   $err_msg        [description]
     * @return   [type]                                   [description]
     */
    protected function jsonReturn($data = [], $err_code = 0, $err_msg = '')
    {   $json_data = [
                      'err_code' => $err_code,
                      'err_msg' => $err_msg,
                      'session_id' => session_id(),
                      'data' => $data,
                      ];
        exit(json_encode($json_data));
    }
    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $params 请求参数
     * @param  string $method 请求方法GET/POST
     * @return array  $data   响应数据
     */
    protected function http($url, $params, $method = 'GET', $header = array(), $multi = false){
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header
        );

        /* 根据请求类型设置特定参数 */
        switch(strtoupper($method)){
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $params = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL] = $url;
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new Exception('不支持的请求方式！');
        }
        
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if($error) throw new Exception('请求发生错误：' . $error);
        return  $data;
    }
    // public function is_weixin()
    // {
    //     if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
    //         return true;
    //     }
    //     return false;
    // }


    // public function setMobTitle($title)
    // {
    //     $this->_mob_seo['title'] = $title;
    //     $this->assign('mob_seo', $this->_mob_seo);
    // }

    // public function setMobKeywords($keywords)
    // {
    //     $this->_mob_seo['keywords'] = $keywords;
    //     $this->assign('mob_seo', $this->_mob_seo);
    // }

    // public function setMobDescription($description)
    // {
    //     $this->_mob_seo['description'] = $description;
    //     $this->assign('mob_seo', $this->_mob_seo);
    // }

    // public function setTopTitle($title)
    // {
    //     $this->_top_menu_list['center']['title'] = $title;
    //     $this->assign('top_menu_list', $this->_top_menu_list);
    // }


    // public function addLocalComment()
    // {
    //     $aPath = I('post.path', '', 'urldecode');
    //     $aPath = explode('/', $aPath);
    //     $aApp = $aPath[0];
    //     $aMod = $aPath[1];
    //     $aRowId = $aPath[2];

    //     $aUrl = I('post.this_url', '', 'text');
    //     $aExtra = I('post.extra', '', 'text');
    //     parse_str($aExtra);
    //     $field = empty($field) ? 'id' : $field;

    //     if (!is_login()) {
    //         $this->error('请登录后评论。');
    //     }
    //     $aCountModel = I('get.count_model', '', 'text');
    //     $aCountField = I('get.count_field', '', 'text');

    //     $aContent = I('content', '', 'text');
    //     $aUid = I('get.uid', '', 'intval');
    //     if (empty($aContent)) {
    //         $this->error('评论内容不能为空');
    //     }
    //     $commentModel = D('Addons://LocalComment/LocalComment');;

    //     $data = array('app' => $aApp, 'mod' => $aMod, 'row_id' => $aRowId, 'content' => $aContent, 'uid' => is_login(), 'ip' => get_client_ip(1));
    //     $res = $commentModel->addComment($data);


    //     if ($res) {
    //         D($aCountModel)->where(array('id' => $aRowId))->setInc($aCountField);

    //         $comment = $commentModel->getComment($res);
    //         $this->assign('localcomment', $comment);
    //         $html = $this->fetch('localcomment');

    //         if ($aUid) {
    //             $user = query_user(array('nickname', 'uid'), is_login());
    //             $title = $user['nickname'] . '评论了您';
    //             $message = '评论内容：' . $aContent;
    //             D('Common/Message')->sendMessage($aUid, $title, $message, $aUrl, array($field => $aRowId));
    //         }

    //         //通知被@到的人
    //         $uids = get_at_uids($aContent);
    //         $uids = array_unique($uids);
    //         $uids = array_subtract($uids, array($aUid));
    //         foreach ($uids as $uid) {
    //             $user = query_user(array('nickname', 'uid'), is_login());
    //             $title = $user['nickname'] . '@了您';
    //             $message = '评论内容：' . $aContent;

    //             D('Common/Message')->sendMessage($uid, $title, $message, $aUrl, array($field => $aRowId));
    //         }
    //         $result['status'] = 1;
    //         $result['data'] = $html;
    //         $result['info'] = '评论成功';
    //         $this->ajaxReturn($result);

    //     } else {
    //         $result['status'] = 0;
    //         $result['data'] = '';
    //         $result['info'] = '评论失败';
    //         $this->ajaxReturn($result);
    //     }
    // }


    // public function getLocalCommentList($path, $page = 1)
    // {
    //     $aPath = explode('/', $path);
    //     $aApp = $aPath[0];
    //     $aMod = $aPath[1];
    //     $aRowId = $aPath[2];
    //     $model = D('Addons://LocalComment/LocalComment');
    //     $map = array('app' => $aApp, 'mod' => $aMod, 'row_id' => $aRowId, 'status' => 1);
    //     $param['where'] = $map;
    //     $param['page'] = $page;
    //     $param['count'] = 10;

    //     $sort = modC($aMod . '_LOCAL_COMMENT_ORDER', 0, $aApp) == 0 ? 'desc' : 'asc';

    //     $param['order'] = 'create_time ' . $sort;

    //     $param['field'] = 'id';
    //     $list = $model->getList($param);
    //     $html = '';

    //     foreach ($list as &$v) {
    //         $comment = $model->getComment($v);
    //         $this->assign('localcomment', $comment);
    //         $html .= $this->fetch('Base/localcomment');
    //     }


    //     unset($v);
    //     if (IS_AJAX) {
    //         $this->ajaxReturn($html);
    //     } else {
    //         return $html;
    //     }

    // }


    // public function delLocalComment()
    // {
    //     $aId = I('post.id');
    //     $aCountModel = I('post.count_model', '', 'text');
    //     $aCountField = I('post.count_field', '', 'text');

    //     $model = D('Addons://LocalComment/LocalComment');

    //     $comment = $model->getComment($aId);
    //     if (empty($comment) || $aId <= 0) {
    //         $this->error('删除评论失败。评论不存在。');
    //     }
    //     if (!is_login()) {
    //         $this->error('请登陆后再操作！');
    //     }
    //     if (!check_auth('deleteLocalComment', $comment['uid'])) {
    //         $this->error('删除评论失败！权限不足');
    //     }

    //     $res = $model->deleteComment($aId);
    //     if ($res) {
    //         $aCountModel && $aCountField && D($aCountModel)->where(array('id' => $comment['row_id']))->setDec($aCountField);
    //         $this->success('删除成功');
    //     } else {
    //         $this->error('删除失败');
    //     }

    // }

} 