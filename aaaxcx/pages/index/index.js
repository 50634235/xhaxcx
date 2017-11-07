Page({

  /**
   * 页面的初始数据
   */
  data: {
    winWidth: 0,
    winHeight: 0,
    currentTab: 0, 
    // img:'../../images/west/west-1@2x.png'
    array:[{
      img:'../../images/west/west-1@2x.png',
      view1: '创新开发模式',
      view2: '打造未来之城',
      navig: '../../../indexDetails/indexDetails'
    },{
      img: '../../images/west/west-2@2x.png',
      view1: '青岛影视产业蓄势',
      view2: '中国“新影都”崛起',
      navig: '../../../indexDetails/indexDetails'
    },{
      img: '../../images/west/west-3@2x.png',
      view1: '西海岸发展集团全体员工',
      view2: '观看十九大开幕会',
      navig: '../../../indexDetails/indexDetails'
    }]
  },

  /**
   * 生命周期函数--监听页面加载
   */

  onLoad: function ( ) {
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
    if (this.data.currentTab === e.target.dataset.current) {
      return false;
    } else {
      that.setData({
        currentTab: e.target.dataset.current
      })
    }
  },
  // navig:function(){
  //   wx.navigateTo({
  //     url: '../../../indexDetails/indexDetails'
  //   })
  // },
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