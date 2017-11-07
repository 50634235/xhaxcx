// pages/activity/activityDet/activityDet.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    resultZan: 226,
    resultIcon1: '../../../images/icon/indexDet-1@2x.png',
    resultIcon2: '../../../images/icon/icon_zan_active.png',
    activeDianzan: 1,
    colorDianzan: '#333',
    resultShou: '收藏',
    resultIcon3: '../../../images/icon/indexDet-3@2x.png',
    resultIcon4: '../../../images/icon/icon_my4.png',
    activeShoucang: 1,
    colorShoucang: '#333',
  },
  dianzan: function (e) {
    var resultNum = this.data.resultZan;
    var active = e.target.dataset.active;
    if (this.data.activeDianzan == active) {
      resultNum++;
      this.setData({
        activeDianzan: 2,
        resultZan: resultNum,
        colorDianzan: '#00b0ec'
      })
    } else {
      resultNum--;
      this.setData({
        activeDianzan: 1,
        resultZan: resultNum,
        colorDianzan: '#333'
      })
    }
  },
  pinglun: function () {
    console.log(2)
  },
  shoucang: function (e) {
    var resultNum = this.data.resultShou;
    var active = e.target.dataset.active;
    if (this.data.activeShoucang == active) {
      this.setData({
        activeShoucang: 2,
        resultShou: '已收藏',
        colorShoucang: '#00b0ec'
      })
    } else {
      this.setData({
        activeShoucang: 1,
        resultShou: '收藏',
        colorShoucang: '#333'
      })
    }
  },
  toupiao:function(){
    console.log(4)
  },
  /**
   * 生命周期函数--监听页面加载
   */
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