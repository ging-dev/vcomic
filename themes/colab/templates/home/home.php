<section class="container-fluid p-0">
	<div class="swiper-slider-index" style="overflow-x: hidden;">
		<div class="swiper-wrapper">
		<?php foreach ($list_banner as $data_banner): ?>
			<div class="swiper-slide slider-height">
				<div class="slider-container" style="background-image: url('/uploads/thumbnail/<?= $data_banner['thumbnail'] ?>');">
					<div class="slider-background">
						<div class="story-area">
							<div class="story-cover">
								<a href="#">
									<img src="/uploads/thumbnail/<?= $data_banner['thumbnail'] ?>">
								</a>
							</div>
							<div class="story-info">
								<div class="story-title">
									<a href="/story/<?= $data_banner['slug'] ?>"><h2><?= $data_banner['title'] ?></h2></a>
								</div>
								<div class="author text-white"><?= $data_banner['author'] ?></a></div>
								<div class="story-stats">
									<div class="vote">
										<span class="star">
											<i class="fas fa-star"></i> 
											<i class="fas fa-star"></i> 
											<i class="fas fa-star"></i> 
											<i class="fas fa-star"></i> 
											<i class="far fa-star"></i> 
										</span>
										<span class="view">
											<?= $data_banner['views'] ?>
										</span>
									</div>
								</div>
								<div class="story-description">
									<?= cut_string($data_banner['summary'], 150) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		</div>
	</div>
</section>
<section class="container mt-3 d-none body">
	<div class="free-title">
		<div class="content">
			Truyện được  đề cử
		</div>
		<div class="desc">
			Đọc giả đề cử cao nhất
		</div>
	</div>
	<div class="swiper-container p-1" style="width: 100%;min-height:240px;">
		<div class="normal swiper-wrapper" class="">
			<?php foreach ($list_nomination as $data_nomi): ?>
			<div class="story swiper-slide">
				<div class="cover">
					<a href="/story/<?= $data_nomi['slug'] ?>" class="read-button">
						<i class="fa fa-eye"></i>
						<br/>
						Chi tiết
					</a>
					<img src="/uploads/thumbnail/<?= $data_nomi['thumbnail'] ?>" class="story-image" />
				</div>
				<div class="story-body">
					<div class="story-name">
						<a href="/story/<?= $data_nomi['slug'] ?>"><?= $data_nomi['title'] ?></a>
					</div>
					<div class="story-info mt-2">
						<span class="author">
							<a href=""><?= $data_nomi['author'] ?></a>
						</span>
						<br/>
						<span class="views">
							<?= $data_nomi['views'] ?> lượt xem
						</span>
					</div>
					<div class="story-description">
						<?= cut_string($data_nomi['slug'], 150) ?>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</section>