<?php
$controller = $this->params['controller'];
$action     = $this->params['action'];

?>
<header>
			<div class="header_inner">
				<div class="logo"><a href="<?php echo $this->webroot;?>"><img src="<?php echo $this->webroot;?>/images/site/logo.png" border="0" alt="" /></a>
				</div>
				<div class="banner_add"><a href="#"><img src="<?php echo $this->webroot;?>/images/site/google_add.gif" border="0" alt="" /></a>
				</div>
			</div>
    
		</header>
<!--<div class="nav_main">			
			<div class="nav_inner">	
<div class="menu-button">Menu</div>
     <nav>
          <ul data-breakpoint="768" class="flexnav">
	
						<li class=""><a class="active" href="index.html">Home</a>
							<ul>								
								<li><a href="#">Joke of the day</a></li>
								<li><a href="#">Wallpaper of the day</a></li>         
								<li><a href="#">Cool Stuff</a></li>         
								<li><a href="#">Deals</a></li>
							</ul>
						</li>
						<li><a href="videos.html">Videos</a>
							<ul>								
								<li><a href="#">Comics</a></li>
								<li><a href="#">Spiritual</a></li>         
								<li><a href="#">Page 3</a></li>         
								<li><a href="#">Nursery Rhymes</a></li>         
							</ul>
						</li>         
						<li><a href="wallpapers.html">wallpapers</a>
							<ul>								
								<li><a href="#">Comics</a></li>
								<li><a href="#">Glamour</a></li>         
								<li><a href="#">Nature</a></li>         
								<li><a href="#">Events</a></li>
								<li><a href="#">Religious</a></li>
							</ul>
						</li>         
						<li><a href="thoughts.html">Thoughts</a>
							<ul>								
								<li><a href="#">Religious</a></li>
								<li><a href="#">Motivational</a></li>         
								<li><a href="#">Famous Sayings</a></li>
							</ul>
						</li>         
						<li><a href="recipes.html">recipes</a>
							<ul>								
								<li><a href="#">Veg Maincourse</a></li>
								<li><a href="#">Non-Veg Maincourse</a></li>         
								<li><a href="#">Cakes</a></li>
								<li><a href="#">Starters Veg</a></li>
								<li><a href="#">Starters Non-Veg</a></li>
								<li><a href="#">Mocktails</a></li>
								<li><a href="#">Cocktails</a></li>
							</ul>
						</li>         
						<li><a href="I-frame-websites.html">i-frame websites</a>
							<ul>								
								<li><a href="#">I-Frame of the day</a></li>
								<li><a href="#">News</a></li>         
								<li><a href="#">Deals</a></li>
								<li><a href="#">Horoscope</a></li>								
							</ul>
						</li>         
						<li><a href="games.html">games</a>
							<ul>								
								<li><a href="#">Game1</a></li>
								<li><a href="#">Game2</a></li>         
								<li><a href="#">Game3</a></li>
								<li><a href="#">Game4</a></li>								
							</ul>
						</li>         
						<li><a href="#">advertise</a></li>
						<li><a href="#">jokes</a></li>
						<li><a href="ebook.html">E-Book</a></li>
						<li><a href="characters.html">Characters</a></li>
					</ul>	
        </nav>
</div>
		</div>	-->
		<nav class="nav_main">			
			<div class="nav_inner">	
					<a class="toggleMenu" href="#">Menu</a>
					<ul class="nav">
						<li>
                                                    <a href="<?php echo $this->webroot;?>" <?php if($controller=='pages'){echo "class='navigationactive'";}?>>
                                                        Home
                                                    </a>

						</li>
						<li>
                                                    <a href="<?php echo $this->webroot;?>Videos" <?php if($controller=='Videos'){echo "class='navigationactive'";}?>>Videos</a>
                                                    <?php 
                                                      if(isset($vediocta))
                                                      {
                                                            
							   echo "<ul>";
                                                          foreach ($vediocta as $vedio)
                                                          {
                                                             
                                                     ?>
                                                            <li>
                                                                <a <?php if(($action == 'vediocat' || $action == 'viewallvedio') && isset($vedioctaid) && $vedioctaid == $vedio['Category']['id']) {?> class="activemainmenu"<?php } ?>href="<?php echo $this->webroot;?>Videos/vediocat/<?php echo $vedio['Category']['id']?>"><?php echo $vedio['Category']['name']?></a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                </li>  
                                                
						<li>
                                                    <a href="<?php echo $this->webroot;?>Wallpapers" <?php if($controller=='Wallpapers'){echo "class='navigationactive'";}?>>
                                                        Wallpapers
                                                    </a>
                                                    
                                                    <?php 
                                                      if(isset($walpapercta))
                                                      {
                                                          echo "<ul>";
                                                          foreach ($walpapercta as $wals)
                                                          {
                                                              
                                                     ?>
                                                            <li>
                                                                <a <?php if(($action == 'wallpapercat' || $action == 'viewallwallpaper') && isset($walpaperctaid) && $walpaperctaid == $wals['Category']['id']) {?> class="activemainmenu"<?php } ?> href="<?php echo $this->webroot;?>Wallpapers/wallpapercat/<?php echo $wals['Category']['id']?>"  >
                                                                    <?php echo $wals['Category']['name']?>
                                                                </a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                    
                                                </li>  
                                                
						<li>
                                                    <a href="<?php echo $this->webroot;?>Thoughts" <?php if($controller=='Thoughts'){echo "class='navigationactive'";}?>  >Thoughts</a>
                                                    
                                                    <?php 
                                                      if(isset($thoughtcta))
                                                      {
                                                          echo "<ul>";
                                                          foreach ($thoughtcta as $thought)
                                                          {
                                                              
                                                     ?>
                                                            <li>
                                                                <a <?php if(($action == 'thoughtcat' || $action == 'viewallthought' ) && isset($thoughtctaid) && $thoughtctaid == $thought['Category']['id']) {?> class="activemainmenu"<?php } ?> href="<?php echo $this->webroot;?>Thoughts/thoughtcat/<?php echo $thought['Category']['id']?>" >
                                                                    <?php echo $thought['Category']['name']?>
                                                                </a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                            
                                                </li>         
						<li>
                                                    <a href="<?php echo $this->webroot;?>Recipes"  <?php if($controller=='Recipes'){echo "class='navigationactive'";}?> >Recipes</a>
                                                    
                                                    <?php 
                                                      if(isset($recipecta))
                                                      {
                                                          echo "<ul>";
                                                          foreach ($recipecta as $recipe)
                                                          {
                                                              
                                                     ?>
                                                            <li>
                                                                <a <?php if(($action == 'recipescat' || $action == 'viewallrecipes' ) && isset($recipectaid) && $recipectaid == $recipe['Category']['id']) {?> class="activemainmenu"<?php } ?> href="<?php echo $this->webroot;?>Recipes/recipescat/<?php echo $recipe['Category']['id']?>" >
                                                                    <?php echo $recipe['Category']['name']?>
                                                                </a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                            
                                                </li>         
						<li>
                                                    <a href="<?php echo $this->webroot;?>Iframes"  <?php if($controller=='Iframes'){echo "class='navigationactive'";}?>  >i-frame websites</a>
                                                    <?php 
                                                      if(isset($iframecta))
                                                      {
                                                          echo "<ul>";
                                                          foreach ($iframecta as $iframe)
                                                          {
                                                              
                                                     ?>
                                                            <li>
                                                                <a href="#"><?php echo $iframe['Category']['name']?></a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                </li>         
						<li>
                                                    <a href="<?php echo $this->webroot;?>Games"  <?php if($controller=='Games'){echo "class='navigationactive'";}?>  >games</a>
                                                    
                                                    <?php 
                                                      if(isset($gamescta))
                                                      {
                                                          echo "<ul>";
                                                          foreach ($gamescta as $games)
                                                          {
                                                              
                                                     ?>
                                                            <li>
                                                                <a <?php if(($action == 'gamecat' || $action == 'viewallgame' ) && isset($gamectaid) && $gamectaid == $games['Category']['id']) {?> class="activemainmenu"<?php } ?> href="<?php echo $this->webroot;?>Games/gamecat/<?php echo $games['Category']['id']?>">
                                                                    <?php echo $games['Category']['name']?>
                                                                </a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                            
                                                </li>         
						        
						<li><a href="#">jokes</a></li> 
                                                
						<li>
                                                    <a href="<?php echo $this->webroot;?>Ebooks" <?php if($controller=='Ebooks'){echo "class='navigationactive'";}?>   >
                                                        E-Book
                                                    </a>
                                                    <?php 
                                                      if(isset($ebookcta))
                                                      {
                                                          echo "<ul>";
                                                          foreach ($ebookcta as $ebook)
                                                          {
                                                              
                                                     ?>
                                                            <li>
                                                                <a <?php if(($action == 'ebookcat' || $action == 'viewallebook' ) && isset($ebookctaid) && $ebookctaid == $ebook['Category']['id']) {?> class="activemainmenu"<?php } ?> href="<?php echo $this->webroot;?>Ebooks/ebookcat/<?php echo $ebook['Category']['id']?>"> 
                                                                    <?php echo $ebook['Category']['name']?>
                                                                </a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                </li>         
						<li>
                                                    <a href="<?php echo $this->webroot;?>Characters" <?php if($controller=='Characters'){echo "class='navigationactive'";}?>   >Characters</a>
                                                    
                                                    <?php 
                                                      if(isset($charctercta))
                                                      {
                                                          echo "<ul>";
                                                          foreach ($charctercta as $charcter)
                                                          {
                                                              
                                                     ?>
                                                            <li>
                                                                <a <?php if(($action == 'charactercat' || $action == 'viewallcharacter' ) && isset($characterctaid) && $characterctaid == $charcter['Category']['id']) {?> class="activemainmenu"<?php } ?> href="<?php echo $this->webroot;?>Characters/charactercat/<?php echo $charcter['Category']['id']?>"> 
                                                                    <?php echo $charcter['Category']['name']?>
                                                                </a>
                                                            </li>
                                                     
                                                    <?php 
                                                          }
                                                           echo "</ul>";
                                                      }
                                                    ?>
                                                            
                                                </li>
					</ul>
				
				<div class="login_sign">
					<ul>
                                            <?php if (!empty($ui)) {?>
                                                <li><a class="active" href="<?php echo $this->webroot;?>Users/logout">Logout</a></li>
                                            <?php } else{?>
						<li><a href="<?php echo $this->webroot;?>Users/signup">Sign UP</a></li>
						<li><a class="active" href="<?php echo $this->webroot;?>Users/login">Login</a></li>
                                            <?php }?>
					</ul>
				</div>
			</div>
</nav>

<div class="text_area_main">
			<div class="text_area_inner">
				<div class="text_top">
					<div class="search_main">
						<div class="search_inner">
							<div class="search_textbox_con">
								<input class="search_textbox" value="Search" type="text">
							</div>
							<div class="search_button"><a href="#"><img src="<?php echo $this->webroot;?>/images/site/search_button.gif" border="0" alt="" /></a>
							</div>
						</div>
					</div>
