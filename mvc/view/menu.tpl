    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
<?php
 if(isset($_SESSION)){
?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo SYS_BASE; ?>"><?php echo SYS_NAME; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="javascript:void(0);" role="button" aria-expanded="false">
                Home <span class="caret"></span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php echo (isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Perfil'); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo SYS_BASE; ?>/account">Minha conta</a></li>
                <li><a href="<?php echo SYS_BASE; ?>/support">Suporte</a></li>
                <li><a href="<?php echo SYS_BASE; ?>/auth/logoff">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
<?php
 } else {
?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo SYS_BASE; ?>"><?php echo SYS_NAME; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="<?php echo SYS_BASE; ?>/login" method="post">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="Password" class="form-control">
            </div>
          </form>
        </div>
<?php
 }
?>
      </div>
    </nav>
