<form method="POST" class="container mt-4">
    <div class="border p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái:</label>
            <select name="status" id="status" class="form-select">
                <option value="Pending" <?php echo ($order['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="Shipped" <?php echo ($order['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                <option value="Delivered" <?php echo ($order['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                <option value="Cancelled" <?php echo ($order['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Phương thức thanh toán:</label>
            <select name="payment_method" id="payment_method" class="form-select">
                <option value="Credit Card" <?php echo ($order['payment_method'] == 'Credit Card') ? 'selected' : ''; ?>>Credit Card</option>
                <option value="Paypal" <?php echo ($order['payment_method'] == 'Paypal') ? 'selected' : ''; ?>>Paypal</option>
                <option value="Cash on Delivery" <?php echo ($order['payment_method'] == 'Cash on Delivery') ? 'selected' : ''; ?>>Cash on Delivery</option>
                <option value="" <?php echo ($order['payment_method'] == '') ? 'selected' : ''; ?>>Chưa thanh toán</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="shipping_address" class="form-label">Địa chỉ giao hàng:</label>
            <textarea name="shipping_address" id="shipping_address" rows="4" class="form-control"><?php echo htmlspecialchars($order['shipping_address']); ?></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </div>
</form>
