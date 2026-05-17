# Twenty Twelve for Typecho

WordPress 默认主题 [Twenty Twelve](https://wordpress.org/themes/twentytwelve/) (v4.7) 的 Typecho 1.2.x 移植版。

## 安装

将整个目录复制到 Typecho 安装路径的 `usr/themes/twentytwelve/`，
在后台「控制台 → 外观」启用即可。

## 特性

- **明暗双主题**：CSS 变量驱动，右上角切换按钮，选择持久化到 `localStorage`
- **响应式布局**：600px / 960px 两档断点，移动端汉堡菜单
- **自定义页面模板**：文章归档（含年份跳转）、标签云、搜索页（`/` 快捷键聚焦）
- **全宽页面**：自定义字段 `template: full-width` 隐藏侧栏
- **中文字体**：霞鹜文楷 Bold（中文网字计划 CDN），离线 fallback 系统衬线字体

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

## 未移植的功能

- 文章格式（aside / image / link / quote / status）
- Gutenberg 块编辑器样式
- WordPress Customizer / 自定义页头图片
- 动态小工具系统（Typecho 无对应机制）
- Internet Explorer 兼容
- i18n 翻译（全部硬编码为中文）

## 许可证

GPLv2 or later（继承自原始 WordPress 主题）
