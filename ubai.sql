-- MySQL dump 10.14  Distrib 5.5.52-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ubai
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章标题',
  `cat_id` smallint(6) NOT NULL COMMENT '文章栏目',
  `top` tinyint(4) NOT NULL DEFAULT '0' COMMENT '文章置顶',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章缩略图',
  `author` int(11) NOT NULL COMMENT '作者',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '文章内容',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO 标题',
  `seo_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO 关键词',
  `seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'SEO 描述',
  `article_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '文章状态',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_title_unique` (`title`),
  KEY `articles_seo_title_index` (`seo_title`),
  KEY `articles_seo_keyword_index` (`seo_keyword`),
  KEY `articles_seo_description_index` (`seo_description`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'再次开通博客',6,0,'',1,'<h3>扯淡</h3><p>兜兜转转了许久，又再次开通了博客。</p><p>经历过最开始 wordpress 博客，到后来的 ThinkPHP 3.2.3 建立的博客，速度一直未能达到理想的程度。所以一直都是删删改改，没有能正常使用下去的博客。</p><p>直到这个博客， laravel 5.3 驱动，因为 laravel 本身比较臃肿的原因，一直在担心博客的速度问题，但是当博客写出来之后才发现配上 redis 缓存、Pjax 之后，博客的速度快到极致。</p><p>作为一个有情怀的程序，前端的样式绝对不能看不下去。所以便有了此单栏界面（好吧，原谅我无耻的借鉴了一下），简洁明了。</p><h3>功能说明</h3><ol><li>Laravel 5.3 强力驱动，Algolia 提供搜索驱动，中文分词效果一般，后期考虑使用 Elasticsearch 作为搜索引擎，毕竟 Algolia&nbsp;的搜索是有限制的，明明知道我是不会使用到这个极限的，不过作为一个自由爱好者，还是不喜欢这种被压制的感觉。</li><li>导航菜单栏和友情链接加入 redis 缓存。laravel 的扩展不得不说，非常的强大方便。在简单的阅读文档及 Google 之后，便开始了 redis 缓存的试水工作，还好各种小问题在我不懈的努力之下，都迎刃而解。</li><li>文章页无限极评论。</li><li>单栏目页添加留言，后台栏目管理页添加菜单：是否开启留言。让你的留言你做主。至于列表栏目页，应该没有谁会去添加留言吧。</li></ol><p><br></p><p>好吧，暂时前台就写到这么多内容吧，至于后台的内容嘛，咳咳，就不告诉你。</p><p><br></p>','','','',0,NULL,'2017-01-15 08:28:07','2017-01-15 15:17:54'),(2,'HTTP协议详解',3,0,'',1,'<h3>http&nbsp;？</h3><ul><li>&nbsp;全称：超文本传输协议(HyperText Transfer Protocol)<br></li><li>&nbsp;作用：设计之初是为了将超文本标记语言(HTML)文档从Web服务器传送到客户端的浏览器。现在http的作用已不局限于HTML的传输。<br></li><li>&nbsp;版本：http/1.0&nbsp;http/1.1*&nbsp;http/2.0<br></li></ul><p>&nbsp;</p><h3>URL详解</h3><p>一个示例URL</p><p>http://www.mywebsite.com/sj/test;id=8079?name=sviergn&amp;x=true#stuff</p><pre style=\"\\\" max-width:\"=\"\" 100%;\\\"=\"\"><code class=\"\\\" http\"=\"\" hljs\\\"=\"\" codemark=\"\\\" 1\\\"\"=\"\"><span class=\"\\\" hljs-attribute\\\"\"=\"\">Schema</span>: http\r\n<span class=\"\\\" http\\\"\"=\"\"><span class=\"\\\" hljs-attribute\\\"\"=\"\">host</span>: www.mywebsite.com\r\n<span class=\"\\\" http\\\"\"=\"\"><span class=\"\\\" hljs-attribute\\\"\"=\"\">path</span>: /sj/test\r\n<span class=\"\\\" cs\\\"\"=\"\">URL <span class=\"\\\" hljs-keyword\\\"\"=\"\">params</span>: id=<span class=\"\\\" hljs-number\\\"\"=\"\">8079\r\n</span>Query String: name=sviergn&amp;x=<span class=\"\\\" hljs-keyword\\\"\"=\"\">true</span>\r\nAnchor: stuff\r\nscheme：指定低层使用的协议(例如：http, https, ftp)\r\nhost：HTTP服务器的IP地址或者域名\r\nport<span class=\"\\\" hljs-meta\\\"\"=\"\">#：HTTP服务器的默认端口是80，这种情况下端口号可以省略。如果使用了别的端口，必须指明，例如http://www.mywebsite.com:8080/</span>\r\npath：访问资源的路径\r\nurl-<span class=\"\\\" hljs-keyword\\\"\"=\"\">params</span>\r\nquery-<span class=\"\\\" hljs-keyword\\\"\"=\"\">string</span>：发送给http服务器的数据\r\nanchor：锚</span></span></span></code></pre><p>&nbsp;<span style=\"\\\" color:\"=\"\" inherit;=\"\" font-size:=\"\" 28px;\\\"=\"\">无状态的协议</span></p><p>http协议是无状态的：</p><p><b>同一个客户端的这次请求和上次请求是没有对应关系，对http服务器来说，它并不知道这两个请求来自同一个客户端。</b></p><p>解决方法：Cookie机制来维护状态</p><p>&nbsp;</p><p><b>既然Http协议是无状态的，那么Connection:keep-alive&nbsp;又是怎样一回事？</b></p><p>无状态是指协议对于事务处理没有记忆能力，服务器不知道客户端是什么状态。从另一方面讲，打开一个服务器上的网页和你之前打开这个服务器上的网页之间没有任何联系。</p><h3>http消息结构</h3><p>1.&nbsp;Request&nbsp;消息的结构：三部分</p><p>第一部分叫Request line（请求行）， 第二部分叫http header, 第三部分是body</p><ul><li>&nbsp;请求行：包括http请求的种类，请求资源的路径，http协议版本<br></li><li>&nbsp;http header：http头部信息<br></li><li>&nbsp;body：发送给服务器的query信息&nbsp;当使用的是\\\"GET\\\" 方法的时候，body是为空的（GET只能读取服务器上的信息，post能写入）&nbsp;<br></li></ul><p>&nbsp;</p><pre style=\"\\\" max-width:\"=\"\" 100%;\\\"=\"\"><code class=\"\\\" http\"=\"\" hljs\\\"=\"\" codemark=\"\\\" 1\\\"\"=\"\"><span class=\"\\\" hljs-attribute\\\"\"=\"\">1. GET /hope/ HTTP/1.1   //---请求行\r\n2. Host</span>: ce.sysu.edu.cn\r\n<span class=\"\\\" markdown\\\"\"=\"\"><span class=\"\\\" hljs-bullet\\\"\"=\"\">3. </span>Accept: <span class=\"\\\" hljs-emphasis\\\"\"=\"\">*/*</span>\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">4. </span>Accept-Encoding: gzip, deflate, sdch\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">5. </span>Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.6\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">6. </span>Cache-Control: max-age=0\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">7. </span>Cookie:.........\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">8. </span>Referer: http://ce.sysu.edu.cn/hope/\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">9. </span>User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">\r\n</span>---分割线---\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\"> \r\n</span><span class=\"\\\" hljs-bullet\\\"\"=\"\">1. </span>POST /hope/ HTTP/1.1   //---请求行\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">2. </span>Host: ce.sysu.edu.cn\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">3. </span>Accept: <span class=\"\\\" hljs-emphasis\\\"\"=\"\">*/*</span>\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">4. </span>Accept-Encoding: gzip, deflate, sdch\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">5. </span>Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.6\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">6. </span>Cache-Control: max-age=0\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">7. </span>Cookie:.........\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">8. </span>Referer: http://ce.sysu.edu.cn/hope/\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">9. </span>User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\"> \r\n</span>...body...</span></code></pre><p>Response消息的结构</p><p>也分为三部分，第一部分叫request line, 第二部分叫request header，第三部分是body</p><ul><li>&nbsp;request line：协议版本、状态码、message<br></li><li>&nbsp;request header：request头信息<br></li><li>&nbsp;body：返回的请求资源主体&nbsp;<br></li></ul><pre style=\"\\\" max-width:\"=\"\" 100%;\\\"=\"\"><code class=\"\\\" http\"=\"\" hljs\\\"=\"\" codemark=\"\\\" 1\\\"\"=\"\"><span class=\"\\\" hljs-attribute\\\"\"=\"\">1. HTTP/1.1 200 OK\r\n2. Accept-Ranges</span>: bytes\r\n<span class=\"\\\" markdown\\\"\"=\"\"><span class=\"\\\" hljs-bullet\\\"\"=\"\">3. </span>Content-Encoding: gzip\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">4. </span>Content-Length: 4533\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">5. </span>Content-Type: text/html\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">6. </span>Date: Sun, 06 Sep 2015 07:56:07 GMT\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">7. </span>ETag: \\\"2788e6e716e7d01:0\\\"\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">8. </span>Last-Modified: Fri, 04 Sep 2015 13:37:55 GMT\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">9. </span>Server: Microsoft-IIS/7.5\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">10. </span>Vary: Accept-Encoding\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">11. </span>X-Powered-By: ASP.NET\r\n<span class=\"\\\" hljs-bullet\\\"\"=\"\">12. ...</span></span></code></pre><h3>get&nbsp;和&nbsp;post&nbsp;区别</h3><p>http协议定义了很多与服务器交互的方法，最基本的有4种，分别是GET,POST,PUT,DELETE。 一个URL地址用于描述一个网络上的资源，而HTTP中的GET,&nbsp;POST,&nbsp;PUT,&nbsp;DELETE&nbsp;就对应着对这个资源的查，改，增，删4个操作。 我们最常见的就是GET和POST了。GET一般用于获取/查询资源信息，而POST一般用于更新资源信息.</p><p>1. GET&nbsp;提交的数据会放在URL之后，以?分割URL和传输数据，参数之间以&amp;相连，如EditPosts.aspx?name=test1&amp;id=123456。POST&nbsp;方法是把提交的数据放在HTTP包的Body中。</p><p>2. GET&nbsp;提交的数据大小有限制（因为浏览器对URL的长度有限制），而POST方法提交的数据没有限制.</p><p>4. GET&nbsp;方式需要使用Request.QueryString&nbsp;来取得变量的值，而POST方式通过Request.Form来获取变量的值。</p><p>5. GET&nbsp;方式提交数据，会带来安全问题，比如一个登录页面，通过GET方式提交数据时，用户名和密码将出现在URL上，如果页面可以被缓存或者其他人可以访问这台机器，就可以从历史记录获得该用户的账号和密码.&nbsp;<a href=\"\\\" https:=\"\" www.zybuluo.com=\"\" yangfch3=\"\" note=\"\" 123476\\\"\"=\"\" style=\"\\\" background-color:\"=\"\" rgb(255,=\"\" 255,=\"\" 255);\\\"=\"\">HTTP请求的Get与Post</a></p><h3>状态码</h3><p>Response&nbsp;消息中的第一行叫做状态行，由HTTP协议版本号，&nbsp;状态码，&nbsp;状态消息&nbsp;三部分组成。</p><p>状态码用来告诉HTTP客户端，HTTP服务器是否产生了预期的Response.</p><p>HTTP/1.1中定义了 5 类状态码。</p><p>状态码由三位数字组成，第一个数字定义了响应的类别</p><ul><li>1XX&nbsp;提示信息 - 表示请求已被成功接收，继续处理<br></li><li>2XX&nbsp;成功 - 表示请求已被成功接收，理解，接受<br></li><li>3XX&nbsp;重定向 - 要完成请求必须进行更进一步的处理<br></li><li>4XX&nbsp;客户端错误 - 请求有语法错误或请求无法实现<br></li><li>5XX&nbsp;服务器端错误 - 服务器未能实现合法的请求</li></ul><ol><li>200 OK&nbsp;请求被成功地完成，所请求的资源发送回客户端<br></li><li>302 Found&nbsp;重定向，新的URL会在response中的Location中返回，浏览器将会使用新的URL发出新的Request<br></li><li>304 Not Modified&nbsp;文档已经被缓存，直接从缓存调用<br></li><li>400 Bad Request&nbsp;客户端请求与语法错误，不能被服务器所理解&nbsp;403 Forbidden&nbsp;服务器收到请求，但是拒绝提供服务&nbsp;404 Not Found&nbsp;请求资源不存在<br></li><li>500 Internal Server Error&nbsp;服务器发生了不可预期的错误&nbsp;503 Server Unavailable&nbsp;服务器当前不能处理客户端的请求，一段时间后可能恢复正常<br></li></ol><h3>http reauest header</h3><p>http&nbsp;请求头包括很多键值对，这些键值对有什么意义与作用？如何根据功能为他们分一下组呢？</p><p>1. cache&nbsp;头域</p><p>2.&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. If-Modified-Since&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用法：If-Modified-Since: Thu, 09 Feb 2012 09:07:57 GMT</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;把浏览器端缓存页面的最后修改时间发送到服务器去，服务器会把这个时间与服务器上实际文件的最后修改时间进行对比。如果时间一致，那么返回304，客户端就直接使用本地缓存文件。如果时间不一致，就会返回200和新的文件内容。客户端接到之后，会丢弃旧文件，把新文件缓存起来，并显示在浏览器中。&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 2. If-None-Match&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用法：If-None-Match: \\\"03f2b33c0bfcc1:0\\\"</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; If-None-Match和ETag一起工作，工作原理是在HTTP Response中添加ETag信息。 当用户再次请求该资源时，将在HTTP Request&nbsp;中加入If-None-Match信息(ETag的值)。如果服务器验证资源的ETag没有改变（该资源没有更新），将返回一个304状态告诉客户端使用本地缓存文件。否则将返回200状态和新的资源和Etag. 使用这样的机制将提高网站的性能&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 3. Pragma：Pragma: no-cache&nbsp;Pargma</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;只有一个用法， 例如：&nbsp;Pragma: no-cache</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作用： 防止页面被缓存， 在HTTP/1.1版本中，它和Cache-Control:no-cache作用一模一样&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 4. Cache-Control&nbsp;用法：</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style=\"font-size: 14px;\">Cache-Control:Public&nbsp;可以被任何缓存所缓存（）</span></p><ol><li>&nbsp; Cache-Control:Public&nbsp;可以被任何缓存所缓存（）<br></li><li>&nbsp;Cache-Control:Private&nbsp;内容只缓存到私有缓存中<br></li><li>&nbsp;Cache-Control:no-cache&nbsp;所有内容都不会被缓存</li></ol><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作用：用来指定Response-Request遵循的缓存机制</p><p>3. Client&nbsp;头域</p><p>4.&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;</p><p>Accept&nbsp;用法：Accept: */*，Accept: text/html</p><p>2.&nbsp;</p><p>作用： 浏览器端可以接受的媒体类型；&nbsp;Accept: */*&nbsp;代表浏览器可以处理所有回发的类型，(一般浏览器发给服务器都是发这个）&nbsp;Accept: text/html&nbsp;代表浏览器可以接受服务器回发的类型为&nbsp;text/html&nbsp;；如果服务器无法返回text/html类型的数据，服务器应该返回一个406错误(non acceptable)&nbsp;</p><p>3.&nbsp;</p><p>4.&nbsp;</p><p>Accept-Encoding&nbsp;用法：Accept-Encoding: gzip, deflate</p><p>5.&nbsp;</p><p>作用： 浏览器申明自己接收的文件编码方法，通常指定压缩方法，是否支持压缩，支持什么压缩方法（gzip，deflate），（注意：这不是指字符编码）&nbsp;</p><p>6.&nbsp;</p><p>7.&nbsp;</p><p>Accept-Language&nbsp;用法：Accept-Language: en-us</p><p>8.&nbsp;</p><p>作用： 浏览器申明自己接收的语言。&nbsp;语言跟字符集的区别：中文是语言，中文有多种字符集，比如big5，gb2312，gbk等等；&nbsp;</p><p>9.&nbsp;</p><p>10.&nbsp;</p><p>User-Agent&nbsp;用法：&nbsp;User-Agent: Mozilla/4.0......</p><p>11.&nbsp;</p><p>作用：告诉HTTP服务器， 客户端使用的操作系统和浏览器的名称和版本.&nbsp;</p><p>12.&nbsp;</p><p>13.&nbsp;</p><p>Accept-Charset&nbsp;用法：Accept-Charset：utf-8</p><p>14.&nbsp;</p><p>作用：浏览器申明自己接收的字符集，这就是本文前面介绍的各种字符集和字符编码，如gb2312，utf-8（通常我们说Charset包括了相应的字符编码方案）&nbsp;</p><p>15.&nbsp;</p><p>5.&nbsp;</p><p>Cookie/Login&nbsp;头域</p><p>6.&nbsp;</p><p>1.&nbsp;</p><p>Cookie</p><p>2.&nbsp;</p><p>3.&nbsp;</p><p>1.&nbsp;</p><p>Cookie:&nbsp;bdshare_firstime=1439081296143;&nbsp;</p><p>ASP.NET_SessionId=rcqayd4ufldcke0wkbm1vhxb;&nbsp;</p><p>pgv_pvi=7361416192;&nbsp;</p><p>pgv_si=s6686106624;&nbsp;</p><p>ce.sysu.edu.cn80.ASPXAUTH=9E099592DD5A414BEECD8CF43CFC71664</p><p>作用：&nbsp;最重要的header, 将cookie的值发送给HTTP&nbsp;服务器</p><p>7.&nbsp;</p><p>Entity&nbsp;头域</p><p>8.&nbsp;</p><p>1.&nbsp;</p><p>Content-Length&nbsp;用法：Content-Length: 38</p><p>2.&nbsp;</p><p>作用：发送给HTTP服务器数据的长度。&nbsp;</p><p>3.&nbsp;</p><p>4.&nbsp;</p><p>Content-Type&nbsp;用法：Content-Type: application/x-www-form-urlencoded</p><p>5.&nbsp;</p><p>不常出现，一般出现在response头部，用于指定数据文件类型&nbsp;</p><p>6.&nbsp;</p><p>9.&nbsp;</p><p>Miscellaneous&nbsp;头域</p><p>10.&nbsp;</p><p>1.&nbsp;</p><p>Referer&nbsp;用法：Referer: http://ce.sysu.edu.cn/hope/</p><p>2.&nbsp;</p><p>作用：提供了Request的上下文信息的服务器，告诉服务器我是从哪个链接过来的，比如从我主页上链接到一个朋友那里，他的服务器就能够从HTTP Referer中统计出每天有多少用户点击我主页上的链接访问他的网站。&nbsp;</p><p>3.&nbsp;</p><p>11.&nbsp;</p><p>Transport&nbsp;头域</p><p>12.&nbsp;</p><p>1.&nbsp;</p><p>Connection&nbsp;Connection: keep-alive： 当一个网页打开完成后，客户端和服务器之间用于传输HTTP数据的TCP连接不会关闭，如果客户端再次访问这个服务器上的网页，会继续使用这一条已经建立的连接</p><p>2.&nbsp;</p><p>Connection: close： 代表一个Request完成后，客户端和服务器之间用于传输HTTP数据的TCP连接会关闭， 当客户端再次发送Request，需要重新建立TCP连接&nbsp;</p><p>3.&nbsp;</p><p>4.&nbsp;</p><p>Host&nbsp;用法：Host: ce.sysu.edu.cn</p><p>5.&nbsp;</p><p>作用: 请求报头域主要用于指定被请求资源的Internet主机和端口号（默认80），它通常从HTTP URL中提取出来的</p><p>6.&nbsp;</p><h3>HTTP Response header</h3><p>1.&nbsp;</p><p>Cache&nbsp;头域</p><p>2.&nbsp;</p><p>1.&nbsp;</p><p>Date&nbsp;用法：Date: Sat, 11 Feb 2012 11:35:14 GMT</p><p>2.&nbsp;</p><p>作用: 生成消息的具体时间和日期&nbsp;</p><p>3.&nbsp;</p><p>4.&nbsp;Expires&nbsp;用法：Expires: Tue, 08 Feb 2022 11:35:14 GMT&nbsp;作用: 浏览器会在指定过期时间内使用本地缓存&nbsp;</p><p>5.&nbsp;Vary&nbsp;用法：Vary: Accept-Encoding&nbsp;</p><p>3.&nbsp;</p><p>Cookie/Login&nbsp;头域</p><p>4.&nbsp;</p><p>1.&nbsp;</p><p>P3P&nbsp;用法：&nbsp;P3P: CP=CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR</p><p>2.&nbsp;</p><p>作用: 用于跨域设置Cookie, 这样可以解决iframe跨域访问cookie的问题&nbsp;</p><p>3.&nbsp;</p><p>4.&nbsp;</p><p>Set-Cookie&nbsp;用法：&nbsp;Set-Cookie: sc=4c31523a; path=/; domain=.acookie.taobao.com</p><p>5.&nbsp;</p><p>作用：非常重要的header, 用于把cookie&nbsp;发送到客户端浏览器， 每一个写入cookie都会生成一个Set-Cookie.</p><p>6.&nbsp;</p><p>5.&nbsp;</p><p>Entity&nbsp;头域</p><p>6.&nbsp;</p><p>1.&nbsp;</p><p>ETag&nbsp;用法：ETag: \\\"03f2b33c0bfcc1:0\\\"</p><p>2.&nbsp;</p><p>作用: 和request header的If-None-Match&nbsp;配合使用&nbsp;</p><p>3.&nbsp;</p><p>4.&nbsp;</p><p>Last-Modified&nbsp;用法：Last-Modified: Wed, 21 Dec 2011 09:09:10 GMT</p><p>5.&nbsp;</p><p>作用：用于指示资源的最后修改日期和时间。（实例请看上节的If-Modified-Since的实例）&nbsp;</p><p>6.&nbsp;</p><p>7.&nbsp;</p><p>Content-Type&nbsp;用法：</p><p>8.&nbsp;</p><p>1.&nbsp;Content-Type: text/html; charset=utf-8</p><p>2.&nbsp;Content-Type:text/html;charset=GB2312</p><p>3.&nbsp;Content-Type: image/jpeg</p><p>作用：WEB服务器告诉浏览器自己响应的对象的类型和字符集&nbsp;</p><p>9.&nbsp;</p><p>Content-Encoding&nbsp;用法：Content-Encoding：gzip</p><p>10.&nbsp;</p><p>作用：WEB服务器表明自己使用了什么压缩方法（gzip，deflate）压缩响应中的对象。&nbsp;</p><p>11.&nbsp;</p><p>12.&nbsp;</p><p>Content-Language&nbsp;用法：&nbsp;Content-Language:da</p><p>13.&nbsp;</p><p>WEB服务器告诉浏览器自己响应的对象的语言</p><p>14.&nbsp;</p><p>7.&nbsp;</p><p>Miscellaneous&nbsp;头域</p><p>8.&nbsp;</p><p>1.&nbsp;</p><p>Server&nbsp;用法：Server: Microsoft-IIS/7.5</p><p>2.&nbsp;</p><p>作用：指明HTTP服务器的软件信息&nbsp;</p><p>3.&nbsp;</p><p>4.&nbsp;</p><p>X-AspNet-Version&nbsp;用法：X-AspNet-Version: 4.0.30319</p><p>5.&nbsp;</p><p>作用：如果网站是用ASP.NET开发的，这个header用来表示ASP.NET的版本&nbsp;</p><p>6.&nbsp;</p><p>7.&nbsp;</p><p>X-Powered-By&nbsp;用法：X-Powered-By: ASP.NET</p><p>8.&nbsp;</p><p>作用：表示网站是用什么技术开发的&nbsp;</p><p>9.&nbsp;</p><p>9.&nbsp;</p><p>Transport头域</p><p>10.&nbsp;</p><p>1.&nbsp;Connection&nbsp;用法与作用：&nbsp;</p><p>1.&nbsp;Connection: keep-alive：当一个网页打开完成后，客户端和服务器之间用于传输HTTP数据的TCP连接不会关闭，如果客户端再次访问这个服务器上的网页，会继续使用这一条已经建立的连接</p><p>2.&nbsp;Connection: close：代表一个Request完成后，客户端和服务器之间用于传输HTTP数据的TCP连接会关闭， 当客户端再次发送Request，需要重新建立TCP连接</p><p>11.&nbsp;</p><p>Location头域</p><p>12.&nbsp;</p><p>1.&nbsp;Location&nbsp;用法：Location：http://ce.sysu.edu.cn/hope/&nbsp;作用： 用于重定向一个新的位置， 包含新的URL地址</p><p><br></p>','','','',0,NULL,'2017-01-15 08:28:37','2017-04-13 04:23:28'),(3,'CentOS 7 上搭建 lnmp 环境',4,0,'',1,'<h3>安装MariaDB</h3><p>MariaDB 是 MySQL 的一个分支，主要由开源社区进行维护和升级，而 MySQL 被 Oracle 收购以后，发展较慢。在 CentOS 7 的软件仓库中，将 MySQL 更替为了 MariaDB。</p><p>我们可以使用 yum 直接安装 MariaDB：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo yum install mariadb-server</code></pre><p>安装完成之后，执行以下命令重启 MariaDB 服务：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo systemctl start mariadb</code></pre><p>MariaDB 默认 root 密码为空，我们需要设置一下，执行脚本：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo mysql_secure_installation</code></pre><p>这个脚本会经过一些列的交互问答来进行 MariaDB 的安全设置。</p><p>首先提示输入当前的 root 密码：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">Enter current password <span class=\"hljs-keyword\">for</span> root (enter <span class=\"hljs-keyword\">for</span> none):</code></pre><p>初始 root 密码为空，我们直接敲回车进行下一步。</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">Set root password? [Y/n]</code></pre><p>设置 root 密码，默认选项为 Yes，我们直接回车，提示输入密码，在这里设置您的 MariaDB 的 root 账户密码。</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">Remove anonymous users? [Y/n]</code></pre><p>是否移除匿名用户，默认选项为 Yes，建议按默认设置，回车继续。</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">Disallow root login remotely? [Y/n]</code></pre><p>是否禁止 root 用户远程登录？如果您只在本机内访问 MariaDB，建议按默认设置，回车继续。 如果您还有其他云主机需要使用 root 账号访问该数据库，则需要选择n。</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">Remove <span class=\"hljs-built_in\">test</span> database and access to it? [Y/n]</code></pre><p>是否删除测试用的数据库和权限？ 建议按照默认设置，回车继续。</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">Reload privilege tables now? [Y/n]</code></pre><p>是否重新加载权限表？因为我们上面更新了root的密码，这里需要重新加载，回车。</p><p>完成后你会看到 Success! 的提示，MariaDB 的安全设置已经完成。我们可以使用以下命令登录 MariaDB：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">mysql -u root -p</code></pre><p>按提示输入root密码，就会进入 MariaDB 的交互界面，说明已经安装成功。</p><p>最后我们将 MariaDB 设置为开机启动。</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">systemctl <span class=\"hljs-built_in\">enable</span> mariadb</code></pre><h3>CentOS下重置Mysql root密码</h3><p>第一步：修改Mysql配置文件</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[root@liama01 ~] vim /etc/my.cnf</code></pre><p>添加</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">skip-grant-tables</code></pre><h3>第二步：重启Mysql后使用mysql -uroot -p 命令登入Mysql并修改密码</h3><pre style=\"max-width: 100%;\"><code class=\"sql hljs\" codemark=\"1\"><span class=\"hljs-keyword\">update</span> <span class=\"hljs-keyword\">user</span> <span class=\"hljs-keyword\">set</span> <span class=\"hljs-keyword\">password</span>=<span class=\"hljs-keyword\">PASSWORD</span>(<span class=\"hljs-string\">\'123456\'</span>) WHERE user=\"root\";</code></pre><p>完成后记得将配置文件中的 <font color=\"\\\" #ff00ff\\\"\"=\"\">skip-grant-tables</font> 配置行去掉。</p><h3>安装Nginx</h3><h3>使用yum安装Nginx：</h3><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo yum install nginx</code></pre><p>按照提示，输入 yes 后开始安装。安装完毕后，Nginx的配置文件在 <font color=\"\\\" #008000\\\"\"=\"\">/etc/nginx </font>目录下。使用以下命令</p><p>启动Nginx：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo systemctl start nginx</code></pre><p>停止Nginx：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo systemctl stop nginx</code></pre><p>重启Nginx：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo systemctl restart nginx</code></pre><p>虚拟主机定义在&nbsp;server{}&nbsp;容器中，修改为如下内容：</p><pre style=\"max-width: 100%;\"><code class=\"nginx hljs\" codemark=\"1\">[...]\r\n&nbsp;&nbsp;&nbsp;&nbsp;server {     \r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;listen <span class=\"hljs-number\">80</span>;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;listen [::]:<span class=\"hljs-number\">80</span> default_server;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;server_name _;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;root /usr/share/nginx/html;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;index index.php index.html index.htm;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;location / {\r\n<span class=\"hljs-comment\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# First attempt to serve request as file, then         \r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# as directory, then fall back to displaying a 404.     </span>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;try_files $uri $uri/ =404;     \r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;error_page 404 /404.html;     \r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;location = 40x.html {\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;root /usr/share/nginx/html;     \r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;error_page 500 502 503 504 /50x.html;   \r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;location = /50x.html {           \r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;root /usr/share/nginx/html;      \r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n[...]</code></pre><p>&nbsp;</p><p>创建 <font color=\"\\\" #008000\\\"\"=\"\">/var/htdocs</font> 目录：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[root@www ~] mkdir -p /var/htdocs</code></pre><p>&nbsp;因为SELinux的关系，即便 nginx 程序有 r 权限读取 <font color=\"\\\" #008000\\\"\"=\"\">/var/htdocs </font>下的文件，也是会读取失败的。我们需要 semanage 这个工具来更改 <font color=\"\\\" #008000\\\"\"=\"\">/var/htdocs</font> 目录的默认 SELinux 设置，通过命令</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo yum provides semanage</code></pre><p>查找到这个工具是由 policycoreutils-python 这个软件包提供的，因此：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[root@www ~] sudo yum install policycoreutils-python</code></pre><p>将 <font color=\"\\\" #008000\\\"\"=\"\">/var/htdocs</font> 目录(及其子目录和文档)的默认 SELinux 类型设定为 nginx 可以读取的 httpd_sys_content_t：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[root@www ~] semanage fcontext <span class=\"hljs-_\">-a</span> -t httpd_sys_content_t <span class=\"hljs-string\">\"/var/htdocs(/.*)?\"</span></code></pre><p>确认上面的规则是否添加成功：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[root@www ~] semanage fcontext <span class=\"hljs-_\">-l</span> | grep ‘/var/htdocs’</code></pre><p>让 <font color=\"\\\" #008000\\\"\"=\"\">/var/htdocs</font> 目录的 SELinux 类型恢复成上面设定的默认值</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[root@www ~] restorecon -Rv /var/htdocs</code></pre><p>确认 <font color=\"\\\" #008000\\\"\"=\"\">/data/www</font> 目录的 SELinux 类型是否的确为 httpd_sys_content_t：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[root@www ~] ls <span class=\"hljs-_\">-d</span>Z /var/htdocs</code></pre><p>检查系统中 firewalld 防火墙服务是否开启，如果已开启，我们需要修改防火墙配置，开启Nginx外网端口访问。</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo systemctl status firewalld</code></pre><h3>安装PHP</h3><p>更新 yum&nbsp;源,自带的源没有 PHP 7</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm\r\nrpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm</code></pre><p>安装 epel:&nbsp;</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">yum install epel-release</code></pre><p>然后更新下系统:</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">yum update</code></pre><p>安装 PHP :</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">yum install php70w-fpm php70w-mysql php70w-mysqli php70w php70w-opcache php70w-gd php70w-intl php70w-mbstring php70w-exif php70w-mcrypt php70w-openssl php70w-xml</code></pre><h3>设置&nbsp;PHP70w-FPM</h3><p>PHP7 通过 PHP-FPM（FastCGI进程管理器）可以很好地与 Nginx 协同工作，PHP-FPM 针对不同规模的网站功能和性能都非常优良，尤其是高并发大型网站。</p><p>安装步骤如下：</p><p><strike>yum install php php-mysql php-fpm</strike></p><p>然后是配置。打开文件&nbsp;<font color=\"\\\" #008000\\\"\"=\"\">/etc/php.ini</font>，设置 <font color=\"\\\" #880000\\\"\"=\"\">cgi.fix_pathinfo=0</font>（要先删除前面的;注释符），如下：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[...]\r\n&nbsp;&nbsp;&nbsp;&nbsp;ncgi.fix_pathinfo=0\r\n[...]</code></pre><p>再配置 PHP-FPM 。打开文件&nbsp;<font color=\"\\\" #008000\\\"\"=\"\">/etc/php-fpm.d/www.conf</font>，</p><h4>配置方法一：</h4><p>1.&nbsp;将&nbsp;127.0.0.1:9000&nbsp;改为&nbsp;<font color=\"\\\" #880000\\\"\"=\"\">php-fpm.sock</font>&nbsp;文件</p><p>2.&nbsp;取消&nbsp;listen.owner 和 listen.group 前面的注释</p><p>3.&nbsp;将 user 和 group 的值由 apache 改为 nginx</p><p>如下：</p><pre style=\"max-width: 100%;\"><code class=\"ini hljs\" codemark=\"1\">[...]\r\n&nbsp;&nbsp;&nbsp;&nbsp;listen = /var/run/php-fpm/php-fpm.sock\r\n[...]\r\n&nbsp;&nbsp;&nbsp;&nbsp;listen.owner = nobody\r\n&nbsp;&nbsp;&nbsp;&nbsp;listen.group = nobody\\\r\n[...]\r\n&nbsp;&nbsp;&nbsp;&nbsp;user = nginx\r\n&nbsp;&nbsp;&nbsp;&nbsp;group = nginx\r\n[...]\r\n</code></pre><pre style=\"max-width: 100%;\"><code class=\"nginx hljs\" codemark=\"1\">location <span class=\"hljs-regexp\">~ \\\\.php$</span> {\r\n&nbsp;&nbsp;&nbsp;&nbsp;try_files <span class=\"hljs-variable\">$uri</span> =<span class=\"hljs-number\">404</span>;\r\n&nbsp;&nbsp;&nbsp;&nbsp;fastcgi_pass unix:/var/run/php-fpm/php-fpm.sock;\r\n&nbsp;&nbsp;&nbsp;&nbsp;fastcgi_param SCRIPT_FILENAME <span class=\"hljs-variable\">$document_root</span><span class=\"hljs-variable\">$fastcgi_script_name</span>;\r\n&nbsp;&nbsp;&nbsp;&nbsp;fastcgi_index index.php;\r\n&nbsp;&nbsp;&nbsp;&nbsp;include fastcgi_params;\r\n}</code></pre><h4>配置方法二：</h4><p>直接将 user 和 group 的值由 apache 改为 nginx。</p><p>此时 nginx 虚拟站点的配置文件应为</p><pre style=\"max-width: 100%;\"><code class=\"nginx hljs\" codemark=\"1\"><span class=\"hljs-attribute\">location</span> <span class=\"hljs-regexp\">~ \\\\.php$</span> {\r\n&nbsp;&nbsp;&nbsp;&nbsp;root           /usr/share/nginx/html/laravel/public;\r\n&nbsp;&nbsp;&nbsp;&nbsp;fastcgi_pass   <span class=\"hljs-number\">127.0.0.1:9000</span>;\r\n&nbsp;&nbsp;&nbsp;&nbsp;fastcgi_index  index.php;\r\n&nbsp;&nbsp;&nbsp;&nbsp;fastcgi_param  SCRIPT_FILENAME   <span class=\"hljs-variable\">$document_root</span><span class=\"hljs-variable\">$fastcgi_script_name</span>;\r\n&nbsp;&nbsp;&nbsp;&nbsp;include        fastcgi_params;\r\n}</code></pre><p>启动 PHP-FPM，并设置为开机启动：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">systemctl start php-fpm.service\r\nsystemctl <span class=\"hljs-built_in\">enable</span> php-fpm.service</code></pre><p>应用方法一配置完PHP-FPM （启动）之后，会生成 socket&nbsp;文件<font color=\"\\\" #008000\\\"\"=\"\">&nbsp;/var/run/php-fpm/php-fpm.sock&nbsp;</font>作为守护进程运行&nbsp;FastCGI&nbsp;服务。接下来配置 Nginx&nbsp;的时候会用到这个 socket&nbsp;文件。</p><p>注意：关于 nginx 服务配置完成之后的常见 <font color=\"\\\" #ff0000\\\"\"=\"\">502 </font>错误，php文件 <font color=\"\\\" #ff0000\\\"\"=\"\">404 </font>错误</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">/var/run/php-fpm/php-fpm.sock 文件权限不足</code></pre><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo chmod 777 /var/run/php-fpm/php-fpm.sock</code></pre><h3>Proftpd 配置问题</h3><p>Yum 安装完成 proftpd 之后，新建了一个用户，将他的登录目录设置为 <font color=\"\\\" #008000\\\"\"=\"\">/var/htdocs</font>&nbsp;，ftp 登录显示错误：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">Command:    PWD\r\nResponse:   257 <span class=\"hljs-string\">\"/\" is the current directory\r\nCommand:    TYPE I\r\nResponse:   200 Type set to I\r\nCommand:    PASV\r\nResponse:   227 Entering Passive Mode (10,0,10,10,184,18).\r\nCommand:    MLSD\r\nResponse:   550 /: Invalid argument\r\nError:  Failed to retrieve directory listing</span></code></pre><p>检查是不是 <font color=\"\\\" #880000\\\"\"=\"\">SELinux</font> 导致您的问题</p><p><br></p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">setenforce 0</code></pre><p>如果这能解决你的问题然后打开了<font color=\"\\\" #880000\\\"\"=\"\">SELinux&nbsp;</font></p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">setenforce 1</code></pre><p>然后尝试设置 <font color=\"\\\" #880000\\\"\"=\"\">ftp_home_dir</font> 布尔</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo setsebool -P /var/htdocs on</code></pre><p>这将允许FTP守护程序访问用户主目录。</p><p>&nbsp;</p><p><span style=\"\\\" color:\"=\"\" inherit;=\"\" font-size:=\"\" 28px;\\\"=\"\">Phpmyadmin 配置错误</span></p><p>Phpmyadmin上传完成之后显示错误</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\"><font color=\"#ff0000\">Cannot start session without errors, please check errors given <span class=\"hljs-keyword\">in</span> your PHP and/or webserver <span class=\"hljs-built_in\">log</span> file and configure your PHP installation properly. Also ensure that cookies are enabled <span class=\"hljs-keyword\">in</span> your browser.</font></code></pre><p>在 <font color=\"\\\" #008000\\\"\"=\"\">/etc/php.ini</font>&nbsp;文件中检查</p><pre style=\"max-width: 100%;\"><code class=\"ini hljs\" codemark=\"1\">session.save_path = \\\"/var/lib/php/session\\\"</code></pre><p>查看其权限：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">drwxr-xr-x  2 root apache 4096 Feb 16 04:47 session</code></pre><p>改变session目录的权限</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo chmod -R 777 session</code></pre><p><br></p>','','','',0,NULL,'2017-01-15 08:29:04','2017-02-04 06:00:00'),(4,'CentOS 安装 Supervisor 以及设置 Laravel 队列设置',4,0,'',1,'<h3>安装</h3><p>先安装 <a href=\"\\\" http:=\"\" lib.csdn.net=\"\" base=\"\" python\\\"\"=\"\">Python</a> 的 easy_install，再通过 easy_install 安装 supervisor</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">yum install python-setuptools\r\neasy_install supervisor</code></pre><h3>配置文件</h3><p>生成配置文件，并建立相应目录，管理 supervisor 启动进程</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">echo</span>_supervisord_conf > /etc/supervisord.conf\r\nmkdir -p /etc/supervisor/conf.d/</code></pre><p>编辑 <font color=\"\\\" #008000\\\"\"=\"\">/etc/supervisord.conf</font>，修改 <font color=\"\\\" #ff00ff\\\"\"=\"\">[include]</font> 区块内容：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[include]\r\nfiles = /etc/supervisor/conf.d/*.conf</code></pre><p>这样， <font color=\"\\\" #880000\\\"\"=\"\">supervisor</font> 会加载<font color=\"\\\" #008000\\\"\"=\"\"> /etc/supervisor/conf.d/ </font>下的所有 <font color=\"\\\" #008000\\\"\"=\"\">.conf </font>文件</p><h3>自动启动</h3><p>在 <a href=\"\\\" https:=\"\" github.com=\"\" supervisor=\"\" initscripts\\\"\"=\"\">https://github.com/Supervisor/initscripts</a> 下载 CentOS 使用的自动启动服务脚本 centos-systemd-etcs</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">wget -O /usr/lib/systemd/system/supervisord.service https://github.com/Supervisor/initscripts/raw/master/centos-systemd-etcs</code></pre><p>将 supervisord 服务设为自启动</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">systemctl <span class=\"hljs-built_in\">enable</span> supervisord.service</code></pre><p>输入 <font color=\"\\\" #ff00ff\\\"\"=\"\">supervisorctl</font> 命令可以进入 <font color=\"\\\" #000000\\\"\"=\"\">supervisor </font>控制台</p><h3>设置 Laravel 队列</h3><p>新建<font color=\"\\\" #008000\\\"\"=\"\"> /etc/supervisor/conf.d/laravel-work.conf </font>文件：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">[program:laravel-worker]\r\n    process_name=%(program_name)s_%(process_num)02d\r\n<span class=\"hljs-built_in\">    command</span>=php /website/artisan queue:work database --sleep=3 --tries=3 --daemon\r\n    autostart=<span class=\"hljs-literal\">true\r\n</span>    autorestart=<span class=\"hljs-literal\">true\r\n</span>    user=yourname\r\n    numprocs=8\r\n    redirect_stderr=<span class=\"hljs-literal\">true\r\n</span>    stdout_logfile=/data/wwwroot/app.com/storage/logs/queue.log</code></pre><p>注意：user=yourname  不然会报 <font color=\"\\\" #ff0000\\\"\"=\"\">CANT_REREAD: Invalid user name yourname </font>错误</p><p>这里开启了 8 个 queue:work 进程，并监视他们，如果失败的话，自动重启；在项目的<font color=\"\\\" #008000\\\"\"=\"\"> storage/logs/queue.log </font>记录日志。</p><p>启动 supervisor 服务：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">supervisord</code></pre><p>至此， supervisor 安装及 Laravel 队列设置完毕</p><p>如果以后配置文件有修改，或者新增，进入 supervisor 控制台，执行下面的命令</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-comment\"># supervisorctl</span>\r\nsupervisorctl> reread\r\nsupervisorctl> update\r\nsupervisorctl> start laravel-worker:*</code></pre><p><br></p>','','','',0,NULL,'2017-01-15 08:30:36','2017-02-23 10:08:05'),(5,'Nginx 启用 Gzip 压缩',4,0,'',1,'<p>网站的访问量如果越来越高，那么就需要考虑带宽的问题了，因为流量会提升一些费用成本，没有经过压缩的文本也会影响网页的加载速度。当然我目前对这个考虑还是远了，因为流量对我来说还没感受到那么大的问题。只是考虑用户提升访问速度。</p><p>当然了 Gzip 压缩在当前 HTTP 传输来说还是主流的，所有的服务器应该都能启用 Gzip 压缩才对。</p><p></p><p>对于 Nginx 来启用 Gzip 很简单。打开<font color=\"\\&quot;#008000\\&quot;\"> /etc/nginx/nginx.conf </font>配置进行编辑：</p><pre style=\"max-width: 100%;\"><code class=\"nginx hljs\" codemark=\"1\"><span class=\"hljs-section\">http</span> {   <span class=\"hljs-comment\">#在http里面进行设置</span>\r\n    <span class=\"hljs-comment\">#开启gzip压缩</span>\r\n    <span class=\"hljs-attribute\">gzip</span>  <span class=\"hljs-literal\">on</span>;\r\n    <span class=\"hljs-comment\">#启用gzip压缩最小长度必须大于1kB，否则不启用压缩</span>\r\n    <span class=\"hljs-attribute\">gzip_min_length</span> <span class=\"hljs-number\">1k</span>;\r\n    <span class=\"hljs-comment\"># gzip压缩的缓冲区</span>\r\n    <span class=\"hljs-attribute\">gzip_buffers</span> <span class=\"hljs-number\">4</span> <span class=\"hljs-number\">16k</span>;\r\n    <span class=\"hljs-comment\"># gzip压缩的等级，0-9之间，数字越大，压缩率越高，但是cpu消耗也大。</span>\r\n    <span class=\"hljs-attribute\">gzip_comp_level</span> <span class=\"hljs-number\">9</span>;\r\n    <span class=\"hljs-comment\"># 启用gzip的文件类型，一般text、css、json、javascript、xml进行压缩，image最好不要压缩了吧？</span>\r\n    <span class=\"hljs-attribute\">gzip_types</span> text/plain text/css application/json application/javascript application/x-javascript text/xml application/xml application/xml+rss text/javascript;\r\n    <span class=\"hljs-comment\"># 和http头有关系，加个vary头，给代理服务器用的，有的浏览器支持压缩，有的不支持。</span>\r\n    <span class=\"hljs-comment\"># 因此，为避免浪费不支持的也压缩，需要根据客户端的HTTP头来判断，是否需要压缩。</span>\r\n    <span class=\"hljs-attribute\">gzip_vary</span> <span class=\"hljs-literal\">on</span>;\r\n    <span class=\"hljs-comment\"># 好吧，IE6对gzip压缩不太好，但是应该要淘汰IE6了吧，你的受众是IE6用户，那么你也太没有魅力了。</span>\r\n     <span class=\"hljs-comment\">#gzip_disable \\\"MSIE [1-6]\\\\.\\\";</span>\r\n}</code></pre><p><br></p>','','','',0,NULL,'2017-01-15 08:30:58','2017-01-15 10:15:13'),(6,'CentOS 7 下 vim 的实用设置',4,0,'',1,'<p>在 CentOS 中 vim 的配置文件位于 <font color=\"\\\" #008000\\\"\"=\"\">/etc/vimrc&nbsp;</font></p><pre style=\"max-width: 100%;\"><code class=\"ini hljs\" codemark=\"1\">set nocompatible    <span class=\"hljs-comment\">#        去掉有关vi一致性模式，避免以前版本的bug和局限</span>\r\nset nu!            <span class=\"hljs-comment\">#        显示行号</span>\r\nset guifont=Luxi/ Mono/ 9        <span class=\"hljs-comment\">#        设置字体，字体名称和字号</span>\r\nfiletype on                      <span class=\"hljs-comment\">#        检测文件的类型     </span>\r\nset history=1000                 <span class=\"hljs-comment\">#        记录历史的行数</span>\r\nset background=dark              <span class=\"hljs-comment\">#        背景使用黑色</span>\r\nsyntax on                        <span class=\"hljs-comment\">#        语法高亮度显示</span>\r\nset autoindent                   <span class=\"hljs-comment\">#        vim使用自动对齐，也就是把当前行的对齐格式应用到下一行(自动缩进）</span>\r\nset cindent                      <span class=\"hljs-comment\">#        cindent是特别针对 C语言语法自动缩进）</span>\r\nset smartindent                  <span class=\"hljs-comment\">#        依据上面的对齐格式，智能的选择对齐方式，对于类似C语言编写上有用   </span>\r\nset tabstop=4                    <span class=\"hljs-comment\">#        设置tab键为4个空格，</span>\r\nset shiftwidth =4                <span class=\"hljs-comment\">#        设置当行之间交错时使用4个空格     </span>\r\nset ai!                          <span class=\"hljs-comment\">#        设置自动缩进 </span>\r\nset showmatch                    <span class=\"hljs-comment\">#        设置匹配模式，类似当输入一个左括号时会匹配相应的右括号      </span>\r\nset guioptions-=T                <span class=\"hljs-comment\">#        去除vim的GUI版本中得toolbar   </span>\r\nset vb t_vb=                     <span class=\"hljs-comment\">#        当vim进行编辑时，如果命令错误，会发出警报，该设置去掉警报       </span>\r\nset ruler                        <span class=\"hljs-comment\">#        在编辑过程中，在右下角显示光标位置的状态行     </span>\r\nset nohls                        <span class=\"hljs-comment\">#        默认情况下，寻找匹配是高亮度显示，该设置关闭高亮显示     </span>\r\nset incsearch                    <span class=\"hljs-comment\">#        在程序中查询一单词，自动匹配单词的位置；如查询desk单词，当输到/d时，会自动找到第一个d开头的单词，当输入到/de时，会自动找到第一个以ds开头的单词，以此类推，进行查找；当找到要匹配的单词时，别忘记回车 </span>\r\nset backspace=2                  <span class=\"hljs-comment\">#        设置退格键可用</span></code></pre><p>修改成功后&nbsp;<span style=\"\\\" background-color:\"=\"\" rgb(255,=\"\" 0,=\"\" 0);\\\"=\"\" courier=\"\\\" \\\"\"=\"\" new\\\",=\"\\\" monospace;=\"\\\" font-size:=\"\\\" inherit;=\"\\\" white-space:=\"\\\" pre-wrap;=\"\\\" background-color:=\"\\\"><font color=\"\\\" #ffffff\\\"\"=\"\">&nbsp;:wq&nbsp;</font></span>&nbsp;保存退出,</p><p>如果修改完成后功能没有生效，请检查一下系统实用安装了&nbsp;<span style=\"\\\" font-size:\"=\"\" 14px;\\\"=\"\">vim-enhanced 包，查询命令：</span></p><p><span style=\"\\\" font-size:\"=\"\" 14px;\\\"=\"\"></span></p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">rpm -q vim-enhanced</code></pre><p>注意：如果设置好以上设置后，VIM没有作出相应的动作，那么请你把你的VIM升级到最新版，一般只要在终端输入以下命令即可：</p><pre style=\"max-width: 100%;\"><code class=\"bash hljs\" codemark=\"1\">sudo yum update</code></pre><p><br></p>','','','',0,NULL,'2017-01-15 08:31:21','2017-01-15 10:19:55'),(7,'99%的人都理解错了HTTP中GET与POST的区别',4,0,'',1,'<p>GET和POST是HTTP请求的两种基本方法，要说它们的区别，接触过WEB开发的人都能说出一二。</p><p>最直观的区别就是GET把参数包含在URL中，POST通过request body传递参数。</p><p>你可能自己写过无数个GET和POST请求，或者已经看过很多权威网站总结出的他们的区别，你非常清楚知道什么时候该用什么。</p><p>当你在面试中被问到这个问题，你的内心充满了自信和喜悦。</p><p align=\"center\" style=\"text-align: center;\"><img src=\"/upload/article/76220170413122656.png\" alt=\"640\" style=\"max-width:100%;\" class=\"\"><br></p><p>你轻轻松松的给出了一个“标准答案”：</p><ul><li>GET在浏览器回退时是无害的，而POST会再次提交请求。</li><li>GET产生的URL地址可以被Bookmark，而POST不可以。</li><li>GET请求会被浏览器主动cache，而POST不会，除非手动设置。</li><li>GET请求只能进行url编码，而POST支持多种编码方式。</li><li>GET请求参数会被完整保留在浏览器历史记录里，而POST中的参数不会被保留。</li><li>GET请求在URL中传送的参数是有长度限制的，而POST么有。</li><li>对参数的数据类型，GET只接受ASCII字符，而POST没有限制。</li><li>GET比POST更不安全，因为参数直接暴露在URL上，所以不能用来传递敏感信息。</li><li>GET参数通过URL传递，POST放在Request body中。</li></ul><p>（本标准答案参考自w3schools）</p><p>“很遗憾，这不是我们要的回答！”</p><p align=\"center\" style=\"text-align: center;\"><img src=\"/upload/article/71420170413122736.jpeg\" alt=\"640\" style=\"max-width:100%;\" class=\"\"><br></p><p>请告诉我真相。。。</p><p>如果我告诉你GET和POST本质上没有区别你信吗？&nbsp;</p><p>让我们扒下GET和POST的外衣，坦诚相见吧！</p><p align=\"center\" style=\"text-align: center;\"><img src=\"/upload/article/68520170413122802.jpeg\" alt=\"640-2\" style=\"max-width:100%;\" class=\"\"><br></p><p>GET和POST是什么？HTTP协议中的两种发送请求的方法。</p><p>HTTP是什么？HTTP是基于TCP/IP的关于数据如何在万维网中如何通信的协议。</p><p>HTTP的底层是TCP/IP。所以GET和POST的底层也是TCP/IP，也就是说，GET/POST都是TCP链接。GET和POST能做的事情是一样一样的。你要给GET加上request body，给POST带上url参数，技术上是完全行的通的。&nbsp;</p><p>那么，“标准答案”里的那些区别是怎么回事？</p><p align=\"center\" style=\"text-align: center;\"><img src=\"/upload/article/82220170413122823.jpeg\" alt=\"640-3\" style=\"max-width:100%;\" class=\"\"><br></p><p>在我大万维网世界中，TCP就像汽车，我们用TCP来运输数据，它很可靠，从来不会发生丢件少件的现象。但是如果路上跑的全是看起来一模一样的汽车，那这个世界看起来是一团混乱，送急件的汽车可能被前面满载货物的汽车拦堵在路上，整个交通系统一定会瘫痪。为了避免这种情况发生，交通规则HTTP诞生了。HTTP给汽车运输设定了好几个服务类别，有GET, POST, PUT, DELETE等等，HTTP规定，当执行GET请求的时候，要给汽车贴上GET的标签（设置method为GET），而且要求把传送的数据放在车顶上（url中）以方便记录。如果是POST请求，就要在车上贴上POST的标签，并把货物放在车厢里。当然，你也可以在GET的时候往车厢内偷偷藏点货物，但是这是很不光彩；也可以在POST的时候在车顶上也放一些数据，让人觉得傻乎乎的。HTTP只是个行为准则，而TCP才是GET和POST怎么实现的基本。</p><p>但是，我们只看到HTTP对GET和POST参数的传送渠道（url还是requrest body）提出了要求。“标准答案”里关于参数大小的限制又是从哪来的呢？</p><p align=\"center\" style=\"text-align: center;\"><img src=\"/upload/article/36820170413122845.jpeg\" alt=\"640-4\" style=\"max-width:100%;\" class=\"\"><br></p><p>在我大万维网世界中，还有另一个重要的角色：运输公司。不同的浏览器（发起http请求）和服务器（接受http请求）就是不同的运输公司。 虽然理论上，你可以在车顶上无限的堆货物（url中无限加参数）。但是运输公司可不傻，装货和卸货也是有很大成本的，他们会限制单次运输量来控制风险，数据量太大对浏览器和服务器都是很大负担。业界不成文的规定是，（大多数）浏览器通常都会限制url长度在2K个字节，而（大多数）服务器最多处理64K大小的url。超过的部分，恕不处理。如果你用GET服务，在request body偷偷藏了数据，不同服务器的处理方式也是不同的，有些服务器会帮你卸货，读出数据，有些服务器直接忽略，所以，虽然GET可以带request body，也不能保证一定能被接收到哦。</p><p>好了，现在你知道，GET和POST本质上就是TCP链接，并无差别。但是由于HTTP的规定和浏览器/服务器的限制，导致他们在应用过程中体现出一些不同。&nbsp;</p><p>你以为本文就这么结束了？</p><p align=\"center\" style=\"text-align: center;\"><img src=\"/upload/article/74020170413122918.png\" alt=\"640-2\" style=\"max-width:100%;\" class=\"\"><br></p><p>我们的大BOSS还等着出场呢。。。</p><p>这位BOSS有多神秘？当你试图在网上找“GET和POST的区别”的时候，那些你会看到的搜索结果里，从没有提到他。他究竟是什么呢。。。</p><p>GET和POST还有一个重大区别，简单的说：</p><p>GET产生一个TCP数据包；POST产生两个TCP数据包。</p><p>长的说：</p><p>对于GET方式的请求，浏览器会把http header和data一并发送出去，服务器响应200（返回数据）；</p><p>而对于POST，浏览器先发送header，服务器响应100 continue，浏览器再发送data，服务器响应200 ok（返回数据）。</p><p>也就是说，GET只需要汽车跑一趟就把货送到了，而POST得跑两趟，第一趟，先去和服务器打个招呼“嗨，我等下要送一批货来，你们打开门迎接我”，然后再回头把货送过去。</p><p>因为POST需要两步，时间上消耗的要多一点，看起来GET比POST更有效。因此Yahoo团队有推荐用GET替换POST来优化网站性能。但这是一个坑！跳入需谨慎。为什么？</p><p>1. GET与POST都有自己的语义，不能随便混用。</p><p>2. 据研究，在网络环境好的情况下，发一次包的时间和发两次包的时间差别基本可以无视。而在网络环境差的情况下，两次包的TCP在验证数据包完整性上，有非常大的优点。</p><p>3. 并不是所有浏览器都会在POST中发送两次包，Firefox就只发送一次。</p><p>现在，当面试官再问你“GET与POST的区别”的时候，你的内心是不是这样的？</p><p align=\"center\" style=\"text-align: center;\"><img src=\"/upload/article/65720170413122943.jpeg\" alt=\"640-5\" style=\"max-width:100%;\" class=\"\"><br></p><p align=\"center\" style=\"text-align: left;\">转载：<span style=\"font-size: 14px;\"><a href=\"http://mp.weixin.qq.com/s?__biz=MzI3NzIzMzg3Mw==&mid=100000054&amp;idx=1&amp;sn=71f6c214f3833d9ca20b9f7dcd9d33e4#rd\" target=\"_blank\">WebTechGarden</a></span></p><p><br></p>','','','',0,NULL,'2017-04-13 04:30:46','2017-04-13 04:31:59');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_status`
--

DROP TABLE IF EXISTS `articles_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_status` (
  `id` tinyint(4) NOT NULL,
  `article_status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_status`
--

LOCK TABLES `articles_status` WRITE;
/*!40000 ALTER TABLE `articles_status` DISABLE KEYS */;
INSERT INTO `articles_status` VALUES (0,'显示'),(1,'草稿');
/*!40000 ALTER TABLE `articles_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '栏目名称',
  `cat_order` tinyint(4) NOT NULL DEFAULT '0' COMMENT '栏目排序',
  `cat_pic` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目图片',
  `cat_pid` int(11) NOT NULL COMMENT '父级栏目 ID',
  `cat_seo_title` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目 SEO 标题',
  `cat_seo_keyword` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目 SEO 关键词',
  `cat_seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目 SEO 描述',
  `cat_url` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目链接',
  `cat_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '栏目状态',
  `cat_page` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否单页',
  `cat_comment` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否单页留言',
  `cat_page_content` varchar(5000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '单页内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_cat_name_unique` (`cat_name`),
  KEY `categories_cat_seo_title_index` (`cat_seo_title`),
  KEY `categories_cat_seo_keyword_index` (`cat_seo_keyword`),
  KEY `categories_cat_seo_description_index` (`cat_seo_description`),
  KEY `categories_cat_page_content_index` (`cat_page_content`(255))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'友链',99,'',0,'','','','link',0,1,1,'',NULL,'2017-01-15 08:36:38'),(2,'记录',50,'',0,'','','','',0,0,0,'','2017-01-15 08:24:30','2017-02-04 14:36:54'),(3,'Php',50,'',2,'','','','php',0,0,0,'','2017-01-15 08:24:42','2017-01-15 08:24:42'),(4,'Servicer',50,'',2,'','','','servicer',0,0,0,'','2017-01-15 08:24:53','2017-01-15 08:24:53'),(5,'关于',51,'',0,'','','','about',0,1,1,'<h3>简介</h3><p>95后，现居杭州。</p><p>热爱编程，喜欢前端</p><h3>联系</h3><p>QQ ：308683650</p><p>E-mail： tizips [at] qq.com （请自觉替换，不要问我为什么，我也不知道 ㄟ(▔,▔)ㄏ ）</p><p>Website：<a href=\"https://ubai.me\" target=\"_blank\">ubai.me</a></p><h3>技能</h3><h5>语言：PHP 、JS 、JQuery 、CSS 、HTML</h5><h5>框架：Tp 3.2.3 、Laravel 5.3 （强烈喜欢）</h5><h5>服务器：CentOS 7</h5><h3>版权</h3><p></p><ul><li>本站内容，若无特别申明均为原创</li><li>本站原创内容 <b>【禁止】</b>任意形式的：传播、转载 ...</li><li>若本站内容侵犯你的权益，请及时联系处理</li></ul><p></p><p><br></p>','2017-01-15 08:25:13','2017-02-28 06:34:30'),(6,'闲语',50,'',0,'','','','says',0,0,0,'','2017-01-15 08:26:39','2017-01-15 08:27:34');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_status`
--

DROP TABLE IF EXISTS `categories_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_status` (
  `id` tinyint(4) NOT NULL,
  `cat_status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_status`
--

LOCK TABLES `categories_status` WRITE;
/*!40000 ALTER TABLE `categories_status` DISABLE KEYS */;
INSERT INTO `categories_status` VALUES (0,'显示'),(1,'隐藏');
/*!40000 ALTER TABLE `categories_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(10) unsigned NOT NULL COMMENT '评论者',
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '评论内容',
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '回复',
  `comment_post_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论对象',
  `comment_cat_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论栏目',
  `comment_parent` int(11) NOT NULL DEFAULT '0' COMMENT '父级评论',
  `comment_status` tinyint(4) NOT NULL COMMENT '评论状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_status`
--

DROP TABLE IF EXISTS `comments_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_status` (
  `id` tinyint(4) NOT NULL,
  `comment_status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_status`
--

LOCK TABLES `comments_status` WRITE;
/*!40000 ALTER TABLE `comments_status` DISABLE KEYS */;
INSERT INTO `comments_status` VALUES (0,'未查看'),(1,'已查看'),(2,'已回复');
/*!40000 ALTER TABLE `comments_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '站点名称',
  `web_url` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '友链链接',
  `web_admin` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '站点管理员',
  `web_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员邮箱',
  `web_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '站点 logo',
  `web_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '站点简介',
  `operate_user` int(11) NOT NULL COMMENT '操作人员',
  `web_order` tinyint(3) unsigned DEFAULT '50' COMMENT '站点排序',
  `show_bottom` tinyint(3) unsigned DEFAULT '0' COMMENT '站点状态',
  `web_status` tinyint(3) unsigned DEFAULT '0' COMMENT '站点状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `links_web_name_unique` (`web_name`),
  UNIQUE KEY `links_web_url_unique` (`web_url`),
  UNIQUE KEY `links_web_email_unique` (`web_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (1,'度黑','http://boktai.cn/','一叶叶 一声声','1183421711@qq.com','/upload/thumb/68320170204222841.jpg','',1,50,1,0,'2017-01-15 09:02:44','2017-02-04 14:28:43'),(2,'Laravel','https://laravel.com/','laravel','laravel@laravel.com','/upload/thumb/59920170204213451.jpg','',1,50,1,0,'2017-01-19 15:31:56','2017-02-04 13:37:52'),(3,'余白','https://ubai.me','tizips','tizips@qq.com','/upload/thumb/20620170204212757.jpg','',1,49,0,0,'2017-02-04 13:28:05','2017-02-04 13:28:21'),(4,'域落人生','http://www.yvluo.com/','Mr.Zhou','193760446@qq.com','/upload/thumb/63520170204213000.png','',1,50,0,0,'2017-02-04 13:30:03','2017-02-04 13:30:03');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links_status`
--

DROP TABLE IF EXISTS `links_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links_status` (
  `id` tinyint(4) NOT NULL,
  `link_status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links_status`
--

LOCK TABLES `links_status` WRITE;
/*!40000 ALTER TABLE `links_status` DISABLE KEYS */;
INSERT INTO `links_status` VALUES (0,'显示'),(1,'隐藏');
/*!40000 ALTER TABLE `links_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_user_name` int(10) unsigned NOT NULL COMMENT '留言者',
  `message_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '留言内容',
  `user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `message_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_message_user_name_index` (`message_user_name`),
  KEY `messages_message_content_index` (`message_content`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages_status`
--

DROP TABLE IF EXISTS `messages_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages_status` (
  `id` tinyint(4) NOT NULL,
  `message_status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages_status`
--

LOCK TABLES `messages_status` WRITE;
/*!40000 ALTER TABLE `messages_status` DISABLE KEYS */;
INSERT INTO `messages_status` VALUES (0,'未查看'),(1,'已查看'),(2,'已回复');
/*!40000 ALTER TABLE `messages_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_11_10_070024_create_links_table',1),(4,'2016_11_10_080920_create_categories',1),(5,'2016_11_10_080937_create_categories_status',1),(6,'2016_11_11_032600_create_links_status_table',1),(7,'2016_11_11_065339_create_comments_table',1),(8,'2016_11_11_070122_create_comments_status',1),(9,'2016_11_11_071234_create_messages_table',1),(10,'2016_11_11_071324_create_messages_status',1),(11,'2016_11_11_071632_create_articles_status',1),(12,'2016_11_11_071750_create_systems_table',1),(13,'2016_11_11_082724_create_vips_table',1),(14,'2016_11_17_063726_create_uploads_table',1),(15,'2016_11_30_023941_create_failed_jobs_table',1),(16,'2016_12_08_074956_create_table_articles',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems`
--

DROP TABLE IF EXISTS `systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systems` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `set_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '变量名',
  `set_description` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '参数说明',
  `set_value` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT '参数值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `systems_set_name_unique` (`set_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems`
--

LOCK TABLES `systems` WRITE;
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` VALUES (1,'web_name','站点名称','余白'),(2,'web_url','站点根网址','http://localhost'),(3,'web_logo','站点 logo',''),(4,'admin_email','管理云邮箱',''),(5,'upload_limit','上传限制','2048'),(6,'web_tcp','站点备案号',''),(7,'web_description','站点简介',''),(8,'upload_type','上传附件类型',''),(9,'prohibit_word','禁词',''),(10,'keyword_replace','替词',''),(11,'copyright','版权','');
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件名称',
  `file_title` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文件展示标题',
  `file_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件类型',
  `file_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件地址',
  `qiniu_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '七牛存储文件地址',
  `file_size` int(10) unsigned NOT NULL COMMENT '文件尺寸大小',
  `image_width` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上传文件为图片下，图片宽度',
  `image_height` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上传文件为图片下，图片高度',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (1,'37920170203230754.png','','png','/upload/thumb/37920170203230754.png','',41650,0,0,'2017-02-03 15:07:54','2017-02-03 15:07:54'),(2,'77220170203230928.jpg','','jpg','/upload/thumb/77220170203230928.jpg','',15340,0,0,'2017-02-03 15:09:28','2017-02-03 15:09:28'),(3,'14920170204212301.jpg','','jpg','/upload/thumb/14920170204212301.jpg','',15340,0,0,'2017-02-04 13:23:01','2017-02-04 13:23:01'),(4,'80620170204212703.png','','png','/upload/thumb/80620170204212703.png','',21736,0,0,'2017-02-04 13:27:03','2017-02-04 13:27:03'),(5,'20620170204212757.jpg','','jpg','/upload/thumb/20620170204212757.jpg','',15340,0,0,'2017-02-04 13:27:57','2017-02-04 13:27:57'),(6,'63520170204213000.png','','png','/upload/thumb/63520170204213000.png','',36822,0,0,'2017-02-04 13:30:01','2017-02-04 13:30:01'),(7,'34320170204213310.jpg','','jpg','/upload/thumb/34320170204213310.jpg','',16813,0,0,'2017-02-04 13:33:10','2017-02-04 13:33:10'),(8,'59920170204213451.jpg','','jpg','/upload/thumb/59920170204213451.jpg','',19599,0,0,'2017-02-04 13:34:51','2017-02-04 13:34:51'),(9,'35320170204222643.jpg','','jpg','/upload/thumb/35320170204222643.jpg','',32316,0,0,'2017-02-04 14:26:43','2017-02-04 14:26:43'),(10,'68320170204222841.jpg','','jpg','/upload/thumb/68320170204222841.jpg','',34079,0,0,'2017-02-04 14:28:41','2017-02-04 14:28:41'),(11,'76220170413122656.png','','png','/upload/article/76220170413122656.png','',24001,0,0,'2017-04-13 04:26:56','2017-04-13 04:26:56'),(12,'71420170413122736.jpeg','','jpeg','/upload/article/71420170413122736.jpeg','',17027,0,0,'2017-04-13 04:27:36','2017-04-13 04:27:36'),(13,'68520170413122802.jpeg','','jpeg','/upload/article/68520170413122802.jpeg','',9919,0,0,'2017-04-13 04:28:02','2017-04-13 04:28:02'),(14,'82220170413122823.jpeg','','jpeg','/upload/article/82220170413122823.jpeg','',5532,0,0,'2017-04-13 04:28:23','2017-04-13 04:28:23'),(15,'36820170413122845.jpeg','','jpeg','/upload/article/36820170413122845.jpeg','',15720,0,0,'2017-04-13 04:28:45','2017-04-13 04:28:45'),(16,'74020170413122918.png','','png','/upload/article/74020170413122918.png','',10197,0,0,'2017-04-13 04:29:18','2017-04-13 04:29:18'),(17,'65720170413122943.jpeg','','jpeg','/upload/article/65720170413122943.jpeg','',12996,0,0,'2017-04-13 04:29:43','2017-04-13 04:29:43');
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `pen_name` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '笔名',
  `thumb` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '缩略头像',
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系邮箱',
  `github` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '个人简介',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_pen_name_unique` (`pen_name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tizips','tizips','/upload/thumb/14920170204212301.jpg','tizips@foxmail.com','https://github.com/tizips','$2y$10$lW7a70o71vZ4kD0zWUfL0uRodtHg2YfNDsO26ImjFTP.6GwN18j3S','有你和诗的远方，即是天堂','fROx3l3HNEBm70QfWVdbc4fJcviyv0WCbqF6sDQnYkXU9n4P0UQDfcKptuqg','2016-12-08 08:19:02','2017-02-04 13:23:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vips`
--

DROP TABLE IF EXISTS `vips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '会员名',
  `user_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '会员邮箱',
  `user_url` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '会员站点',
  `thumb` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '会员缩略图',
  `user_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vips_user_name_unique` (`user_name`),
  UNIQUE KEY `vips_user_email_unique` (`user_email`),
  UNIQUE KEY `vips_user_url_unique` (`user_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vips`
--

LOCK TABLES `vips` WRITE;
/*!40000 ALTER TABLE `vips` DISABLE KEYS */;
/*!40000 ALTER TABLE `vips` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-29 20:52:55
