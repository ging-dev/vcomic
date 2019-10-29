<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Danh Sách Truyện</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table">
					<thead class=" text-primary">
						<th>Tên Truyện</th>
						<th>Ảnh Bìa</th>
						<th>Trạng Thái</th>
						<th>Chế Độ</th>
						<th>Lượt Xem</th>
						<th>Người Đăng</th>
						<th>Thư Mục</th>
						<th>Tạo Lúc</th>
						<th class="text-right">Hành Động</th>
                    </thead>
                    <tbody>
                    <?php foreach (get_all_stories($total) as $data): ?>
                    	<tr>
                    		<td><?= $data['title'] ?></td>
                    		<td><img width="50px" src="/uploads/thumbnail/<?= $data['thumbnail'] ?>"></td>
                    		<td>
                    			<?= ($data['is_completed'] == 0) ? '<span class="badge badge-danger">Đang Ra</span>' : '<span class="badge badge-success">Hoàn Thành</span>' ?>
                    		</td>
                    		<td>
                    			<?= ($data['is_published'] == 0) ? '<span class="badge badge-danger">Riêng Tư</span>' : '<span class="badge badge-success">Công Khai</span>' ?>
                    		</td>
                    		<td><?= $data['views'] ?></td>
                    		<td><?= display_name(get_info_id($data['user_id'])['role'], get_info_id($data['user_id'])['fullname']) ?></td>
                    		<td><?= get_category('id', $data['category_id'])['name'] ?></td>
                    		<td><?= date('d-m-Y', $data['created_at']) ?></td>
                    		<td class="text-right">
                    			<button class="btn btn-sm btn-outline-success btn-round btn-icon mr-4">
									<a href="/admin/story/edit/<?= $data['id'] ?>" class="text-success"><i class="fas fa-pencil-alt"></i></a>
								</button>
								<button class="btn btn-sm btn-outline-danger btn-round btn-icon mr-4">
									<a href="/admin/story/del/<?= $data['id'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
								</button>
								<button class="btn btn-sm btn-outline-primary btn-round btn-icon">
									<a href="/story/<?= $data['slug'] ?>" target="_blank" class="text-primary" title="Đi tới..."><i class="fas fa-external-link-alt"></i></a>
								</button>
                    		</td>
                    	</tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                <?= pagination('/admin/stories', $total) ?>
            </div>
        </div>
    </div>
</div>