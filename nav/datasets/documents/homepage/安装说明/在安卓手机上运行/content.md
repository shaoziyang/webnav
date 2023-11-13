# 2.1 在安卓手机上运行

在安卓手机上运行随心导航，可以作为随身服务器，小巧方便实用。

- 先安装 [Termux](https://termux.dev/en/)
	- 正常情况需要安卓7.0以上版本，安卓5/6上参考[官方wiki说明](https://github.com/termux/termux-app/wiki/Termux-on-android-5-or-6)安装
- 在 Termux 中安装 ssh，方便通过远程访问（在pc上输入命令）
	- `apt install openssh`
- 在 Termnux 中安装系统服务，方便管理
	- `apt install runit termux-services busybox`
- 先安装 apache2 服务器
	- 安装：`apt install apache2`
	- 配置：`nano $PREFIX/etc/apache2/httpd.conf`
	- 启动服务器：`httpd`
	- 其它：

```
# 作为服务
sv up httpd
sv-enable httpd

# 停止服务器
sv down httpd
```

- 再安装 php
	- `apt install php php-apache php-fpm`
	- 如果需要配置服务器参数：`nano $PREFIX/lib/php.ini`
- 再次配置 apache（`nano $PREFIX/etc/apache2/httpd.conf`），添加php支持
	- 载入 php 解释器（添加一行）：`LoadModule php_module libexec/apache2/libphp.so`
	- 添加 php 文件名解析，找到`<IfModule dir_module>`，添加 `index.php`：
```
<IfModule dir_module>
    DirectoryIndex index.html index.php
</IfModule>
```
	- 添加 php 文件类别（添加一行）：`AddType application/x-httpd-php .php`
	- 重启httpd服务（`sv restarrt httpd`）
- 解压并复制**随心远航**系统到 apache2 服务器根目录下（`DocumentRoot`）
- 运行浏览器，打开对应网址，进行参数配置
- 可以通过 tailscale 实现设备间通过名称方式访问（MagicDNS），避免不同网络下ip地址的变化
- 可以通过 cpolar 等软件实现内网穿透，实现外网访问
