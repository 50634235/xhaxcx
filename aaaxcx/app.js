// app.js
App({
  d: {
    hostUrl: 'http://www.opsns.com',
    hostImg: 'http://img.ynjmzb.net',
    hostVideo: 'http://zhubaotong-file.oss-cn-beijing.aliyuncs.com',
    uid: 1,
    appId:"wx16231ad9090cd2ca",
    appKey:"09eda3f19175588456f56639e2379777",
    ceshiUrl:'http://www.opsns.com',
  },
  onLaunch: function (options) {
    // console.log(options.scene);
    //调用API从本地缓存中获取数据
    var logs = wx.getStorageSync('logs') || []
    logs.unshift(Date.now())
    wx.setStorageSync('logs', logs);
    //login
    this.getUserInfo();
  },
  getUserInfo:function(cb){
    var that = this
    if(this.globalData.userInfo){
      typeof cb == "function" && cb(this.globalData.userInfo)
    }else{
      //调用登录接口
      wx.login({
        success: function (res) {
          var code = res.code;
          //get wx user simple info
          wx.getUserInfo({
            success: function (res) {
              that.globalData.userInfo = res.userInfo;
              console.log(res.userInfo);
              typeof cb == "function" && cb(that.globalData.userInfo);
              //get user sessionKey
              //get sessionKey
              that.onLoginUser(code, res);

            }
          });
        }
      });
    }
  },

  onLoginUser:function(code , userInfo){

    var that = this;
    wx.request({
      url: that.d.ceshiUrl + '/Wxxcx/Member/login.html',
      method:'post',
      data: {
        code: code,
        encryptedData: userInfo.encryptedData,
        iv: userInfo.iv,
      },
      header: {
        'Content-Type':  'application/x-www-form-urlencoded'
      },
      success: function (res) {
        console.log (res);
        var data = res.data;
        if(data.err_code !==0 ){
          wx.showToast({
            title: data.err_msg,
            duration: 2000
          });
          return false;
        }

        that.globalData.userInfo['sessionId'] = data.session_id;
        that.globalData.userInfo['openid'] = data.data.openid;
        that.globalData.userInfo['uid'] = data.data.uid;
        // that.globalData.userInfo['NickName'] = data.NickName;
        // that.globalData.userInfo['HeadUrl'] = data.avatarUrl;
        // that.onLoginUser();
      },
      fail:function(e){
        wx.showToast({
          title: '网络异常！err:getsessionkeys',
          duration: 2000
        });
      },
    });
  },
  // 是否绑定手机号
  getOrBindTelPhone:function(returnUrl){
    var user = this.globalData.userInfo;
    if(!user.tel){
      wx.navigateTo({
        url: 'pages/binding/binding'
      });
    }
  },

  globalData:{
    userInfo:null
  },

  onPullDownRefresh: function (){
    wx.stopPullDownRefresh();
  }

});





