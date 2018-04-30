<p align="center"><img src="https://www.ynshuke.com/wp-content/uploads/2017/02/3-2.png"></p>

<p align="center">
<a href="#"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="#"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="#"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="#"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## 云南蠡导文化发展有限公司小程序后端服务
  采用Laravel框架作为该小程序的后台服务开发。由小程序发起get或者post请求，DNS讲域名解析到服务器地址，交由nginx解析到larave框架的统一入口文件（./public/index.php），路由将相关链接指向相应的中间件或控制器，控制器对数据进行处理并和数据库交互。返回用户需要的信息（类似API）。

## 支持的接口

- [用户登录接口](https://devapi.ynshuke.com/userLogin)
- [用户注册接口](https://devapi.ynshuke.com/postReg)
- [用户信息获取接口](https://devapi.ynshuke.com/getUser)
- [文章列表获取接口（or单个文章）](https://devapi.ynshuke.com/getArticle)
- [用户地址处理接口](https://devapi.ynshuke.com/postAdd)
- [获取商品分类列表接口](https://devapi.ynshuke.com/getCmcf)
- [获取商品列表接口（or单个商品）](https://devapi.ynshuke.com/getComm)
- [会员信息登记接口](https://devapi.ynshuke.com/postVip)
- [获取会员信息接口](https://devapi.ynshuke.com/getVip)
- [小程序图片上传及管理接口](https://devapi.ynshuke.com/connectPic)
- [小程序流媒体管理接口](https://devapi.ynshuke.com/smMedia)
- [小程序支付管理接口](https://devapi.ynshuke.com/wxPay)

## 请求响应规范
- **获取用户信息**
Laravel控制器从数据库中取到数据返回一个obj对象型数据，return一个由obj对象转换来的数组。
 ``` xml
array(11) { 
    ["id"]=> int(1) 
    ["v_id"]=> NULL 
    ["sp_id"]=> NULL 
    ["user_login"]=> string(5) "sixos" 
    ["user_passwd"]=> string(11) "jiang221716" 
    ["user_nicename"]=> string(5) "sixos" 
    ["user_email"]=> string(14) "sixos@sixos.io" 
    ["user_regdate"]=> string(19) "2018-04-29 12:55:29" 
    ["user_status"]=> int(1) 
    ["user_vip_number"]=> int(587) 
    ["remark"]=> string(24) "这是一条测试数据" 
}
```
