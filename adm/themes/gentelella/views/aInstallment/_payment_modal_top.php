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
				<td colspan="2" align="right"><?= $installment->customer_name ?></td>
			</tr>
			<tr>
				<td class="header">Bát họ</td>
				<td colspan="2" align="right"><?= $installment->total_money ?></td>
			</tr>
			<tr>
				<td class="header">Tỷ lệ</td>
				<td colspan="2" align="right">10 ăn <b>8</b></td>
			</tr>
			<tr>
				<td class="header">Họ từ ngày</td>
				<td align="right"><?= $installment->displayStartDate ?></td>
				<td align="right" id="tdToDate"><?= $installment->displayEndDate ?></td>
			</tr>
			<tr>
				<td class="header highlight">
					Tiền thừa
				</td>
				<td colspan="2" align="right" class="highlight bold" id="tdDebitMoney">2,500,000 VNĐ</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="col-md-6">
	<table class="table table-hover table-bordered">
		<tbody>
			<tr>
				<td class="header">Số tiền giao khách</td>
				<td colspan="2" align="right"><span class="bold"><?= $installment->receive_money ?> </span>VNĐ</td>
			</tr>
			<tr>
				<td class="header">Tổng tiền phải đóng</td>
				<td colspan="2" align="right"><span class="bold highlight">25,000,000 </span>VNĐ</td>
			</tr>
			<tr>
				<td class="header">Đã đóng được</td>
				<td colspan="2" align="right">
					<span class="bold" id="spanPaymentMoney">3,000,000</span> VNĐ

				</td>

			</tr>
			<tr>
				<td class="header">Còn lại phải đóng</td>
				<td colspan="2" align="right">
					<span class="bold highlight" id="spanPaymentMoney">22,000,000</span> VNĐ

				</td>

			</tr>
			<tr>
				<td class="header">Tổng lãi phí</td>
				<td colspan="2" align="right">
					<span class="bold" id="spanPaymentMoney">5,000,000</span> VNĐ
				</td>
			</tr>
		</tbody>
	</table>
</div>