# Twenty Twelve for Typecho

WordPress 默认主题 Twenty Twelve 的 Typecho 移植版。

## 仓库结构

```
twentytwelve/       — 原始 WordPress 主题（v4.7）
typecho/            — Typecho 1.2.x 移植主题
AGENTS.md           — 本文件
```

## 验证安装

将 `typecho/` 目录复制到 Typecho 安装路径的 `usr/themes/twentytwelve/`，
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

Typecho 无动态小工具，侧栏已硬编码四个区域（sidebar.php:2,9,17,25）：

- 最新文章：`Widget_Contents_Post_Recent`
- 最新评论：`Widget_Comments_Recent`
- 分类列表：`Widget_Metas_Category_List`
- 按月归档：`Widget_Contents_Post_Date`

## 全宽页面

在 Typecho 后台编辑页面时，添加自定义字段 `template: full-width`，
该页面将隐藏侧栏、应用 `.full-width` body class。

## 自定义页面模板

文件头部加 `@package custom` 即可在后台「创建页面 → 展开高级选项 → 自定义模板」中看到：

| 文件 | 模板名 | 功能 |
|------|--------|------|
| `page-archive.php` | 文章归档 | 按年月列出所有文章标题 |
| `page-tags.php` | 标签云 | 显示所有标签列表 |
| `page-search.php` | 搜索 | 搜索表单，提交后跳转至 Typecho 搜索页 |

Typecho 也支持通过别名自动匹配模板：创建别名为 `archives` / `tags` / `search` 的页面
将分别自动调用 `page-archives.php` / `page-tags.php` / `page-search.php`。

## 评论

`comments.php` 使用 Typecho 原生的评论系统：
- 评论列表：`$this->comments()->to($comments)` + `while($comments->next())`
- 回复按钮：`$comments->reply()`
- 评论表单：`$this->commentUrl()` + `$this->remember('field')`

## CSS 注意事项

- 主题不依赖 WP 特有 CSS 类（已清理 `template-front-page`、`custom-background-*`），但保留了 `.gallery*`、`.align*`、`.wp-caption` 等通用内容样式
- 自托管 Open Sans 字体在 `fonts/` 目录，非 CDN 加载
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
