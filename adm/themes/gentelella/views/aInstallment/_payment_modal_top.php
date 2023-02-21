<?php
/* @var $this AInstallmentController */
/* @var $installment AInstallment */
/* @var $installmentItems AInstallmentItems */

?>
<div class="col-md-6">
	<table class="table table-hover table-bordered">
		<tbody>
			<tr>
				<td class="header">Khách hàng</td>
				<td colspan="2" align="right"><b><?= $installment->customer_name ?></b></td>
			</tr>
			<tr>
				<td class="header">Bát họ</td>
				<td colspan="2" align="right"><?= $installment->calTotalMoney() ?> VND</td>
			</tr>
			<tr>
				<td class="header">Tỷ lệ</td>
				<td colspan="2" align="right"><?= $installment->calInterestRate() ?></td>
			</tr>
			<tr>
				<td class="header">Họ từ ngày</td>
				<td align="right"><?= $installment->calStartDate() ?></td>
				<td align="right" id="tdToDate"><?= $installment->calEndDate() ?></td>
			</tr>
			<tr>
				<td class="header highlight">Tiền thừa</td>
				<td colspan="2" align="right" class="highlight bold" id="tdDebitMoney"><?= $installment->calOverBalance() ?> VNĐ</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="col-md-6">
	<table class="table table-hover table-bordered">
		<tbody>
			<tr>
				<td class="header">Số tiền giao khách</td>
				<td colspan="2" align="right"><span class="bold"><?= $installment->calReceiveMoney() ?> </span>VNĐ</td>
			</tr>
			<tr>
				<td class="header">Tổng tiền phải đóng</td>
				<td colspan="2" align="right"><span class="bold highlight"><?= $installment->calTotalMoney() ?> </span>VNĐ</td>
			</tr>
			<tr>
				<td class="header">Đã đóng được</td>
				<td colspan="2" align="right">
					<span class="bold" id="spanPaymentMoney"><?= $installment->calPaidAmount() ?></span> VNĐ
				</td>
			</tr>
			<tr>
				<td class="header">Còn lại phải đóng</td>
				<td colspan="2" align="right">
					<span class="bold highlight" id="spanPaymentMoney"><?= $installment->calRemainMoney() ?></span> VNĐ
				</td>
			</tr>
			<tr>
				<td class="header">Tổng lãi phí</td>
				<td colspan="2" align="right">
					<span class="bold" id="spanPaymentMoney"><?= $installment->calInterestFee() ?></span> VNĐ
				</td>
			</tr>
		</tbody>
	</table>
</div>
<style>
	.highlight {
		color: #b32020;
	}

	.bold {
		font-weight: bolder;
	}
</style>