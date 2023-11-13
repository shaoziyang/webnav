# 网络
<b>新闻</b><br>
<a class="sxyhButton_01" style="padding-right: 30px;padding-top: 2px;" target="_blank" href="https://sohu.com/"><img src="images/ico/sohu.png" height="24" style="float: left;padding-left:30px;"/>搜狐</a>
<a class="sxyhButton_01" style="background-color:#cc0000;color:#ffffff;" target="_blank" href="https://www.163.com/">网易</a>
<a class="sxyhButton_01" style="background-color:transparent;color:#2a42bd;border:2px solid #2a42bd;padding-right: 30px;" target="_blank" href="https://www.zhibo8.cc/"><img src="images/ico/zhibo8.png" style="float: left;padding-left:30px;"/>直播吧</a>
<a class="sxyhButton_01" style="background-color:#cc0000;border:2px solid #ff0000;color:#ffffff;" target="_blank" href="https://www.ithome.com">IT之家</a>
<a class="sxyhButton_01" style="background-color:#ffffff;border:2px solid #ee7e13;color:#ee7e13;" target="_blank" href="https://www.mydrivers.com/">快科技</a>

<b>邮箱</b><br>
<a class="sxyhButton_02" target="_blank" href="https://126.com/" style="background-color:#1e7e3e;">126</a>
<a class="sxyhButton_02" target="_blank" href="https://mail.163.com/" style="background-color:#d80a17;">163</a>
<a class="sxyhButton_02" target="_blank" href="https://qiye.aliyun.com/" style="background-color:#ef4542;">阿里企业邮</a>
<a class="sxyhButton_02" target="_blank" href="https://exmail.qq.com/login" style="background-color:#2984ef;">QQ邮箱</a>
<a class="sxyhButton_02" target="_blank" href="https://outlook.live.com/" style="background-color:#0178d4;">outlook</a>

<b>网盘</b><br>
<a class="sxyhButton_02" target="_blank" href="https://pan.baidu.com/" style="background-color:transparent;color:#2bc2fe;">百度网盘</a>
<a class="sxyhButton_02" target="_blank" href="https://www.aliyundrive.com/" style="background-color:#5770ef;">阿里云盘</a>
<a class="sxyhButton_02" target="_blank" href="https://www.jianguoyun.com/" style="background-color:#bd7031;">坚果云</a>
<a class="sxyhButton_02" target="_blank" href="https://www.weiyun.com/" style="background-color:#03162f;">腾讯微云</a>
<a class="sxyhButton_02" target="_blank" href="https://pan.xunlei.com/login" style="background-color:#2875ed;">迅雷云盘</a>
<a class="sxyhButton_02" target="_blank" href="https://www.123pan.com/login" style="background-color:#597dfc;">123云盘</a>
<a class="sxyhButton_02" target="_blank" href="https://cloud.189.cn" style="background-color:#fdbe2b;">天翼云盘</a>
<a class="sxyhButton_02" target="_blank" href="https://yun.139.com">移动云盘</a>
<a class="sxyhButton_02" target="_blank" href="https://pan.wo.cn" style="background-color:#ff843f;">联通云盘</a>
<a class="sxyhButton_02" target="_blank" href="https://teracloud.jp/en/" style="background-color:#ef8200;">TeraCloud</a>

<b>翻译</b><br>
<a class="sxyhButton_02" target="_blank" href="https://fanyi.baidu.com/" style="background-color:#2932e0;">百度翻译</a>
<a class="sxyhButton_02" target="_blank" href="https://fanyi.qq.com/" style="background-color:#ab4ff8;">腾讯翻译</a>
<a class="sxyhButton_02" target="_blank" href="https://fanyi.youdao.com/" style="border:1px solid #e908ea;background-color:#ff1135;">有道翻译</a>

<b>文档</b><br>
<a class="sxyhButton_03" target="_blank" href="https://docs.qq.com/" style="background-color:#1e6fff;">腾讯文档</a>
<a class="sxyhButton_03" target="_blank" href="https://www.kdocs.cn/" style="background-color:#1e6fff;">金山文档</a>
<a class="sxyhButton_03" target="_blank" href="https://shimo.im/" style="background-color:#000000;">石墨文档</a>
<a class="sxyhButton_03" target="_blank" href="https://docs.feishu.cn/" style="background-color:#0032a0;">飞书</a>
<a class="sxyhButton_03" target="_blank" href="https://www.yozocloud.cn/" style="background-color:#216fec;">永中文档</a>
<a class="sxyhButton_03" target="_blank" href="https://seed.pgyer.com/" style="background-color:#68a463;">Seed</a>
<a class="sxyhButton_03" target="_blank" href="https://note.youdao.com/" style="background-color:#5b89ef;">有道</a>
<a class="sxyhButton_03" target="_blank" href="https://www.notion.so/" style="background-color:#f0f0f0;color:#000000">Notion</a>


<style>
body {
  background-image: url(images/03818_posinghummingbird_1920x1080.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
</style>

<script>
//鼠标移动特效
(function () {
    var colors = ["#D61C59", "#E7D84B", "#1B8798"];
    characters = ["♬", "♪"];
    elementGroup = [];
    //定义元素类
    class Element {
        //构造函数
        constructor() {
            num = Math.floor(Math.random() * characters.length);
            this.character = characters[num];
            this.lifeSpan = 120;
            this.initialStyles = {
                position: "fixed",
                top: "0",
                display: "block",
                pointerEvents: "none",
                "z-index": "10000000",
                fontSize: "25px",
                "will-change": "transform",
                color: "#000000"
            };
            //初始化
            this.init = function (x, y, color) {
                this.velocity = { x: (Math.random() < .5 ? -1 : 1) * (Math.random() / 2), y: 1 };
                this.position = { x: x - 10, y: y - 20 };
                this.initialStyles.color = color;
                this.element = document.createElement("span");
                this.element.innerHTML = this.character;
                ApplyStyle(this.element, this.initialStyles);
                this.update();
                document.body.appendChild(this.element);
            };
            //更新
            this.update = function () {
                //移动，缩放
                this.position.x += this.velocity.x;
                this.position.y += this.velocity.y;
                this.lifeSpan--;
                this.element.style.transform = "translate3d(" + this.position.x + "px," + this.position.y + "px,0) scale(" + this.lifeSpan / 120 + ")";
            };
            //销毁
            this.die = function () {
                this.element.parentNode.removeChild(this.element);
            };
        }
    }

    AddListener();
    //循环
    setInterval(
        function () {
            Rander();
        },
        1000 / 60);
    //添加事件监听器
    function AddListener() {
        //当前事件对象会作为第一个参数传入函数
        document.addEventListener("mousemove", onMouseMove);
        document.addEventListener("touchmove", Touch);
        document.addEventListener("touchstart", Touch);
    }
    //逐个渲染
    function Rander() {
        for (var i = 0; i < elementGroup.length; i++) {
            elementGroup[i].update();
            if (elementGroup[i].lifeSpan < 0) {
                elementGroup[i].die();
                elementGroup.splice(i, 1);
            }
        }
    }
    //鼠标移动事件函数
    function onMouseMove(t) {
        num = Math.floor(Math.random() * colors.length);
        CreateElement(t.clientX, t.clientY, colors[num]);
    }
    //添加元素
    function CreateElement(x, y, color) {
        var e = new Element;
        e.init(x, y, color);
        elementGroup.push(e);
    }
    //调整元素属性
    function ApplyStyle(element, style) {
        for (var i in style) {
            element.style[i] = style[i];
        }
    }
    //触摸事件函数
    function Touch(t) {
        if (t.touches.length > 0) {
            for (var i = 0; i < t.touches.length; i++) {
                num = Math.floor(Math.random() * r.length);
                s(t.touches[i].clientX, t.touches[i].clientY, r[num]);
            }
        }
    }
})();

</script>