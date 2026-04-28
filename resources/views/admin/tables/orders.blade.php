<x-layouts.admin title="Orders Table">
    <div class="dt-harbor harbor-card p-4">
        <table id="orders-table" class="display w-full overflow-hidden rounded-lg">
            <thead><tr><th>ID</th><th>Customer</th><th>Email</th><th>Total</th><th>Status</th><th>Ordered By</th></tr></thead>
        </table>
    </div>
    <script>
        $(function () {
            $('#orders-table').DataTable({
                processing: true, serverSide: true, ajax: '{{ route('admin.orders') }}',
                columns: [{data:'id'},{data:'customer_name'},{data:'customer_email'},{data:'total_amount'},{data:'status'},{data:'ordered_by'}]
            });
        });
    </script>
</x-layouts.admin>
