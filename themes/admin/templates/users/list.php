<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Danh Sách Thành Viên</h4>
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
						<th>Xu</th>
						<th>Email</th>
						<th>Online Lần Cuối</th>
						<th>Tham Gia Lúc</th>
						<th class="text-right">Hành Động</th>
                    </thead>
                    <tbody>
                    <?php if ($total): ?>
						<?php foreach ($list_users as $data): ?>
	                    	<tr>
	                    		<td><?= $data['username'] ?></td>
	                    		<td><?= display_name($data['role'], $data['fullname']) ?></td>
	                    		<td><?= $data['coin'] ?></td>
	                    		<td><?= $data['email'] ?></td>
	                    		<td><?= date('d-m-Y', $data['login_at']) ?></td>
	                    		<td><?= date('d-m-Y', $data['created_at']) ?></td>
	                    		<td class="text-right">
	                    		<?php if ($data['role'] != 0): ?>
	                    			<button class="btn btn-sm btn-outline-primary btn-round btn-icon mr-4">
										<a href="/admin/user/ban/<?= $data['id'] ?>" class="text-warning"><i class="far fa-ban"></i></a>
									</button>
								<?php else: ?>
									<button class="btn btn-sm btn-outline-primary btn-round btn-icon mr-4">
										<a href="/admin/user/remove-ban/<?= $data['id'] ?>" class="text-success"><i class="fal fa-check-circle"></i></a>
									</button>
								<?php endif ?>
	                    			<button class="btn btn-sm btn-outline-success btn-round btn-icon mr-4">
										<a href="/admin/user/edit/<?= $data['id'] ?>" class="text-success"><i class="fas fa-pencil-alt"></i></a>
									</button>
									<button class="btn btn-sm btn-outline-danger btn-round btn-icon mr-4">
										<a href="/admin/user/del/<?= $data['id'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
									</button>
									<button class="btn btn-sm btn-outline-primary btn-round btn-icon">
										<a href="/<?= $data['username'] ?>" target="_blank" class="text-primary" title="Đi tới..."><i class="fas fa-external-link-alt"></i></a>
									</button>
	                    		</td>
	                    	</tr>
	                    <?php endforeach ?>
                    <?php else: ?>
						<tr>Chưa có thành viên nào!</tr>
                    <?php endif ?>
                    </tbody>
                </table>
                <?= pagination('/admin/users', $total) ?>
            </div>
        </div>
    </div>
</div>