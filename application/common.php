<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 成功提示函数
 * @param  string $msg 提示信息
 * @param  string $url 跳转地址
 * @param  integer $url 延时时间
 * @param  string $note 提示描述
 */
function win($msg, $url, $time = 2333, $note = "页面跳转中")
{
    $content =  "<link rel='stylesheet'href='//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css'/><script src='//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js'></script><script>window.onload=myfun;countDown();function myfun(){swal('$msg','$note','success');delayURL(\"$url\",$time);document.querySelector('.confirm').onclick=function(){location.href='$url'}};function delayURL(url,time){setTimeout(\"top.location.href='\" + url + \"'\",time)}</script>";
    abort(\think\Response::create($content, 'html'));

}

/**
 * 失败提示函数
 * @param  string $msg 提示信息
 * @param  integer $time 延时时间
 * @param  string $note 提示描述
 */
function fail($msg, $time = 2333, $note = "页面跳转中")
{
    $content =  "<link rel='stylesheet'href='//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css'/><script src='//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js'></script><script>window.onload=myfun;function myfun(){swal('$msg','$note','error');delayURL(3000);document.querySelector('.confirm').onclick=function(){window.history.back()}};function delayURL(time){setTimeout(\"window.history.back();\",$time)};</script>";
    abort(\think\Response::create($content, 'html'));
}

/**
 * @param $str 要加密的子串
 * @return string 双层md5加密后的子串
 */
function encrypt($str)
{
    return md5(md5($str));
}
