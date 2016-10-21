	<!-- BEGIN DASHBOARD STATS -->
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue">
					<div class="visual">
						<i class="fa fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php $totalPlayer = getTotalPlayersCount(); 
							 if($totalPlayer){ echo count($totalPlayer); } else{ echo "00"; }
							 ?>
						</div>
						<div class="desc">
							 Total Players
						</div>
					</div>
					<a class="more" href="<?php echo BASE_URL; ?>admin-player-list">
						 View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue">
					<div class="visual">
						<i class="fa fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							 <?php $totalActivePlayer = getTotalActivePlayer(); 
							 if($totalActivePlayer){ echo count($totalActivePlayer); } else{ echo "00"; }
							 ?>
						</div>
						<div class="desc">
							 Total Active Players
						</div>
					</div>
					<a class="more" href="<?php echo BASE_URL; ?>admin-player-list">
						 View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>

			
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat green">
					<div class="visual">
						<i class="fa fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							<?php 
							 $totalContact = getContactCount(); 
							 if($totalContact){ echo count($totalContact); } else{ echo "00"; }
							 ?>
						</div>
						<div class="desc">
							 Total Contact User
						</div>
					</div>
					<a class="more" href="<?php echo BASE_URL; ?>admin-contact-us-list">
						 View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
			
		</div>
		<!-- END DASHBOARD STATS -->
		<div class="clearfix"></div>

			<!-- END CONTENT -->