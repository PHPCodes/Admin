<div id="top" style='background:#000 url("<?php echo $this->webroot; ?>img/backgrounds/top.jpg") repeat fixed !important;'>
    <div class="wrapper">
        <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'dashboard'));?>" title="" class="logo">
            <img src="/img/logo.png" style='margin-top: -10px;'/>
        </a>
        
        <!-- Right top nav -->
        <div class="topNav">
            <ul class="userNav">
                <li><a href="#" title="" class="screen" style='background:url("<?php echo $this->webroot; ?>img/icons/usernav/screen.png") no-repeat scroll 9px 9px transparent;'></a></li>
                <li><a href="#" title="" class="settings" style='background:url("<?php echo $this->webroot; ?>img/icons/usernav/settings.png") no-repeat scroll 9px 9px transparent;'></a></li>
                <li><a href="#" title="" class="logout" style='background:url("<?php echo $this->webroot; ?>img/icons/usernav/logout.png") no-repeat scroll 9px 9px transparent;'></a></li>
                <li class="showTabletP"><a href="#" title="" class="sidebar"></a></li>
            </ul>
            <a title="" class="iButton"></a>
            <a title="" class="iTop"></a>
            <div class="topSearch">
                <div class="topDropArrow"></div>
                <form action="">
                    <input type="text" placeholder="search..." name="topSearch" />
                    <input type="submit" value="" />
                </form>
            </div>
        </div>
        
    </div>
</div>