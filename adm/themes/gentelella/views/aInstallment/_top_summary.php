<?php
// $from_date = Yii::app()->request->param('from_date', false);
// $to_date = Yii::app()->request->param('to_date', false);
if (!Yii::app()->user->super_admin) {
	$currentBalance = ATransactions::sumCurrentBalance($shop_id, true);
	$totalLendingGross = AInstallment::loadTotalLendingGross($shop_id, false);
	$totalDebt = AInstallment::loadDebt($shop_id, true);
	$paidInterest = AInstallment::loadPaidInterest($shop_id, false);
	$expectedInterest =  AInstallment::loadExpectedInterest($shop_id, true);
	$totalLendingNet = Utils::numberFormat($totalLendingGross - $paidInterest);
	$paidInterest = Utils::numberFormat($paidInterest);
}
?>
<div class="row row-top">
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>QUỸ TIỀN MẶT</span>
			<div class="count-customize"><?= $currentBalance  ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>TIỀN CHO VAY</span>
			<div class="count-customize"><?= $totalLendingNet  ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>TỔNG NỢ XẤU</span>
			<div class="count-customize"><?= $totalDebt  ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count pull-right">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>PHÍ LÃI ĐÃ THU</span>
			<div class="count-customize"><?= $paidInterest  ?></div>
		</div>
	</div>
	<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count pull-right">
		<div class="right">
			<span class="count_top"><i class="fa fa-usd"></i>LÃI DỰ KIẾN</span>
			<div class="count-customize"><?= $expectedInterest ?></div>
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