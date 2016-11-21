<section class="bnrInr">
     <div class="profilePicUser">   
        <div class="container">
            <div class="profilePicBnr">
                <div class="ppCntn">
                     <?php $user_info = userLoggedInInfo(); ?>
                <?php if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>
                 <img src="<?php echo TIMTHUMB.$profile_image. "&w=150&h=150"; ?>" alt="Profile Image" id="profileImage"/>
                    </div>
                    <div class="userLogin">
                        <span class="profileName"><?php if($user_info['club_name']){ echo ucfirst($user_info['club_name']); } ?>  </span>
                    </div>
                </div>
        </div>
  </div>
</section>

<div class="clubProfile">
    <div class="container">

        <?php $this->load->view("front/nav_menu"); 

        $positions = array("1"=>lang("goalkeeper"),
                             "2" =>lang("right_wing"),
                             "3" =>lang("center_back"),
                             "4" =>lang("left_back"),
                             "5" =>lang("left_wing"),
                             "6" =>lang("defensive_mid_fielder"),
                             "7" =>lang("right_mid_fielder"),
                             "8" =>lang("left_mid_fielder"),
                             "9" =>lang("right_forward"),
                             "10" =>lang("striker"),
                             "11" =>lang("left_forward")
                        );

        ?>

        <div class="clbPrflRght">
            <div class="topHead"><span><?php echo lang("heading_favorites_list"); ?></span></div>
            <div class="editSubHead"><p><?php echo lang("heading_your_favorites_list_here"); ?></p></div>
            <div class="comm-message"></div>
            <div class="advncSrch">
               
                <div>
                    <div class="srchPlyrsRw">    
                        <ul class="clearfix" id="searchPlayerResult">
                            <?php if(!empty($favorite_player)){ 
                                foreach ($favorite_player as $record) { ?>
                                <li id="show_hide_<?php echo $record['user_id']; ?>">                                    
                                    <div class="imgCnt">
                                       <?php 
                                       if($record['profile_image'] && $record['profile_image']!='null' && $record['profile_image']!=''){
                                            $profileImage = BASE_URL.'public/uploads/profile_image/'.$record['profile_image'];    
                                        }else{
                                            $profileImage = BASE_URL.'public/front/assets/images/srchPlyr.jpg';    
                                       } 

                                       $radom_user_id = str_rand(5, 'numeric') . $record['user_id'];
                                       ?>
                                        <img src="<?php echo TIMTHUMB. $profileImage.'&w=150&h=150'; ?>" alt="Profile Image" />
                                        <a target="_blank" href="<?php echo BASE_URL;?>player-details/<?php echo base64_encode($radom_user_id); ?>"><?php echo lang("common_button_view_detail");?></a>
                                    </div>

                                    <div class="pNameLike clearfix">
                                        <?php 
                                            if($record['first_name']){ ?>
                                                <div class="plyrName"><?php echo ucfirst($record['first_name'].' '.$record['last_name']); ?></div>
                                            <?php }else{ ?>
                                                <div class="plyrName">N/A</div>
                                        <?php } ?>

                                        <div class="likeIcn liked">
                                            <?php 
                                                //$fevorite = $obj->get_favorite_player_for_search($this->player_id);

                                                if($record['favorite_status']==0){ ?>
                                                    <i title="<?php echo lang("title_and_heading_unfavorite"); ?>" id="like_status_<?php echo $record['user_id']; ?>" data-unique-val="hideshow_<?php echo $record['user_id']; ?>" class="fa fa-heart-o likeDislike" data-rel="<?php echo $record['user_id']; ?>" aria-hidden="true"></i>   
                                                <?php }else{ ?>
                                                    <i title="<?php echo lang("title_and_heading_favorite"); ?>" id="like_status_<?php echo $record['user_id']; ?>" data-unique-val="hideshow_<?php echo $record['user_id']; ?>" class="fa fa-heart likeDislike" data-rel="<?php echo $record['user_id']; ?>" aria-hidden="true"></i>
                                            <?php } ?>
                                        </div>

                                      <?php 
                                        if($record['position_1']){ ?>
                                            <div class="position"><?php echo lang("common_heading_position").': '. ucfirst($positions[$record['position_1']]); ?></div>
                                        <?php }else{ ?>
                                            <div class="position">N/A</div>
                                      <?php } ?>

                                      <?php 
                                          if($record['age']){ ?>
                                              <div class="player_age"><?php echo lang("common_age_placeholder").': '. $record['age']; ?></div>
                                          <?php }else{ ?>
                                              <div class="player_age">N/A</div>
                                      <?php } ?>

                                    </div>
                                    

                                </li>
                            <?php }
                            } else { echo lang("no_data_found"); } ?>
                        </ul>
                    </div>
                    
                    
                    <!-- <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <li>
                          <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                          <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav> -->
                </div>
            </div>
        </div>


    </div>
</div>

<?php if(isset($search_count)) { ?>
        <script>
            var searcCount = "<?php echo $search_count; ?>";
        </script>
<?php } else{ ?>
        <script>
            var searcCount = "0";
        </script>
<?php } ?>

<!--=====this is use for mobile no mask=========-->
<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap-select.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.form.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/search_js/search.js"></script>
