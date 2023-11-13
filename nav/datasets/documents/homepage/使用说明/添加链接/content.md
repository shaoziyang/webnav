# 3.2 添加链接

作为网址导航，最重要的就是添加各种网址和网址管理。

<b>随心远航</b>系统没有独立的网址管理界面，需要通过手工方式编写网址。虽然稍显复杂，但是也带来了最大的灵活性，可以随意设置链接的样式、大小、分类、外观、边框、间距、颜色、透明度、渐变等等，能想出来的功能基本都能实现，限制你的只有想象力。即使用管理界面，网址也需要一个个添加，网址多了也麻烦。手工方式看起来麻烦，但是可以批量复制，其实也不困难。

先看看几个不同样式的链接：

<b>文本方式</b>

<a href="">文本链接1</a> 
<a href="">文本链接2</a> 
<a href="">文本链接3</a> 

<b>普通按钮</b>

<a class="btn" href="">普通按钮1</a> 
<a class="btn" href="">普通按钮2</a> 
<a class="btn" style="background-color:#cc0000;color:#ffffff;border-radius:19px;" href="">普通按钮3</a>

<b>各种自定义按钮</b>

<a class="sxyhButton_01" href="">按钮1</a>
<a class="sxyhButton_01" style="background-color:#cc0000;	color:#ffffff;" href="">按钮2</a>
<a class="sxyhButton_01" style="background-color:#80CC80;	color:#008f0f;	border-radius:4px;	border:2px solid #008800;" href="">按钮3</a>
<br>
<a class="sxyhButton_02" style="box-shadow: 3px 4px 0px 0px #899599;	background:linear-gradient(to bottom, #ededed 5%, #bab1ba 100%);	background-color:#ededed;	border-radius:15px;	border:1px solid #d6bcd6;	color:#3a8a9e;	text-shadow:0px 1px 0px #e1e2ed;" href="">按钮4</a>
<a class="sxyhButton_02" style="background-color:#a73f2d;	border:1px solid #241d13;box-shadow:inset 0px 34px 0px -15px #b54b3a;text-shadow:0px -1px 0px #7a2a1d;" href="">按钮5</a>
<a class="sxyhButton_02" style="box-shadow: 0px 1px 0px 0px #f0f7fa;background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);background-color:#33bdef;	border-radius:6px;border:1px solid #057fd0;	text-shadow:0px -1px 0px #5b6178;color:#ffffff;" href="">按钮6</a>
<br>
<a class="sxyhButton_01" style="background-color:transparent;	color:#2a42bd; border:1px solid #2a42bd;" href="">透明按钮</a>
<a class="sxyhButton_01" style="background-color:transparent;	color:#008800; border:2px solid #008800;" href="">透明按钮</a>
<br>
<a class="sxyhButton_01" style="padding-right: 30px;" target="_blank" href=""><img src="../../images/ico/sohu.png" height="20" style="float: left;padding-left:20px;"/>图标按钮1</a>
<a class="sxyhButton_01" style="padding-right: 30px;background-color:#008800;color:#ffffff" target="_blank" href=""><img src="https://www.126.com/favicon.ico" height="20" style="float: left;padding-left:20px;"/>图标按钮2</a>
---
<a href="">文本链接</a>，最简单的方式，使用下面定义：
```
<a target="_blank" href="网址">说明</a>
```
- `target="_blank"` 代表在新的浏览器窗口打开链接
- `href="网址"`处将网址替换为需要的地址，如 https://github.com
- `说明` 是链接的说明，可以是任何文字

<a class="btn">按钮链接</a>，使用系统定义的按钮类
```
<a class="btn" target="_blank" href="网址">说明</a>
```
- `class="btn"` ，代表这是一个按钮，其它和文本链接一样。
- 可以用 style 参数修改按钮属性，方法参考下面说明。

<a class="sxyhButton_02" style="box-shadow:inset 0px 1px 0px 0px #bee2f9;	background:linear-gradient(to bottom, #63b8ee 5%, #468ccf 100%);	background-color:#63b8ee;	border-radius:5px;	border:1px solid #3866a3;	text-shadow:0px 1px 0px #7cacde;" href="">自定义按钮</a>，先在css中定义一个类别，然后使用它设置链接。
<small>下面使用的sxyhButton_02已经在user.css中定义，基本从属性的名称就可以看出功能，这里就不做介绍了。需要深入了解时可以到网上搜索一下。</small>

```
.sxyhButton_02 {
	background-color:#579438;
	border-radius:4px;
	border:1px solid #4b8f29;;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:宋体;
	font-size:16px;
	font-weight:bold;
	text-decoration:none;
	text-align: center;
	margin: 5px;
	width: 120px; 
	height: 28px;
	line-height: 28px;
}
.sxyhButton_02:hover {
	background-color:#579438;
}
.sxyhButton_02:active {
	position:relative;
	top:1px;
}
```
直接使用，就可以显示默认的效果，如
`<a class="sxyhButton_02">按钮</a>`
<a class="sxyhButton_02">按钮</a>

如果需要修改某一属性，单独在链接里修改，如设置按钮颜色是黑底白字：
`<a class="sxyhButton_02" style="background-color:#000000;color:#ffffff">按钮</a>`
<a class="sxyhButton_02" style="background-color:#000000;color:#ffffff">按钮</a>

透明按钮是设置背景属性为`background-color:transparent;`，如：
`<a class="sxyhButton_02" style="background-color:transparent;color:#0000ff">按钮</a>`
<a class="sxyhButton_02" style="background-color:transparent;color:#0000ff">按钮</a>

带图标按钮，就是给同时显示一个图片文件，并调整好位置。图片需要先准备好，也可以动态从网上获取，比如获取网站的`favicon.ico`文件，这样虽然不用保存文件，但是会降低打开速度。
```
<a class="sxyhButton_01" style="padding-right: 30px;" target="_blank" href=""><img src="../../images/ico/zhibo8.png" height="24" style="float: left;padding-left:20px;padding-top:4px"/>图标按钮</a>
<a class="sxyhButton_01" style="padding-right: 30px;background-color:#ffffff;color:#000000" target="_blank" href=""><img src="https://www.taobao.com/favicon.ico" height="24" style="float: left;padding-left:20px;padding-top:4px"/>淘宝图标</a>
```
<a class="sxyhButton_01" style="padding-right: 30px;" target="_blank" href=""><img src="../../images/ico/zhibo8.png" height="24" style="float: left;padding-left:20px;padding-top:4px"/>图标按钮</a>
<a class="sxyhButton_01" style="padding-right: 30px;background-color:#ffffff;color:#000000" target="_blank" href=""><img src="https://www.taobao.com/favicon.ico" height="24" style="float: left;padding-left:20px;padding-top:4px"/>淘宝图标</a>

如果觉得设置 style 有点困难，试试这个[可视化 css 按钮生成器](https://www.cssbuttongenerator.com/)（[汉化版](https://xuecss.cn/anniu/)）。