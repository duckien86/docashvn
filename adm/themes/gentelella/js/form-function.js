/**
 * Lấy giá trị từ form trong modal
 * Format giá trị và trả lại form input
 */
function formatNumberModalInput(modal_id, control_id) {
    // Get the modal
    // const modal = $('#modal_id');
    const modal = $(modal_id);

    // const value = modal.find('#control_id').val();
    const amount = parseInt(modal.find(control_id).val());

    const formattedAmount = amount.toLocaleString('vi-VN');

    modal.find(control_id).val(formattedAmount)
}