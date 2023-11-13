# 3.4 设置背景图片

系统默认每天随机更换一次背景图片，背景图片存放在<b><font color=BLUE>随心导航</font></b>目录下的 `images` 文件夹中。可以将任意 jpg、png、webp 图形文件复制到 `images` 文件夹中，不需要特别命名或设置，系统会自动定时进行更换。

## 改变更新频率

修改 `scripts/wallpaper/wallpaper.php` 文件，将文件起始位置处的 `$DT = 86400;` 中的数字改为其它值。这个数字代表了图片更新时间（秒），86400就是 24 x 3600，也就是一天。改为 600 就是每10分钟改变一次，改为 3600 就是每小时改变一次，如果修改为 0，就代表禁止自动更换背景。

## 改变指定页面背景

上面的自动更换背景是针对所有页面的。如果希望指定特定页面的背景，可以编辑页面文件，在文件的最后加上下面代码（注意 `<style>` 前面不能有空格）。

```
<style>
body {
  background-image: url(目录/图片文件名);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
</style>
```

图片可以是网络文件，也可以是本地文件。如果文件在导航系统目录下，可以用相对目录，如 `background-image: url(../../images/bg2.jpg);` （不同目录下文件的相对位置不同，请根据具体目录设置，本文件所在位置是 `homepage/使用说明`，因此相对目录是`../../`）。

## 取消背景图片

先将更新频率设置为 0，然后<b><font color=RED>删除</font></b> `styles/wallpaper.css` 文件（恢复更新后会自动生成），清理浏览器缓存后刷新页面。

<style>
body {
  background-image: url(../../images/bg2.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
</style>


