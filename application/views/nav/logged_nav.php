<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
	      		<a class="navbar-brand" href="http://www.naimouzahighschool.in/" target="_blank">NMHS</a>
			</div>
			
			<ul class="nav navbar-nav">
				<li>
					<a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				 <li class="dropdown">
                	 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                	 <span class="glyphicon glyphicon-use"></span> Hi <?php if(isset($logged_admin)){echo $logged_admin;} ?> <span class="caret"></span></a>
                     <ul class="dropdown-menu" role="menu">                     
                        <li><a href="<?php echo site_url('admin/logout'); ?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                     </ul>
                 </li>
			</ul>
			
		</div>
	</nav>