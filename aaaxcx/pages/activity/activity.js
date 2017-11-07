Page({

  /**
   * 页面的初始数据
   */
  data: {
    winWidth: 0,
    winHeight: 0,
    currentTab: 0,
    array:[{
      imgs: ['../../images/activity/activity_img_01.png'],
      view1: '915吃在青岛美食评选活动',
      view2:'投票中',
      view3:'263',
      navig:'../../../activityDet/activityDet'
    },{
      imgs: ['../../images/activity/activity_img_02.png'],
      view1: '万圣节狂欢趴体！众多好礼等你来拿！',
      view2: '报名中',
      view3: '1063',
      navig: '../../../activityDet/activityDet'
    },{
      imgs: ['../../images/activity/activity_img_03.png'],
      view1: '西海岸生态观光园主题开放日',
      view2: '报名中',
      view3: '996',
      navig: '../../../activityDet/activityDet'
    }]
  },

  /**
   * 生命周期函数--监听页面加载
   */

  onLoad: function () {
    var that = this;

    /** 
     * 获取系统信息 
     */
    wx.getSystemInfo({

      success: function (res) {
        that.setData({
          winWidth: res.windowWidth,
          winHeight: res.windowHeight
        });
      }

    });
  },
  bindChange: function (e) {

    var that = this;
    console.log(e)
    that.setData({ currentTab: e.detail.current });

  },
  /** 
   * 点击tab切换 
   */
  swichNav: function (e) {

    var that = this;
    // console.log(this)
    // console.log(e)
    if (this.data.currentTab === e.target.dataset.current) {
      return false;
    } else {
      that.setData({
        currentTab: e.target.dataset.current
      })
    }
  },

  onLoad: function (options) {

  },


  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})
