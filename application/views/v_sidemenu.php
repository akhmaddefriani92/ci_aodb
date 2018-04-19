<?php
#print_r($menu);
#print_r($menu->result_array());
$icons = array (
   'fa-plane', 'fa-rocket',  'fa-home',  'fa-users',  'fa-rockets',  'fa-bookmark',  'fa-link',  'fa-desktop',  'fa-deviantart',  'fa-diamond',  'fa-magnet', 'fa-link','fa-tasks','fa-cogs','fa-random','fa-comment','fa-magnet','fa-chevron-up','fa-chevron-down','fa-retweet','fa-shopping-cart','fa-folder','fa-folder-open' ,'fa-arrows-v','fa-arrows-h','fa-bar-chart','fa-twitter-square','fa-facebook-square','fa-camera-retro'  ,'fa-key','fa-cogs'  ,'fa-comments','fa-thumbs-o-up','fa-thumbs-o-down'
    );
foreach($menu->result_array() as $value){
    $no = $value["no"];
?>
     <!-- Optionally, you can add icons to the links -->
<li><a class="app-menu__item" href="<?php echo site_url("$value[navi_link]");?>"><i class="app-menu__icon fa <?php echo $icons[$no];?>"></i><span class="app-menu__label"><?php echo $value["navi_menu"];?></span></a></li>


<?php
// print_r($value);
}

?>