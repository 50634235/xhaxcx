// var order = ['list1','list2','list3','list4','list5']
Page({

  /**
   * 页面的初始数据
   */
  data: {
    toview: '100',
    currentTab: 1,
    resultZan: 1111,
    resultIcon1: '../../images/icon/icon_zan.png',
    resultIcon2: '../../images/icon/icon_zan_active.png',
    active: 1,
    color: '#999',
    array:[{
      imgs: '../../images/interact/interact_img_01.png',
      title: '西海岸生态观光园'
    },{
      imgs: '../../images/interact/interact_img_02.png',
      title: '西海岸生态观光园'
    },{
      imgs: '../../images/interact/interact_img_03.png',
      title: '西海岸生态观光园'
    },{
      imgs: '../../images/interact/interact_img_04.png',
      title: '西海岸生态观光园'
    },{
      imgs: '../../images/interact/interact_img_05.png',
      title: '西海岸生态观光园'
    }]
  },
  clickme:function(e){
    var resultNum = this.data.resultZan;
    var active = e.target.dataset.active;
    if (this.data.active == active){
      resultNum ++;
      this.setData({
        active: 2,
        resultZan: resultNum ,
        color: '#00b0ec'
      })
    }else{
      resultNum--;
      this.setData({
        active: 1,
        resultZan: resultNum,
        color: '#999'
      })
    }
    console.log(resultNum)
   
   
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

