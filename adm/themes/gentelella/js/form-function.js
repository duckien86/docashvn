/**
 * Lấy giá trị từ form trong modal
 * Format giá trị và trả lại form input
 */
function formatNumberModalInput(modal_id, control_id) {
    // Get the modal
    // const modal = $(modal_id);
    // // const modal = $(modal_id);

    // const formattedAmount = parseInt(modal.find(control_id).val().replace('/\./g', '')).toLocaleString('vi-VN');

    // // // console.log(amount);
    // // const formattedAmount = amountInput.toLocaleString('vi-VN');
    // // // console.log(formattedAmount);
    // modal.find(control_id).val(formattedAmount);

}

function formatNumberModalInput(modal_id, control_id) {
    // Get the modal
    // const modal = $('#modal_id');
    const modal = $(modal_id);

    const amountInput = modal.find(control_id).val();

    const amount = parseInt(amountInput.replace('/\./g', ''));
    // // console.log(amount);
    const formattedAmount = amount.toLocaleString('vi-VN');
    // // console.log(formattedAmount);
    modal.find(control_id).val(formattedAmount);
}