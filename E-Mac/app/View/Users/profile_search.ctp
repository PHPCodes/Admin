<?php echo $this->element('top-header'); ?>
<?php echo $this->Html->script(array('jquery.form')); ?>
<div class="container-fluid">
   <div class="row-fluid"> 
  <div class="span12">
                    <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                     <div class="alert alert-block" style="margin-left:10px; margin-top:5px; width:88%;background-color:#5DA150;color:white;">
<button type="button" class="close" data-dismiss="alert">&times;</button>                
                    <strong><?php echo $x; ?></strong>
                   </div>
                   <?php }?> 
                    </div
  </div>
    <div class="row-fluid">       
        <div class="span8">
            <span class="upr" style="color:green;"></span>
            <div class="top">
                
                <div class="well" style="margin-top:15px;">
                <h3>Search for people </h3>               
	          <div class="input-append" style="margin: 10px 0px 5px 0px;">
                    <?php echo $this->Form->create('Users',array('action'=>'profile_search')); ?>
                      <input type="text" class="span7" name="search" placeholder="Keywords">
                    <div class="btn-group">
                        <button class="btn btn-primary" type="submit">Search</button>                      
                    </div>
                   </form>                   
                 </div>      	
                </div>
                <div class="well" >
                   <div class="row-fluid">
                             <div class="span10">
                                                                 
                                        <?php if(@$search){ ?>
                                        <div class="">      
                                       <h5><?php echo count(@$search); ?> results found.</h5>
                                        
                                              <?php foreach(@$search as $sea){ 
                                        if($sea['User']['usertype_id'] !=1){      if($sea['User']['first_name']){?>
                <div style="min-height:65px;" class="well well-small">
               <?php if($sea['User']['profile_image']){?>
                <img style="height:60px; width:60px" src="/files/profileimage/<?php echo $sea['User']['profile_image']; ?>" align="left" hspace="5" />
              <?php  }else{ ?>
                    <img style="height:60px; width:60px" src="/img/homme.gif"/>    
             <?php    } ?>
               <a href="/users/profile_view/<?php echo $sea['User']['id']; ?>"><?php echo $sea['User']['first_name']."&nbsp;".$sea['User']['last_name']; ?></a><br />
                 </div>
                                              <?php }}} ?>
                                      </div>
                                        <?php } ?>
                                
                                 <div>
                                     <h4>People you may be interested</h4>
                                        <div id="pplumayknow">
                                              
                                        </div>
                                 </div>
                             </div>       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="span4 well-small well" style="margin-top:15px;">
                    <h4>New stories</h4>
                    <div>
                         <?php  foreach($news as $new){   ?>
                             <div class="well well-small tio_news">
                                <?php if($new['NewsArticle']['logo']){                                    
                                    echo $this->Html->image('/files/NAlogo/'.$new['NewsArticle']['id'].$new['NewsArticle']['logo'],array("style"=>"height:100px;width:250px;margin-bottom:15px;"));
                                }else{?>             
                                    <img style="height:100px; width:250px;margin-bottom:10px;" src="/img/joblogo.png"/>
                                <?php } ?>
                                    <p> <a href="/NewsArticles/view/<?php echo $new['NewsArticle']['id']; ?>"><?php echo $new['NewsArticle']['title']; ?></a><br /></p>
                                      <p><?php echo substr($new['NewsArticle']['description'],0,300)."....."; ?></p>   
                                     <p><a href="/NewsArticles/view/<?php echo $new['NewsArticle']['id']; ?>">Read More...&raquo;</a></p>
                                </div> 
                         <?php    } ?>                                                    
                        <?php  //if(@$twittersfeed->channel->item){foreach($twittersfeed->channel->item as $twit){   ?>
<!--                   <div style="min-height:65px;" class="well well-small">
                    <a href="<?php echo (string)$twit->link ; ?>"><?php echo (string)$twit->title;?></a><br />
                      <p><?php echo (string)$twit->pubDate ; ?></p>
                   <p><?php echo (string)$twit->description ; ?></p>
                   </div>-->
                        <?php    //}} ?>
<a class="twitter-timeline" href="https://twitter.com/Academatch" data-widget-id="353375711844765696">Tweets by @Academatch</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                        <div id="newsfeed"></div> 
                    </div>                      
                </div>
    </div>
</div>
<?php echo $this->element('footer'); ?>
<?php echo $this->Html->script(array('jquery.form')); ?>
<script type="text/javascript"> 
   

   function news_updates(){
         $.post('/Home/newsfeeds',function(d){
             //$('#newsfeed').children('div').slideUp();
           // $('#newsfeed').html('');
            d = JSON.parse(d);
            var x = '';            
            for(i = 0; i<d.length;i++){
                if(d[i].Company){
                    x += '<div class="well well-small tio_news">';
                    if(d[i].Company.logo){
                         x += '<a href="/companies/view/'+d[i].Company.company_name+'"><img style="height:100px; width:250px;margin-bottom:10px;" src="/files/companyimg/'+d[i].Company.logo+'"/></a>';
                    }else{
                          x += '<a href="/companies/view/'+d[i].Company.company_name+'"><img style="height:100px; width:250px;margin-bottom:10px;" src="/img/joblogo.png"/></a>';                    
                      }
                  //  x += '<p><a href="/Grants/view/'+d[i].Grant.id+'">'+d[i].Grant.title+'</a></p>';
                    x +=  '<p><a href="/companies/view/'+d[i].Company.company_name+'">'+d[i].Company.company_name+'</a></p>' ;
                    x += '<p><b>'+d[i].Companyupdate.title +'</b></p>';
                    x += '<p>'+d[i].Companyupdate.description.substring(0,300) +'...</p>';  
                     x += '<p><a href="/companies/view/'+d[i].Company.company_name+'">Read More...&raquo;</a></p>';
                    x += '</div>';
                }else{
                    x += '<div class="well well-small tio_news">';
                    if(d[i].UserGroup.logo){
                         x += '<a href="/UserGroups/home_group/'+d[i].UserGroup.group_name+'"><img style="height:100px; width:250px;margin-bottom:10px;" src="/files/grouplogo/'+d[i].UserGroup.logo+'"/></a>';
                    }else{
                          x += '<a href="/UserGroups/home_group/'+d[i].UserGroup.group_name+'"><img style="height:100px; width:250px;margin-bottom:10px;" src="/img/joblogo.png"/></a>';                    
                      }
                  //  x += '<p><a href="/Grants/view/'+d[i].Grant.id+'">'+d[i].Grant.title+'</a></p>';
                    x +=  '<p><a href="/UserGroups/home_group/'+d[i].UserGroup.group_name+'">'+d[i].UserGroup.group_name+'</a></p>' ;
                    //x += '<p><b>'+d[i].Groupupdate.title +'</b></p>';
                    x += '<p>'+d[i].Groupupdate.description.substring(0,300) +'...</p>';    
                     x += '<p><a href="/UserGroups/home_group/'+d[i].UserGroup.group_name+'">Read More...&raquo;</a></p>';
                    x += '</div>';
                }
                
            }
            $('#newsfeed').html(x);
            //$('.tio_news:first').before(x);
            //$('.tio_news:last').remove();
        });
    } 



    
     function pplumk(){ 
        $.get('/Home/people',function(d){
            $('#pplumayknow').children('div').slideUp();
            $('#pplumayknow').html('');
            d = JSON.parse(d);
            var x = '';
            for(i = 0; i<d.length;i++){
                 if(d[i].User.first_name){
                x += '<div style="min-height:65px;" class="well well-small">';
                if(d[i].User.profile_image){
                x += '<img style="height:60px; width:60px" src="/files/profileimage/'+d[i].User.profile_image+'" align="left" hspace="5" />';
                }else{
                    x += '<img style="height:60px; width:60px" src="/img/homme.gif"/>'    
                }
                x += '<a href="/users/profile_view/'+d[i].User.id+'">'+d[i].User.first_name + ' '+d[i].User.last_name+'</a><br />' ;
                if(d[i].UserWorkSince.length > 0){
                    x += '<p>'+d[i].UserWorkSince[d[i].UserWorkSince.length - 1].exp_title+ ' at ' + d[i].UserWorkSince[d[i].UserWorkSince.length - 1].exp_company_name +'</p>';
                }else if(d[i].UserEducation.length > 0){
                    x += '<p>'+d[i].UserEducation[d[i].UserEducation.length - 1].edu_degree + '('+d[i].UserEducation[d[i].UserEducation.length - 1].edu_fieldofstudy+')'+ ' from ' + d[i].UserEducation[d[i].UserEducation.length - 1].edu_school +'</p>';
                }
               // x +='<a href="#connect" role="button" data-toggle="modal" onClick="javascript: $(\'#cnw\').val('+d[i].User.id+')" class="btn btn-small pull-right" style="margin-top:-15px;"><i class="icon-plus"></i> Connect</a>'
                x += '</div>';
            }}
            $('#pplumayknow').html(x);
        });
        
    }
    
//      function connections(){
//        $.post('/Home/connections',function(d){
//            d = JSON.parse(d);
//            if(d.count > 0){
//                $('#connectionscnt b').html(d.count + ' Connections');
//                x = '';
//                for(i = 0; i<d.count; i++){
//                    x += '<div style="height:45px;">';
//                    x += '<img style="height:40px; width:40px;margin:15px;" src="/files/profileimage/'+d.data[i].User.profile_image+'" align="absmiddle" hspace="5" />';
//                    x += '<a href="/users/profile_view/'+d.data[i].User.id+'" >'+d.data[i].User.first_name+ ' ' +d.data[i].User.last_name + '</a>';
//                    x += '</div>';
//                }
//                $('#yourconnections').html(x);
//            }
//        });
//    }
    
     $(document).ready(function(){
         // connections();
         pplumk();
        news_updates();
         pplumayknow = setInterval('pplumk()',10000);
         // pplumayknow = setInterval('pplumk()',5000);
          newsupdtes = setInterval('news_updates()',20000);
    });
</script> 
