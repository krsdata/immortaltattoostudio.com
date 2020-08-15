
<div class="nav">
  <div class="table">
   
    <div class="nav-divider">&nbsp;</div>
	
	 <ul <?php if($curPage=='user' || $curPage=='page'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
      <li><a href="manage-user.php"><b>Immortal tattoo</b></a>
        <div class="select_sub show">
          <ul class="sub">
            <li <?php if($curSubPage=='view_user'){ echo 'class="sub_show"';}?>><a href="manage-user.php">View Gallery</a></li>
            <li <?php if($curSubPage=='add_user'){ echo 'class="sub_show"';}?>><a href="add-edit-gallery.php">Add Gallery Image</a></li> 
			<li <?php if($curSubPage=='add_keyword'){ echo 'class="sub_show"';}?>><a href="add-keyword.php">Add keyword</a></li>
			<li <?php if($curSubPage=='view_keyword'){ echo 'class="sub_show"';}?>><a href="view-keyword.php">View keyword</a></li>
		 
          </ul>
        </div>
      </li>
    </ul> 
      <div class="nav-divider">&nbsp;</div>
   <!-- <ul <?php if($curPage=='adduser'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
      <li><a href="manage-admin-user.php"><b>Users</b></a>
        <div class="select_sub show">
          <ul class="sub">
            <li <?php if($curSubPage=='manage_user'){ echo 'class="sub_show"';}?>><a href="manage-admin-user.php">View all users</a></li>
            <li <?php if($curSubPage=='add_user'){ echo 'class="sub_show"';}?>><a href="add-edit-admin-user.php">Add user</a></li>
          </ul>
        </div>
      </li>
    </ul>-->
   
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
