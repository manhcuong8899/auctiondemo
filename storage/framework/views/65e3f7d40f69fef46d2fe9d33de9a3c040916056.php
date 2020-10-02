<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	<?php /*	<div class="text-center logo-panel">
			<img src="<?php echo e(asset('/public/images/logo/logo.png')); ?>" style="height: 150px;" class="user-image" alt="GOLD SEA">
		</div>
		<?php if(Auth::user()): ?>
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				  <?php if(Auth::user()->hasProfile()): ?>
					<a href="<?php echo e(Auth::user()->profilePath()); ?>"><img src="<?php echo e(get_gravatar(Auth::user()->email, 160)); ?>" class="" alt="User Image"></a>
				<?php else: ?>
					<a href="<?php echo e(url('admin/users/'.Auth::user()->username.'/edit')); ?>"><img src="<?php echo e(get_gravatar(Auth::user()->email, 160)); ?>" class="" alt="User Image"></a>
				<?php endif; ?>
			</div>
			<div class="pull-left info">
				<?php if(Auth::user()->hasProfile()): ?>
					<p><a href="<?php echo e(Auth::user()->profilePath()); ?>"><?php echo e(Auth::user()->full_name); ?></a></p>
				<?php else: ?>
					<p><a href="<?php echo e(url('admin/users/'.Auth::user()->username.'/edit')); ?>"><?php echo e(Auth::user()->full_name); ?></a></p>
				<?php endif; ?>
				
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<?php endif; ?>*/ ?>

		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<?php echo $__env->make('includes.mainnavigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>