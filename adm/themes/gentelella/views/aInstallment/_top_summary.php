<div class="row row-top">
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i> Quỹ tiền mặt</span>
			<div class="count-customize"><?= ATransactions::getCurrentBalance(Yii::app()->user->shop_id, true); ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i> Tiền cho vay</span>
			<div class="count-customize">2.500.000.000</div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>Tiền nợ</span>
			<div class="count-customize">2.500.000.000</div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count pull-right">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i> Phí lãi đã thu</span>
			<div class="count-customize">2.500.000.000</div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count pull-right">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i> Lãi dự kiến</span>
			<div class="count-customize">2.500.000.000</div>
		</div>
	</div>

	<!-- search-form -->
	<!-- <div class="col-md-12 col-sm-2 col-xs-6 tile"> -->
	<?php //$this->renderPartial('_search', array(			'model' => $model,		)); 
	?>
	<!-- </div> -->
	<!-- search-form -->

</div>

<style>
	.row-top {
		background: #eae7e7;
		padding: 10px;
	}

	.count_top {
		font-size: 18px;
	}

	.count-customize {
		font-size: 22px;
		color: #17a0bf;
	}
</style>