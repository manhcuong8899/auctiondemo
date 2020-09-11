<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý khách hàng</h1>
</section>

<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Danh sách khách hàng</h3>
		</div>
		<div class="box-body">
			<a href="#"><button type="button" class="btn btn-success" id="exportExcel">Kết xuất</button> </a>
			<?php /*<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer_management')): ?>
				<a class="btn btn-success btn-md" data-toggle="modal" data-target="#addnewuser">
					<i class="fa fa-plus"></i> Thêm khách hàng
				</a>
			<?php endif; ?>*/ ?>
			<br style="clear:both;">
			<br style="clear:both;">
			<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer_management')): ?>
				<table id="alluserstable" class="table table-responsive table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>STT</th>
						<?php /*	<th>Họ và tên</th>*/ ?>
							<th>Email</th>
							<th>Danh hiệu</th>
							<th>Xác nhận</th>
							<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('user_management')): ?>
								<th><?php echo e(trans('VNPCMS.forms.tables.columns.action')); ?></th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach( $users as $key=>$user ): ?>
							<tr>
								<td> <?php echo e($key+1); ?></td>
						<?php if($user->hasProfile()==true): ?>
									<td><a href="<?php echo e(url('admin/members/show/'.$user->username)); ?>"><?php echo e($user->full_name); ?></a></td>
								<?php else: ?>
									<td><?php echo e($user->full_name); ?></td>
								<?php endif; ?>
								<td><a href="<?php echo e(url('admin/members/show/'.$user->email)); ?>"><?php echo e($user->email); ?></a></td>
								<td>
									<?php echo $user->isVerified() ? '<i class="fa fa-check text-green"></i>' : '<i class="fa fa-close text-red"></i>'; ?>

									<?php if(!$user->isVerified()): ?>
										<?php echo Form::open(['method' => 'PATCH', 'url' => url('admin/users/'.$user->email.'/verify'), 'style' => 'float:right;']); ?>

										<button type="submit" data-toggle="tooltip" title="<?php echo e(trans('VNPCMS.forms.titles.verifyuser')); ?>" style="align:right;" class="btn btn-xs btn-default btn-flat"><i class="fa fa-check text-green"></i></button>
										<?php echo Form::close(); ?>

									<?php endif; ?>
								</td>
								<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer_management')): ?>
									<td>
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('user_management')): ?>
											<?php if($user->username != crminfo('admin_username')): ?>
												<button type="button" data-toggle="tooltip" title="<?php echo e(trans('VNPCMS.forms.titles.editroles')); ?>" class="btn btn-xs btn-default btn-flat" onclick="editUserRoles('<?php echo e(url('admin/roles/user/'.$user->username)); ?>')"><i class="fa fa-eye"></i> Phân quyền</button>
											<?php endif; ?>
										<?php endif; ?>
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer_management')): ?>
											<button type="button" data-toggle="tooltip" title="<?php echo e(trans('VNPCMS.forms.titles.edit')); ?>" class="btn btn-xs btn-default btn-flat" onclick="editUser('<?php echo e(url('admin/users/'.$user->username)); ?>')"><i class="fa fa-edit text-blue"></i></button>
										<?php endif; ?>
										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer_management')): ?>
											<?php if($user->username != crminfo('admin_username')): ?>
												<button type="button" data-username="<?php echo e($user->username); ?>" data-userdeleteurl="<?php echo e(url('admin/users/'.$user->username)); ?>" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmUserDelete"><i class="fa fa-trash text-red" data-toggle="tooltip" title="<?php echo e(trans('VNPCMS.forms.titles.delete')); ?>"></i></button>
											<?php endif; ?>
										<?php endif; ?>
										<?php echo $user->hasProfile() ? '' : '<a data-toggle="tooltip" title="Tạo Profile" class="btn btn-xs btn-default btn-flat" href="'.url("admin/profiles/".$user->username."/create").'"><i class="fa fa-plus text-green"></i></a>'; ?>


									</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="pull-right">
					<?php /*<ul class="pagination">
						<?php echo $users->render(); ?>

					</ul>*/ ?>
				</div>
			<?php endif; ?>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
	<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('user_management')): ?>
		<div class="modal fade" tabindex="-1" role="dialog" id="addnewuser">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title"><?php echo e(trans('VNPCMS.pages.subtitles.createnewuser')); ?></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<form role="form" id="addNewUserForm" method="POST" action="<?php echo e(url('admin/users')); ?>">
								<?php echo csrf_field(); ?>

								<div class="col-md-6">
										
									<div class="form-group<?php echo e($errors->has('full_name') ? ' has-error' : ' has-feedback'); ?>">
										<label for="full_name"><?php echo e(trans('VNPCMS.forms.labels.fullname')); ?>*</label>
										<input type="text" class="form-control" placeholder="<?php echo e(trans('VNPCMS.forms.placeholders.namesurname')); ?>" name="full_name" value="<?php echo e(old('full_name') ? old('full_name') : ''); ?>" required>
										<?php if($errors->has('full_name')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('full_name')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ' has-feedback'); ?>">
										<label for="username"><?php echo e(trans('VNPCMS.forms.labels.username')); ?>*</label>
										<input type="text" class="form-control" placeholder="<?php echo e(trans('VNPCMS.forms.placeholders.username')); ?>" name="username" value="<?php echo e(old('username') ? old('username') : ''); ?>" required>
										<?php if($errors->has('username')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('username')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ' has-feedback'); ?>">
										<label for="email"><?php echo e(trans('VNPCMS.forms.labels.email')); ?>*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
											<input type="email" class="form-control" placeholder="user@email.com" name="email" value="<?php echo e(old('email') ? old('email') : ''); ?>" required>
										</div>
										<?php if($errors->has('email')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('email')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									
					              <div class="clearfix"></div><br />
									
								</div>
								<div class="col-md-6">
									<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ' has-feedback'); ?>">
										<label for="password"><?php echo e(trans('VNPCMS.forms.labels.password')); ?>*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control genpasswd" name="password" data-size="11" data-character-set="a-z,A-Z"  value="<?php echo e(old('password')); ?>" required>
										</div>
										<?php if($errors->has('password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ' has-feedback'); ?>">
										<label for="password_confirmation"><?php echo e(trans('VNPCMS.forms.labels.confirmpassword')); ?>*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control genpasswd" name="password_confirmation" data-size="11" data-character-set="a-z,A-Z"  value="<?php echo e(old('password_confirmation')); ?>" required>
										</div>
										<?php if($errors->has('password_confirmation')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password_confirmation')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-default btn-sm btn-genpasswd"><?php echo e(trans('VNPCMS.forms.buttons.generatepasswd')); ?></button>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="checkbox" class="minimal margin-r-5" name="notify" value="yes"/>&nbsp;<?php echo e(trans('VNPCMS.forms.checkboxes.notifyusernewacc')); ?><br />
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo e(trans('VNPCMS.forms.buttons.create')); ?></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
		<?php if($errors->has('error_code') AND $errors->first('error_code') == 5): ?>
			<script type="text/javascript">
				$('#addnewuser').modal('show');
			</script>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('user_management')): ?>
		<div class="modal fade" tabindex="-1" role="dialog" id="editUser">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title"><?php echo e(trans('VNPCMS.pages.subtitles.edituser')); ?></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<form role="form" id="editUserForm" method="POST" action="<?php echo e(url('admin/users/'.$user->username)); ?>">
									<?php echo method_field('PATCH'); ?>

									<?php echo csrf_field(); ?>

									<div class="form-group<?php echo e($errors->has('full_name') ? ' has-error' : ' has-feedback'); ?>">
										<label for="full_name"><?php echo e(trans('VNPCMS.forms.labels.fullname')); ?>*</label>
										<input type="text" class="form-control" placeholder="<?php echo e(trans('VNPCMS.forms.placeholders.namesurname')); ?>" name="full_name" value="<?php echo e(old('full_name') ? old('full_name') : ''); ?>" required>
										<?php if($errors->has('full_name')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('full_name')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ' has-feedback'); ?>">
										<label for="email"><?php echo e(trans('VNPCMS.forms.labels.email')); ?>*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
											<input type="email" class="form-control" placeholder="user@email.com" name="email" value="<?php echo e(old('email') ? old('email') : ''); ?>" required>
										</div>
										<?php if($errors->has('email')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('email')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo e(trans('VNPCMS.forms.buttons.save')); ?></button>
									</div>
								</form>
							</div>
							<div class="col-md-6">
								<!-- <h4>Change password</h4> -->
								<form role="form" id="editPasswordForm" method="POST" action="<?php echo e(url('admin/users/'.$user->username.'/password')); ?>">
									<?php echo method_field('PATCH'); ?>

									<?php echo csrf_field(); ?>

									<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ' has-feedback'); ?>">
										<label for="password"><?php echo e(trans('VNPCMS.forms.labels.newpassword')); ?>*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" required>
										</div>
										<?php if($errors->has('password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ' has-feedback'); ?>">
										<label for="password_confirmation"><?php echo e(trans('VNPCMS.forms.labels.confirmnewpassword')); ?>*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" required>
										</div>
										<?php if($errors->has('password_confirmation')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password_confirmation')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo e(trans('VNPCMS.forms.buttons.change')); ?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
			<?php if($errors->has('error_code') AND $errors->first('error_code') == 6): ?>
				<script type="text/javascript">
					$('#editUser').modal('show');
				</script>
			<?php endif; ?>
	<?php endif; ?>
	<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('user_management')): ?>
		<div class="modal fade" tabindex="-1" role="dialog" id="confirmUserDelete">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title"><?php echo e(trans('VNPCMS.pages.subtitles.confirmuserdeletion')); ?></h4>
						</div>
						<div class="modal-body">
							<p><?php echo e(trans('VNPCMS.forms.help.areyousure')); ?> <b><span id="username"></span></b>?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo e(trans('VNPCMS.forms.buttons.close')); ?></button>
							<?php echo Form::open(['method' => 'DELETE', 'id'=>'delForm']); ?>

							<button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> <?php echo e(trans('VNPCMS.forms.buttons.delete')); ?></button>
							<?php echo Form::close(); ?>

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
		</div>
	<?php endif; ?>
	<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('user_management')): ?>
		<div class="modal fade" tabindex="-1" role="dialog" id="editUserRoles">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title"><?php echo e(trans('VNPCMS.pages.subtitles.editroles')); ?></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<form role="form" id="updateUserRolesForm" method="POST" action="">
									<?php echo csrf_field(); ?>

									<label for="roles"><?php echo e(trans('VNPCMS.forms.labels.roles_u')); ?></label><br />
										<?php foreach(crmRoles() as $role): ?>
											<div class="form-group">
												<input type="radio" class="minimal margin-r-5" name="roles" value="<?php echo e($role->name); ?>" />&nbsp;&nbsp;<?php echo e($role->label . ' (' . $role->name . ')'); ?><br />
											</div>
										<?php endforeach; ?>
									<br style="clear:both;">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo e(trans('VNPCMS.forms.buttons.save')); ?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
	<?php endif; ?>
</section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>