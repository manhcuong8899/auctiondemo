	<header class="main-header">
		<!-- Logo -->
		<a href="/" class="logo" target="bank">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini">CMS</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg">HỆ QUẢN TRỊ</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">

						<!-- Authentication Links -->
						<?php if(Auth::guest()): ?>
						<li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('VNPCMS.forms.labels.login')); ?></a></li>
						<?php if(crminfo('enable_registration') == 1): ?>
						<li><a href="<?php echo e(url('/register')); ?>"><?php echo e(trans('VNPCMS.forms.labels.register')); ?></a></li>
						<?php endif; ?>
						<?php else: ?>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php /*<img src="<?php echo e(get_gravatar(Auth::user()->email, 160)); ?>" class="user-image">*/ ?>
							<span class="hidden-xs"><?php echo e(Auth::user()->full_name); ?></span> <i class="caret"></i>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<?php /*<img src="<?php echo e(get_gravatar(Auth::user()->email, 160)); ?>" class="" alt="User Image">
								<p>*/ ?>
									<?php echo e(Auth::user()->full_name); ?>

									<small>Member since Nov. 2017</small>
								</p>
							</li>

							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<?php if(!Auth::user()->hasProfile() AND Auth::user()->hasRole(['member', 'administrator'])): ?>
										<a href="<?php echo e(url('admin/users/'.Auth::user()->username.'/edit')); ?>" class="btn btn-default btn-flat"><?php echo e(trans('VNPCMS.forms.labels.editaccount')); ?></a><br /><br />
										<a href="<?php echo e(url('admin/profiles/'. Auth::user()->username .'/create')); ?>" class="btn btn-success btn-flat"><?php echo e(trans('VNPCMS.forms.labels.createprofile')); ?></a>
									<?php elseif(Auth::user()->hasProfile()): ?>
										<a href="<?php echo e(url(Auth::user()->profilePath())); ?>" class="btn btn-default btn-flat"><?php echo e(trans('VNPCMS.forms.labels.profile')); ?></a>
									<?php else: ?>
										<a href="<?php echo e(url('admin/users/'.Auth::user()->username.'/edit')); ?>" class="btn btn-default btn-flat">Edit Account</a>
									<?php endif; ?>
								</div>
								<div class="pull-right">
									<a href="<?php echo e(url('/admin/logout')); ?>" class="btn btn-default btn-flat"><i class="fa fa-power-off text-red"></i> <?php echo e(trans('VNPCMS.forms.labels.logout')); ?></a>
								</div>
							</li>
						</ul>
					</li>
					<?php endif; ?>
					<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('config_management')): ?>
						<!-- Control Sidebar Toggle Button -->
						<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
	</header>