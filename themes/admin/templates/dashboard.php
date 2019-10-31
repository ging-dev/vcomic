<div class="col-lg-3 col-md-6 col-sm-6">
	<div class="card card-stats">
		<div class="card-body">
			<div class="row">
				<div class="col-5 col-md-4">
					<div class="icon-big text-center icon-warning">
						<i class="fas fa-users text-warning"></i>
					</div>
				</div>
				<div class="col-7 col-md-8">
					<div class="numbers">
						<p class="card-category">Users</p>
						<p class="card-title"><?= count_users('>=', 0) ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<hr>
	        <div class="stats">
	        	<a href="/admin/users"><i class="far fa-external-link"></i> Quản Lý Thành Viên</a>
	        </div>
	    </div>
	</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
	<div class="card card-stats">
		<div class="card-body">
			<div class="row">
				<div class="col-5 col-md-4">
					<div class="icon-big text-center icon-success">
						<i class="fal fa-books text-success"></i>
					</div>
				</div>
				<div class="col-7 col-md-8">
					<div class="numbers">
						<p class="card-category">Categories</p>
						<p class="card-title"><?= count_categories() ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<hr>
            <div class="stats">
            	<a href="/admin/categories"><i class="far fa-external-link"></i> Quản Lý Thư Mục</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
	<div class="card card-stats">
		<div class="card-body">
			<div class="row">
				<div class="col-5 col-md-4">
					<div class="icon-big text-center icon-primary">
						<i class="fal fa-book text-primary"></i>
					</div>
				</div>
				<div class="col-7 col-md-8">
					<div class="numbers">
						<p class="card-category">Stories</p>
						<p class="card-title"><?= count_all_stories() ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<hr>
            <div class="stats">
            	<a href="/admin/stories"><i class="far fa-external-link"></i> Quản Lý Truyện</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
	<div class="card card-stats">
		<div class="card-body">
			<div class="row">
				<div class="col-5 col-md-4">
					<div class="icon-big text-center icon-danger">
						<i class="fal fa-book-open text-danger"></i>
					</div>
				</div>
				<div class="col-7 col-md-8">
					<div class="numbers">
						<p class="card-category">Chapters</p>
						<p class="card-title"><?= count_chapters() ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<hr>
            <div class="stats">
            	<a href="/admin/#"><i class="far fa-external-link"></i> Quản Lý</a>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Danh Sách BQT</h4>
			<a href="/admin/user/new" class="btn btn-sm btn-success">
				<i class="far fa-plus-circle"></i> Thêm Thành Viên
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table">
					<thead class=" text-primary">
						<th>Username</th>
						<th>Tên</th>
						<th>Email</th>
						<th>Online Lần Cuối</th>
						<th>Tham Gia Lúc</th>
						<th class="text-right">Hành Động</th>
                    </thead>
                    <tbody>
                    <?php if ($total): ?>
						<?php foreach ($list_mods as $data): ?>
	                    	<tr>
	                    		<td><?= $data['username'] ?></td>
	                    		<td><?= display_name($data['role'], $data['fullname']) ?></td>
	                    		<td><?= $data['email'] ?></td>
	                    		<td><?= date('H:i | d-m-Y', $data['login_at']) ?></td>
	                    		<td><?= date('H:i | d-m-Y', $data['created_at']) ?></td>
	                    		<td class="text-right">
	                    		<?php if ($data['role'] != 0): ?>
	                    			<button class="btn btn-sm btn-outline-primary btn-round btn-icon mr-4">
										<a href="/admin/user/ban/<?= $data['username'] ?>" class="text-warning"><i class="far fa-ban"></i></a>
									</button>
								<?php else: ?>
									<button class="btn btn-sm btn-outline-primary btn-round btn-icon mr-4">
										<a href="/admin/user/remove-ban/<?= $data['username'] ?>" class="text-success"><i class="fal fa-check-circle"></i></a>
									</button>
								<?php endif ?>
	                    			<button class="btn btn-sm btn-outline-success btn-round btn-icon mr-4">
										<a href="/admin/user/edit/<?= $data['id'] ?>" class="text-success"><i class="fas fa-pencil-alt"></i></a>
									</button>
									<button class="btn btn-sm btn-outline-danger btn-round btn-icon mr-4">
										<a href="/admin/user/del/<?= $data['username'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
									</button>
									<button class="btn btn-sm btn-outline-primary btn-round btn-icon">
										<a href="/<?= $data['username'] ?>" target="_blank" class="text-primary" title="Đi tới..."><i class="fas fa-external-link-alt"></i></a>
									</button>
	                    		</td>
	                    	</tr>
	                    <?php endforeach ?>
                    <?php else: ?>
						<tr>Chưa có mod nào, hãy bổ nhiệm 1 người có nhiệt huyết!</tr>
                    <?php endif ?>
                    </tbody>
                </table>
                <?= pagination('/admin/users', $total) ?>
            </div>
        </div>
    </div>
</div>