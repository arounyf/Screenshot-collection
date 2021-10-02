<?php require "config/main.php";?>
<nav class="<?php echo $navcls;?>">
  <a class="navbar-brand" href="#"><?php echo $navna?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">系统主页<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="wtj.php">提交情况</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">后台管理</a>
      </li>
    </ul>
  </div>
</nav>