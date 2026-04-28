<x-layouts.admin title="Order Items Table">
    <div class="dt-harbor harbor-card p-4">
        <table id="order-items-table" class="display w-full overflow-hidden rounded-lg">
            <thead><tr><th>ID</th><th>Order</th><th>Product</th><th>Qty</th><th>Unit Price</th><th>Line Total</th></tr></thead>
        </table>
    </div>
    <script>
        $(function () {
            $('#order-items-table').DataTable({
                processing: true, serverSide: true, ajax: '{{ route('admin.order-items') }}',
                columns: [{data:'id'},{data:'order_reference'},{data:'product_name'},{data:'quantity'},{data:'unit_price'},{data:'line_total'}]
            });
        });
    </script>
</x-layouts.admin>
