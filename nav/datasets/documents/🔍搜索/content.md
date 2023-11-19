# 🔍搜索
<small>无需打开网站，直接从本地开始搜索。</small><br>
<b>通用搜索</b>
<table>
<tbody>
<tr>
<td><form action="https://cn.bing.com/search" target="_blank"><input autocomplete="on" maxlength="100" size="15" name="q" type="texts" placeholder="请输入搜索关键词" /> <input type="submit" value="bing" /></form></td>
<td>  </td>
<td><form id="form" action="https://www.baidu.com/s" target="_blank"><input id="kw" autocomplete="on" size="15" maxlength="100" name="wd" type="texts" placeholder="请输入搜索关键词" /> <input type="submit" value="百度" /></form></td>
<td>  </td>
<td><form action="https://baike.baidu.com/search" target="_blank"><input autocomplete="on" size="13" maxlength="100" name="word" type="search1" placeholder="百科" /> <input type="submit" value="百度百科" /></form></td>
<td>  </td>
<td><form action="https://www.zhihu.com/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="q" type="search1" placeholder="百科" /> <input type="submit" value="知乎" /></form></td>
</tr>
</tbody>
</table>

<b>购物</b>
</table>
<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><form action="https://search.jd.com/Search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="keyword" type="search1" placeholder="商品" /> <input type="submit" value="京东" /></form></td>
<td>  </td>
<td><form action="https://s.taobao.com/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="q" type="search1" placeholder="商品" /> <input type="submit" value="淘宝" /></form></td>
<td>  </td>
<td><form action="https://gwdang.com/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="keyword" type="s_product" placeholder="商品" /> <input type="submit" value="购物党" /></form></td>
<td>  </td>
<td><form action="https://search.smzdm.com" target="_blank"><input autocomplete="on" size="9" maxlength="100" name="s" type="search1" placeholder="什么值得买" /> <input type="submit" value="什么值得买" /></form></td>
</tr>
</tbody>
</table>

<b>资源搜索</b>
<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<form action="https://www.alipansou.com/search" target="_blank"><input autocomplete="on" maxlength="200" name="k" type="search1" size="15" placeholder="资源名" /> <input type="submit" value="猫盘" /></form></td>
<td>  </td>
<td><form action="https://filehippo.com/search/" target="_blank"><input autocomplete="on" size="11" maxlength="100" name="q" type="search1" placeholder="software" /> <input type="submit" value="filehippo" /></form></td>
<td>  </td>
<td><form action="https://alternativeto.net/browse/search" target="_blank"><input autocomplete="on" size="10" maxlength="100" name="q" type="search1" placeholder="软件名" /> <input type="submit" value="AlternativeTo" /></form></td>
<td>  </td>
<td><form action="https://apkpremier.com/search" target="_blank"><input autocomplete="on" size="11" maxlength="100" name="q" type="search1" placeholder="安卓" /> <input type="submit" value="APKpremier" /></form></td>
</tr>
</tbody>
</table>

<b>开发</b>
<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><form class="form" action="https://search.gitee.com/?" target="_blank" method="get"><input id="search-input" class="input" size="20" autocomplete="on" name="q" type="text1" placeholder="搜索或者跳转到..." /> <input name="type" type="hidden" value="repository" /> <button class="submit">gitee</button></form></td>
<td>  </td>
<td><form action="https://github.com/search" target="_blank"><input autocomplete="on" size="20" maxlength="100" name="q" type="search1" placeholder="project" /> <input type="submit" value="github" /></form></td>
<td>  </td>
<td><form action="https://www.thefreecountry.com/search" target="_blank"><input autocomplete="on" size="20" maxlength="100" name="q" type="search1" placeholder="" /> <input type="submit" value="thefreecountry" /></form></td>
</tr>
</tbody>
</table>


<b>其它搜索</b>
<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><form action="https://www.emojiall.com/zh-hans/search_results" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="keywords" type="search1" placeholder="emoji" /> <input type="submit" value="emoji" /></form></td>
<td>  </td>
<td><form action="https://emojis.wiki/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="s" type="search1" placeholder="emoji" /> <input type="submit" value="emojis.wiki" /></form></td>
<td>  </td>
<td><form action="https://www.slant.co/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="query" type="search1" placeholder="What are the best" /> <input type="submit" value="Slant" /></form></td>
<td>  </td>
<td><form action="https://www.163.com/search" target="_blank"><input autocomplete="on" size="15" maxlength="100" name="keyword" type="search1" placeholder="网易" /> <input type="submit" value="网易" /></form></td>
</tr>
</tbody>
</table>

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
