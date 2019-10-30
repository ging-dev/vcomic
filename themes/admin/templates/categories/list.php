<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Danh Sách Thư Mục</h4>
			<a href="/admin/category/new" class="btn btn-sm btn-success">
				<i class="far fa-plus-circle"></i> Thêm Thư Mục
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table">
					<thead class=" text-primary">
						<th>Tên Thư Mục</th>
						<th>Tạo Lúc</th>
						<th class="text-right">Hành Động</th>
                    </thead>
                    <tbody>
                    <?php if ($total): ?>
						<?php foreach ($list_categories as $data): ?>
	                    	<tr>
	                    		<td><?= $data['name'] ?></td>
	                    		<td><?= date('d-m-Y', $data['created_at']) ?></td>
	                    		<td class="text-right">
	                    			<button class="btn btn-sm btn-outline-success btn-round btn-icon mr-4">
										<a href="/admin/category/edit/<?= $data['id'] ?>" class="text-success"><i class="fas fa-pencil-alt"></i></a>
									</button>
									<button class="btn btn-sm btn-outline-danger btn-round btn-icon mr-4">
										<a href="/admin/category/del/<?= $data['id'] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
									</button>
									<button class="btn btn-sm btn-outline-primary btn-round btn-icon">
										<a href="/category/<?= $data['slug'] ?>" target="_blank" class="text-primary" title="Đi tới..."><i class="fas fa-external-link-alt"></i></a>
									</button>
	                    		</td>
	                    	</tr>
	                    <?php endforeach ?>
                    <?php else: ?>
						<tr>Chưa có thư mục nào</tr>
                    <?php endif ?>
                    </tbody>
                </table>
                <?= pagination('/admin', $total) ?>
            </div>
        </div>
    </div>
</div>