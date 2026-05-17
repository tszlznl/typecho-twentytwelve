# Twenty Twelve for Typecho

WordPress 默认主题 Twenty Twelve 的 Typecho 移植版。

## 仓库结构

```
AGENTS.md           — AI 辅助开发指南（语法备忘、架构约定）
README.md           — 项目说明
style.css           — 样式文件
header.php          — 页面头部
footer.php          — 页面底部
functions.php       — 主题函数
index.php           — 首页模板
archive.php         — 归档页（分类/标签/搜索/日期/作者）
post.php            — 文章详情
page.php            — 独立页面
comments.php        — 评论系统
sidebar.php         — 侧栏
content.php         — 文章条目
content-page.php    — 页面条目
content-none.php    — 无结果提示
404.php             — 404 页面
page-archive.php    — 自定义模板：文章归档
page-tags.php       — 自定义模板：标签云
page-search.php     — 自定义模板：搜索
js/                 — JavaScript
css/                — 辅助样式（RTL）
images/             — 背景图片
screenshot.png      — 主题截图
```

## 安装

将整个目录复制到 Typecho 安装路径的 `usr/themes/twentytwelve/`，
在后台「控制台 → 外观」启用即可。

## Typecho 模板语法备忘

`$this` 始终指向当前 `Widget_Archive` 实例（在 `content.php` 等局部模板中也是）。

| 用途 | WordPress | Typecho |
|------|-----------|---------|
| 文章循环 | `have_posts(); the_post()` | `$this->next()` |
| 标题 | `the_title()` | `$this->title()` |
| 内容 | `the_content()` | `$this->content()` |
| 摘要 | `the_excerpt()` | `$this->excerpt()` |
| 永久链接 | `the_permalink()` | `$this->permalink()` |
| 日期 | `get_the_date()` | `$this->date('Y-m-d')` |
| 作者 | `the_author()` | `$this->author()` 或 `$this->author->name()` |
| 分类 | `the_category(',')` | `$this->category(',')` |
| 标签 | `the_tags()` | `$this->tags(',', true, 'none')` |
| 分页 | `posts_nav_link()` | `$this->pageNav()` |
| 上下篇 | `previous_post_link()` | `$this->thePrev('%s')` / `$this->theNext('%s')` |
| 头部 | `wp_head()` | `$this->header()` |
| 页脚 | `wp_footer()` | `$this->footer()` |
| 评论数 | `comments_number()` | `$this->commentsNum()` |
| 网站名 | `bloginfo('name')` | `$this->options->title()` |
| 描述 | `bloginfo('description')` | `$this->options->description()` |
| URL | `home_url()` | `$this->options->siteUrl()` |
| 主题路径 | `get_template_directory_uri()` | `$this->options->themeUrl()` |

## 侧栏 Widget

Typecho 无动态小工具，侧栏已硬编码四个区域（sidebar.php:2,12,22,29）：

- 最新文章：`Widget_Contents_Post_Recent`，每项显示 `YYYY/MM` 日期 + 标题
- 最新评论：`Widget_Comments_Recent`
- 分类列表：`Widget_Metas_Category_List`，显示分类名 + 文章数
- 按月归档：`Widget_Contents_Post_Date`，格式 `YYYY 年 MM 月`

## 全宽页面

在 Typecho 后台编辑页面时，添加自定义字段 `template: full-width`，
该页面将隐藏侧栏、应用 `.full-width` body class。

## 自定义页面模板

文件头部加 `@package custom` 即可在后台「创建页面 → 展开高级选项 → 自定义模板」中看到：

| 文件 | 模板名 | 功能 |
|------|--------|------|
| `page-archive.php` | 文章归档 | 按年月列出所有文章标题，≥3 年时顶部显示年份快速跳转 |
| `page-tags.php` | 标签云 | 显示所有标签列表 |
| `page-search.php` | 搜索 | 搜索表单（`<search>` 语义元素 + `type="search"` + `aria-label`），按 `/` 快速聚焦，下方展示热门标签 |

Typecho 也支持通过别名自动匹配模板：创建别名为 `archives` / `tags` / `search` 的页面
将分别自动调用 `page-archives.php` / `page-tags.php` / `page-search.php`。

## 评论

`comments.php` 使用 Typecho 原生的评论系统：
- 评论列表：`$this->comments()->to($comments)` + `while($comments->next())`
- 回复按钮：`$comments->reply()`
- 评论表单：`$this->commentUrl()` + `$this->remember('field')`

## CSS 注意事项

- 使用 CSS 变量驱动明暗双主题：`:root`（亮色）+ `[data-theme="dark"]`（暗色），通过 `header.php` 的 FOUC 防护脚本 + `footer.php` 的切换 JS 控制，选择持久化到 `localStorage`
- 字体通过「中文网字计划」CDN 加载：霞鹜文楷 Bold（`LXGW WenKai`）。离线时 fallback 到系统衬线字体栈
- 主题不依赖 WP 特有 CSS 类（已清理 `template-front-page`、`custom-background-*`），但保留了 `.gallery*`、`.align*`、`.wp-caption` 等通用内容样式
- RTL 支持：`css/rtl.css`，需手动切换（未自动加载）

## 未移植的功能

- 文章格式（aside / image / link / quote / status）：Typecho 无此概念
- Gutenberg 块编辑器样式：Typecho 无此概念
- WordPress Customizer：Typecho 无对应机制
- 自定义页头图片：Typecho 无对应机制
- 动态小工具系统：Typecho 无对应机制
- Internet Explorer 兼容：原 WP 主题 v4.7 已弃用 IE
- i18n 翻译：全部硬编码为中文

## 构建 / 测试

无构建工具、无测试框架。直接在本地搭建 PHP + Typecho 环境验证。
