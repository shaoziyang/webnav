# 2. 安装说明

## 环境要求

系统需要的资源非常低，只需要

- apache2/nginx 服务器，开启 rewrite 功能
- php 7.4 以上版本


### 通用版本

- 从 github 或 gitee 下载文件
- 将压缩文件解压到服务器根目录
- 打开浏览器，输入系统对应目录网址，进行初始化
- 新建导航分类，在分类中新建网址链接

### windows portable 版本

windows portable 版本自带 apache2 / php8 精简版，可以放在U盘或移动硬盘中使用。

- 从 github 或 gitee 下载对应文件
- 解压压缩文件到任意目录，可以放在U盘或移动硬盘中。
- 打开文件 `server/conf/httpd.conf`，修改 apache 服务器端口（`Listen 8800`，默认是 8800）。
- 先启动服务器，然后打开浏览器，就可以开始使用了。


