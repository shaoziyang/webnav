# 🔍搜索
<small>无需打开网站，直接从本地开始搜索。</small><br>

<p><b>通用搜索</b></p>
<div class="form-container">
<form action="https://cn.bing.com/search" target="_blank"><input autocomplete="on" maxlength="100" size="15" name="q" type="texts" placeholder="请输入搜索关键词" /> <input type="submit" class="sxyh_search" value="bing" /></form>
</div>

<div class="form-container">
<form id="form" action="https://www.ecosia.org/search" target="_blank"><input id="kw" autocomplete="on" size="14" maxlength="100" name="q" type="texts" placeholder="请输入搜索关键词" /> <input type="submit" class="sxyh_search" value="Ecosia" /></form>
</div>

<div class="form-container">
<form id="form" action="https://www.baidu.com/s" target="_blank"><input id="kw" autocomplete="on" size="15" maxlength="100" name="wd" type="texts" placeholder="请输入搜索关键词" /> <input type="submit" class="sxyh_search" value="百度" /></form>
</div>

<div class="form-container">
<form id="form" action="https://www.so.com/s" target="_blank"><input id="kw" autocomplete="on" size="12" maxlength="100" name="q" type="texts" placeholder="请输入搜索关键词" /> <input type="submit" class="sxyh_search" value="360搜索" /></form>
</div>

<div class="form-container">
<form id="form" action="https://yandex.com/search" target="_blank"><input id="kw" autocomplete="on" size="13" maxlength="100" name="text" type="texts" placeholder="请输入搜索关键词" /> <input type="submit" class="sxyh_search" value="yandex" /></form>
</div>

<div class="form-container">
<form action="https://baike.baidu.com/search" target="_blank"><input autocomplete="on" size="11" maxlength="100" name="word" type="search1" placeholder="百科" /> <input type="submit" class="sxyh_search" value="百度百科" /></form>
</div>

<div class="form-container">
<form action="https://www.zhihu.com/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="q" type="search1" placeholder="百科" /> <input type="submit" class="sxyh_search" value="知乎" /></form>
</div>

<p><b>购物</b></p>
<div class="form-container">
<form action="https://search.jd.com/Search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="keyword" type="search1" placeholder="商品" /> <input type="submit" class="sxyh_search" value="京东" /></form>
</div>

<div class="form-container">
<form action="https://s.taobao.com/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="q" type="search1" placeholder="商品" /> <input type="submit" class="sxyh_search" value="淘宝" /></form>
</div>

<div class="form-container">
<form action="https://gwdang.com/search" target="_blank"><input autocomplete="on" size="13" maxlength="100" name="keyword" type="s_product" placeholder="商品" /> <input type="submit" class="sxyh_search" value="购物党" /></form>
</div>

<div class="form-container">
<form action="https://search.smzdm.com" target="_blank"><input autocomplete="on" size="9" maxlength="100" name="s" type="search1" placeholder="什么值得买" /> <input type="submit" class="sxyh_search" value="什么值得买" /></form>
</div>

<p><b>资源搜索</b></p>
<div class="form-container">
<form action="https://www.alipansou.com/search" target="_blank"><input autocomplete="on" maxlength="200" name="k" type="search1" size="15" placeholder="资源名" /> <input type="submit" class="sxyh_search" value="猫盘" /></form>
</div>

<div class="form-container">
<form action="https://feiyu100.cn/search" target="_blank"><input autocomplete="on" maxlength="200" name="q" type="search1" size="12" placeholder="资源名" /> <input type="submit" class="sxyh_search" value="飞鱼盘搜" /></form>
</div>

<div class="form-container">
<form action="https://www.iconfinder.com/search" target="_blank"><input autocomplete="on" maxlength="200" name="q" type="search1" size="10" placeholder="图标" /> <input type="submit" class="sxyh_search" value="IconFinder" /></form>
</div>

<div class="form-container">
<form action="" onsubmit="searchPexels(event)"><input autocomplete="on" size="14" maxlength="100" name="q" type="search1" placeholder="高质量图片" /> <input type="submit" class="sxyh_search" onclick="" value="Pexels" /></form>
</div>
<script>
function searchPexels(event) {
  event.preventDefault(); // 阻止表单默认的提交行为
  var formData = new FormData(event.target); // 创建一个新的FormData对象，它包含了表单的所有数据
  window.open('https://www.pexels.com/zh-cn/search/'+formData.get('q'));
}
</script>

<div class="form-container">
<form action="https://www.pdfdrive.com/search" target="_blank"><input autocomplete="on" maxlength="200" name="q" type="search1" size="16" placeholder="pdf" /> <input type="submit" class="sxyh_search" value="PDF" /></form>
</div>

<p><b>软件</b></p>
<div class="form-container">
<form action="https://filehippo.com/search/" target="_blank"><input autocomplete="on" size="12" maxlength="100" name="q" type="search1" placeholder="software" /> <input type="submit" class="sxyh_search" value="filehippo" /></form>
</div>

<div class="form-container">
<form action="https://alternativeto.net/browse/search" target="_blank"><input autocomplete="on" size="8" maxlength="100" name="q" type="search1" placeholder="软件名" /> <input type="submit" class="sxyh_search" value="AlternativeTo" /></form>
</div>

<div class="form-container">
<form action="https://apkpremier.com/search" target="_blank"><input autocomplete="on" size="9" maxlength="100" name="q" type="search1" placeholder="安卓" /> <input type="submit" class="sxyh_search" value="APKpremier" /></form>
</div>

<div class="form-container">
<form action="https://sourceforge.net/directory" target="_blank"><input autocomplete="on" size="9" maxlength="100" name="q" type="search1" placeholder="搜索" /> <input type="submit" class="sxyh_search" value="SourceForge" /></form>
</div>

<div class="form-container">
<form action="https://baoku.360.cn/soft/search" target="_blank"><input autocomplete="on" size="12" maxlength="100" name="kw" type="search1" placeholder="软件" /> <input type="submit" class="sxyh_search" value="360软件" /></form>
</div>

<div class="form-container">
<form action="" onsubmit="searchTX(event)"><input autocomplete="on" size="11" maxlength="100" name="q" type="search1" placeholder="软件" /> <input type="submit" class="sxyh_search" onclick="" value="腾讯软件" /></form>
</div>
<script>
function searchTX(event) {
  event.preventDefault(); // 阻止表单默认的提交行为
  var formData = new FormData(event.target); // 创建一个新的FormData对象，它包含了表单的所有数据
  window.open('https://pc.qq.com/search.html#!keyword='+formData.get('q'));
}
</script>

<div class="form-container">
<form action="" onsubmit="searchhuajun(event)"><input autocomplete="on" size="12" maxlength="100" name="q" type="search1" placeholder="软件" /> <input type="submit" class="sxyh_search" onclick="" value="华军软件" /></form>
</div>
<script>
function searchhuajun(event) {
  event.preventDefault(); // 阻止表单默认的提交行为
  var formData = new FormData(event.target); // 创建一个新的FormData对象，它包含了表单的所有数据
  window.open('https://www.onlinedown.net/search?searchname='+formData.get('q')+'&button=%E6%90%9C%E7%B4%A2');
}
</script>

<div class="form-container">
<form action="" onsubmit="searchPortableApp(event)"><input autocomplete="on" size="9" maxlength="100" name="q" type="search1" placeholder="soft" /> <input type="submit" class="sxyh_search" onclick="" value="PortableApp" /></form>
</div>
<script>
function searchPortableApp(event) {
  event.preventDefault(); // 阻止表单默认的提交行为
  var formData = new FormData(event.target); // 创建一个新的FormData对象，它包含了表单的所有数据
  window.open('https://portableapps.com/search/node/'+formData.get('q'));
}
</script>

<div class="form-container">
<form action="https://portableappk.com/" target="_blank"><input autocomplete="on" size="7" maxlength="100" name="s" type="search1" placeholder="软件" /> <input type="submit" class="sxyh_search" value="PortableAppK" /></form>
</div>

<div class="form-container">
<form action="https://www.ghxi.com/" target="_blank"><input autocomplete="on" size="12" maxlength="100" name="s" type="search1" placeholder="软件" /> <input type="submit" class="sxyh_search" value="果核剥壳" /></form>
</div>

<div class="form-container">
<form action="https://www.appinn.com/" target="_blank"><input autocomplete="on" size="12" maxlength="100" name="s" type="search1" placeholder="软件" /> <input type="submit" class="sxyh_search" value="小众软件" /></form>
</div>

<p><b>开发</b></p>
<div class="form-container">
<form class="form" action="https://search.gitee.com/?" target="_blank" method="get"><input id="search-input" class="input" size="14" autocomplete="on" name="q" type="text1" placeholder="搜索或者跳转到..." /> <input type="submit" class="sxyh_search" value="gitee" /></form>
</div>

<div class="form-container">
<form action="https://github.com/search" target="_blank"><input autocomplete="on" size="13" maxlength="100" name="q" type="search1" placeholder="project" /> <input type="submit" class="sxyh_search" value="github" /></form>
</div>

<div class="form-container">
<form action="https://www.gitlogs.com/most_popular" target="_blank"><input autocomplete="on" size="12" maxlength="100" name="topic" type="search1" placeholder="project" /> <input type="submit" class="sxyh_search" value="Gitlogs" /></form>
</div>

<div class="form-container">
<form action="https://www.runoob.com/" target="_blank"><input autocomplete="on" size="10" maxlength="100" name="s" type="search1" placeholder="搜索" /> <input type="submit" class="sxyh_search" value="菜鸟教程" /></form>
</div>

<div class="form-container">
<form action="https://kaifa.baidu.com/searchPage" target="_blank"><input autocomplete="on" size="9" maxlength="100" name="wd" type="search1" placeholder="搜索" /> <input type="submit" class="sxyh_search" value="开发者搜索" /></form>
</div>

<div class="form-container">
<form action="https://goobe.io/search.aspx" target="_blank"><input autocomplete="on" size="13" maxlength="100" name="k" type="search1" placeholder="搜索" /> <input type="submit" class="sxyh_search" value="Goobe" /></form>
</div>

<div class="form-container">
<form action="https://www.thefreecountry.com/search" target="_blank"><input autocomplete="on" size="6" maxlength="100" name="q" type="search1" placeholder="" /> <input type="submit" class="sxyh_search" value="thefreecountry" /></form>
</div>

<p><b>其它搜索</b></p>
<div class="form-container">
<form action="https://www.emojiall.com/zh-hans/search_results" target="_blank"><input autocomplete="on" size="14" maxlength="100" name="keywords" type="search1" placeholder="emoji" /> <input type="submit" class="sxyh_search" value="emoji" /></form>
</div>

<div class="form-container">
<form action="https://emojis.wiki/search" target="_blank"><input autocomplete="on" size="10" maxlength="100" name="s" type="search1" placeholder="emoji" /> <input type="submit" class="sxyh_search" value="emojis.wiki" /></form>
</div>

<div class="form-container">
<form action="https://www.slant.co/search" target="_blank"><input autocomplete="on" size="14" maxlength="100" name="query" type="search1" placeholder="What are the best" /> <input type="submit" class="sxyh_search" value="Slant" /></form>
</div>

<div class="form-container">
<form action="https://search.zol.com.cn/s/all.php" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="keyword" type="search1" placeholder="中关村在线" /> <input type="submit" class="sxyh_search" value="ZOL" /></form>
</div>

<div class="form-container">
<form action="https://www.163.com/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="keyword" type="search1" placeholder="网易" /> <input type="submit" class="sxyh_search" value="网易" /></form>
</div>

<div class="form-container">
<form action="https://new.qq.com/search" target="_blank"><input autocomplete="on" size="13" maxlength="100" name="query" type="search1" placeholder=“腾讯新闻" /> <input type="submit" class="sxyh_search" value="腾讯网" /></form>
</div>

<div class="form-container">
<form action="https://so.toutiao.com/search" target="_blank"><input autocomplete="on" size="11" maxlength="100" name="keyword" type="search1" placeholder=“今日头条" /> <input type="submit" class="sxyh_search" value="头条搜索" /></form>
</div>

<div class="form-container">
<form action="https://info.support.huawei.com/info-finder/encyclopedia/zh/detail" target="_blank"><input autocomplete="on" size="10" maxlength="100" name="keyword" type="search1" placeholder=“关键字" /> <input type="submit" class="sxyh_search" value="华为IP百科" /></form>
</div>

<div class="form-container">
</div>


<script>
    function snow() {
        //  1、定义一片雪花模板
        var flake = document.createElement('div');
        // 雪花字符 ❄❉❅❆✻✼❇❈❊✥✺
        flake.innerHTML = '❆';
        flake.style.cssText = 'position:absolute;color:#fff;';

        //获取页面的高度 相当于雪花下落结束时Y轴的位置
        var documentHieght = window.innerHeight;
        //获取页面的宽度，利用这个数来算出，雪花开始时left的值
        var documentWidth = window.innerWidth;

        //定义生成一片雪花的毫秒数
        var millisec = 100;
        //2、设置第一个定时器，周期性定时器，每隔一段时间（millisec）生成一片雪花；
        setInterval(function() { //页面加载之后，定时器就开始工作
            //随机生成雪花下落 开始 时left的值，相当于开始时X轴的位置
            var startLeft = Math.random() * documentWidth;

            //随机生成雪花下落 结束 时left的值，相当于结束时X轴的位置
            var endLeft = Math.random() * documentWidth;

            //随机生成雪花大小
            var flakeSize = 5 + 20 * Math.random();

            //随机生成雪花下落持续时间
            var durationTime = 4000 + 7000 * Math.random();

            //随机生成雪花下落 开始 时的透明度
            var startOpacity = 0.7 + 0.3 * Math.random();

            //随机生成雪花下落 结束 时的透明度
            var endOpacity = 0.2 + 0.2 * Math.random();

            //克隆一个雪花模板
            var cloneFlake = flake.cloneNode(true);

            //第一次修改样式，定义克隆出来的雪花的样式
            cloneFlake.style.cssText += `
                    left: ${startLeft}px;
                    opacity: ${startOpacity};
                    font-size:${flakeSize}px;
                    top:-25px;
                        transition:${durationTime}ms;
                `;

            //拼接到页面中
            document.body.appendChild(cloneFlake);

            //设置第二个定时器，一次性定时器，
            //当第一个定时器生成雪花，并在页面上渲染出来后，修改雪花的样式，让雪花动起来；
            setTimeout(function() {
                //第二次修改样式
                cloneFlake.style.cssText += `
                            left: ${endLeft}px;
                            top:${documentHieght}px;
                            opacity:${endOpacity};
                        `;

                //4、设置第三个定时器，当雪花落下后，删除雪花。
                setTimeout(function() {
                    cloneFlake.remove();
                }, durationTime);
            }, 0);

        }, millisec);
    }
    snow();
</script>
