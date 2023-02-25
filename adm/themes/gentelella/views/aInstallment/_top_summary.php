<div class="row row-top">
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>QUỸ TIỀN MẶT</span>
			<div class="count-customize"><?= (!Yii::app()->user->super_admin) ? ATransactions::sumCurrentBalance($shop_id, true) : ''; ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>TIỀN CHO VAY</span>
			<div class="count-customize"><?= (!Yii::app()->user->super_admin) ? AInstallment::loadTotalLending($shop_id, true) : ''; ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>TIỀN NỢ</span>
			<div class="count-customize"><?= (!Yii::app()->user->super_admin) ? AInstallment::loadDebt($shop_id, true) : ''; ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count pull-right">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>PHÍ LÃI ĐÃ THU</span>
			<div class="count-customize"><?= (!Yii::app()->user->super_admin) ? AInstallment::loadPaidInterest($shop_id, true) : ''; ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count pull-right">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>LÃI DỰ KIẾN</span>
			<div class="count-customize"><?= (!Yii::app()->user->super_admin) ? AInstallment::loadExpectedInterest($shop_id, true) : ''; ?></div>
		</div>
	</div>

	<!-- search-form -->
	<!-- <div class="col-md-12 col-sm-2 col-xs-6 tile"> -->
	<?php //$this->renderPartial('_search', array('model' => $model,));
	?>
	<!-- </div> -->
	<!-- search-form -->

</div>

<style>
	.row-top {
		background: #eae7e7;
		padding: 10px;
		/* border: 1px solid #E6E9ED; */
	}

	.count_top {
		font-size: 14px;
	}

	.count-customize {
		font-size: 22px;
		color: #17a0bf;
	}
</style>