@component('components.header')
@endcomponent

			
				<section id="banner" data-video="images/banner">
					<div class="inner">
						<header>
							<h2>PHÁT TRIỂN Ý TƯỞNG HÌNH ẢNH</h2>
							<h3>Không chỉ là Media, chúng tôi sẽ cùng bạn phát triển ý tưởng...</h3>
							<p>Chúng tôi sẽ lắng nghe nhu cầu và đề xuất giải pháp dựa trên kinh nghiệm và sự tìm tòi của mình.</p>
						</header>

						<div class="saleoff">
							<span>Giảm từ <span class="sale-number">10-20%</span> tất cả Dịch vụ &nbsp;>></span>
							<a href="services/sale" class="button big alt scrolly">Khuyến mãi mùa Khai trương</a>
						</div>
					</div>

				</section>

		<!-- Main -->
			<div id="main">

				<section id="s-services" class="wrapper style1">
					<div class="inner">
						<header class="align-center">
							<h2>Dịch vụ</h2>
						</header>
						<!-- 2 Column Video Section -->
							<div class="flex flex-2">
								<div class="video col">
									<div class="image fit">
										<img src="images/service_product.jpg" alt="" />
									</div>
									<p class="caption">
										Ảnh Sản phẩm
									</p>
									<a href="services/product" class="link"><span>Click Me</span></a>
								</div>
								<div class="video col">
									<div class="image fit">
										<img src="images/service_place.jpg" alt="" />
										
									</div>
									<p class="caption">
										Ảnh Kiến trúc
									</p>
									<a href="services/place" class="link"><span>Click Me</span></a>
								</div>
								<div class="video col">
									<div class="image fit">
										<img src="images/service_social.jpg" alt="" />
										
									</div>
									<p class="caption">
										Video Mạng xã hội
									</p>
									<a href="services/social" class="link"><span>Click Me</span></a>
								</div>
								<div class="video col">
									<div class="image fit">
										<img src="images/service_event.jpg" alt="" />
										
									</div>
									<p class="caption">
										Video sự kiện
									</p>
									<a href="services/event" class="link"><span>Click Me</span></a>
								</div>
							</div>
					</div>
				</section>


				<section id="s-refer" class="wrapper style2">
					<div class="inner">
						<header>
							<h2>Tham khảo</h2>
							<p>Cùng tham khảo những mẫu sản phẩm mà <strong>Z Images</strong> thực hiện.</p>
						</header>
						<!-- Tabbed Video Section -->
							<div class="flex flex-tabs">
								<ul class="tab-list">
									<li><a href="#" data-tab="tab-1" class="switch active">Ảnh Sản phẩm</a></li>
									<li><a href="#" data-tab="tab-2" class="switch">Ảnh Thời trang</a></li>
									<li><a href="#" data-tab="tab-3" class="switch">Ảnh Kiến trúc</a></li>
									<li><a href="gallery/event">Video Sự kiện</a></li>
								</ul>
								<div class="tabs">

									<!-- Tab 1 -->
										<div class="tab tab-1 flex flex-3 active">
										@for ($i=1; $i<=9; $i++)
												<div class="video col">
													<div class="image fit">
														<img src="images/portfolio/product/pr ({{ $i }}).jpg" alt="Chụp ảnh Sản phẩm" />
														
													</div>
													<a href="gallery/product" class="link"><span>Click Me</span></a>
												</div>
										@endfor
										</div>

									<!-- Tab 2 -->
										<div class="tab tab-2 flex flex-3">
										@for ($i=1; $i<=6; $i++)
												<div class="video col">
													<div class="image fit">
														<img src="images/portfolio/fashion/f ({{ $i }}).jpg" alt="Chụp ảnh Thời trang" />
													</div>
													<a href="gallery/fashion" class="link"><span>Click Me</span></a>
												</div>
										@endfor
										</div>

									<!-- Tab 3 -->
										<div class="tab tab-3">
										@for ($i=1; $i<=5; $i++)
												<div class="video col">
													<div class="image fit">
														<img src="images/portfolio/place/p ({{ $i }}).jpg" alt="Chụp ảnh Thời trang" />
													</div>
													<a href="gallery/place" class="link"><span>Click Me</span></a>
												</div>
										@endfor
										</div>

								</div>
							</div>
					</div>
				</section>

			
				<section id="s-info" class="wrapper ">
					<div class="inner">
						<header class="align-center">
							<h2>Gọi lại cho tôi</h2>
							<p>Để lại Số Điện thoại, chúng tôi sẽ gọi lại tư vấn cho bạn...<br />
							Hoặc gọi ngay Hotline <b>038.2040.081</b> để được hỗ trợ bạn nhé!</p>
						</header>

						<!-- 3 Column Video Section -->
							<div class="flex flex-3">

							<form method="POST" action="order">
							@csrf
								<ul>
									<li>
									@if (Auth::check())
										<input type="number" name="f_tel" id="f_tel" placeholder="Số Điện thoại (*)" value="{{ auth()->user()->user_tel }}" required="required" data-error="Số Điện thoại là bắt buộc.">
									@else
										<input type="number" name="f_tel" id="f_tel" placeholder="Số Điện thoại (*)" required="required" data-error="Số Điện thoại là bắt buộc.">
									@endif
									</li>
									<li>
										<div class="reserve-book-btn text-center">
											<button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">Gọi lại tôi</button>
										</div>
									</li>
								</ul>
							</form>
							
							</div>
					</div>
				</section>


				<section id="s-blogs" class="wrapper ">
					<div class="inner">
						<header class="align-center">
							<h2>Thông tin hữu ích</h2>
							<p>Mẹo vặt, Hướng dẫn, Thông tin xã hội trong lĩnh vực Truyền thông, Tiếp thị,...</p>
						</header>

						<!-- 3 Column Video Section -->
							<div class="flex flex-3">

							@foreach ($someblogs as $blog)
								<div class="video col">
									<div class="image fit">
										<img src="images/blogs/{{ $blog->blog_thumb }}" alt="Dịch vụ Media, Ảnh - {{ $blog->blog_title }}" />
									</div>
									<p class="caption">
										{{ $blog->blog_title }}
									</p>
									<a href="blogs/{{ $blog->blog_title_slug }}" class="link"><span>Click Me</span></a>
								</div>
							@endforeach
							
							</div>
					</div>
				</section>

			</div>

		


@component('components.footer')

@endcomponent