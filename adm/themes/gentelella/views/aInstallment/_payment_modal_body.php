<div class="col-md-12 col-sm-12 col-xs-12" style="padding: unset;">
	<div class="" role="tabpanel" data-example-id="togglable-tabs">
		<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
					Lịch đóng tiền
				</a>
			</li>
			<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
					Đóng hợp đồng
				</a>
			</li>
			<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">
					Nợ
				</a>
			</li>
			<li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">
					Lịch sử
				</a>
			</li>
			<li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">
					Đảo họ
				</a>
			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<!-- Lịch đóng tiền -->
			<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
				<?php
				echo $this->renderPartial('_payment_modal_body_tab1', array(
					'model' => $model,
					'modalID' => $modalID,
				));
				?>
			</div>
			<!-- Đóng hợp đồng -->
			<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip</p>
			</div>
			<!-- Nợ -->
			<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
				<p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
			</div>
			<!-- Lịch sử -->
			<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
				<p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
			</div>
			<!-- Đảo họ -->
			<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
				<p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
			</div>
		</div>
	</div>
</div>