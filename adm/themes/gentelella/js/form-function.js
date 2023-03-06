/**
 * Lấy giá trị từ form trong modal
 * Format giá trị và trả lại form input
 */
function formatNumberModalInput(modal_id, control_id) {
  // Get the modal
  const modal = $(modal_id);
  const amount = parseInt(modal.find(control_id).val().replace(/\./g, ""));

  const formattedAmount = formatCurrency(amount);
  modal.find(control_id).val(formattedAmount);
}

/**
 *
 * @param {*} modal_id
 * @param {*} total_money_id
 * @param {*} loan_date_id
 * @param {*} target_id
 */
function setPaidPerDay(modal_id, total_money_id, loan_date_id, target_id) {
  const modal = $(modal_id);
  let total_money = modal.find(total_money_id).val().replace(/\./g, "");
  let loan_date = modal.find(loan_date_id).val();
  // alert(total_money);
  // alert(loan_date);
  let output = formatCurrency(Math.floor(total_money / loan_date));
  // alert(output);
  modal.find(target_id).html(output);
}

/**
 *
 * @param {*} inputNumber
 * @returns
 */
function formatCurrency(inputNumber) {
  if (isNaN(inputNumber)) return 0;

  return inputNumber.toLocaleString("vi-VN");
}
