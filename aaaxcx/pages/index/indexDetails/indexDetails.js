// pages/index/indexDetails/indexDetails.js
var inText1 = '碧海蓝天、绿墙红瓦、清静慵懒\n这是我对青岛最深的印象\n八大关、龙口路、劈柴院\n金沙滩、栈桥、教堂、风情街\n让这座城市分外迷人\n而夏天，却是青岛最好的季节\n温柔凉爽的海风、新鲜可口的啤酒\n更有无数让人垂涎的海鲜小吃\n所以，这个夏天去青岛吧\n喝着啤酒吹着海风吃大排档'
var inText2 = '这一定是青岛最大的特色\n跟平日喝的灌装啤酒不一样\n要的就是一个新鲜\n原汁原味\n去青岛一定要去打一袋袋装啤酒\n边走边喝\n这才是夏天应该有的模样'
var inText3 = '作为青岛十大小吃之一\n辣炒蛤蜊是夏天每个餐桌前必不可少的美食\n青岛的蛤蜊肥嫩鲜美\n入口不辣，但和着酱汁\n鲜香十足，令人回味无穷'
Page({

  /**
   * 页面的初始数据
   */
  data: {
    txt1: inText1,
    txt2: inText2,
    txt3: inText3,
    array: [{
      imgs:'../../../images/icon/indexDet-1@2x.png',
      num: '226',
      taps: 'dianzan'
    },{
      imgs: '../../../images/icon/indexDet-2@2x.png',
      num: '1238',
      taps: 'pinglun'
    },{
      imgs: '../../../images/icon/indexDet-3@2x.png',
      num: '226',
      taps: 'shoucang'
    },{
      imgs: '../../../images/icon/indexDet-4@2x.png',
      num: '226',
      taps: 'zhuanfa'
    }],
  },

  /**
   * 生命周期函数--监听页面加载
   */
  dianzan:function(){
    console.log(1)
  },
  pinglun: function () {
    console.log(2)
  },
  shoucang: function () {
    console.log(3)
  },
  zhuanfa: function () {
    console.log(4)
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