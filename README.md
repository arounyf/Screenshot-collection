### 使用场景
- 帮助团支书收集青年大学习截图
- 其他截图的收集

### 所需材料
- 服务器一台（推荐使用腾讯云）
- 腾讯云cos对象存储（免费，对接高速下载）
- 微信（接收通知）

### 支持功能
- 上传文件格式设置
- 上传时进度条显示
- 查看提交情况
- 截图自动打包下载
- 收集完成时主动通知
- 删除提交错误的截图
- 高速下载打包文件
- 主题设置

### 系统结构
- index.php 系统主页
- admin.php 系统后台
- wtj.php 提交情况 
- nav.php 导航栏
- login.php 后台登录界面
- uploud  截图保持目录
- config 配置目录
  - db.php 数据库配置
  - main.php 主要配置
  - api.php 接口配置
- function 功能模块目录

  - clear.php 退出登录

  - d.php 截图打包下载

  - delete.php 系统重置
  - doption.php 删除某项错误截图
  - fastd.php 截图打包高速下载
  - session.php  系统登录会话
  - upload.php 截图上传



