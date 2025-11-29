const modal = bootstrap.Modal.getInstance(modalElement);
if (modal) {
    modal.hide();
} else {
    // Fallback for when the instance isn't available
    const bsModal = new bootstrap.Modal(modalElement);
    bsModal.hide();
}