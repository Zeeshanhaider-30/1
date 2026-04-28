<x-layouts.admin title="Products Table">
    <div class="dt-harbor harbor-card p-4">
        <table id="products-table" class="display w-full overflow-hidden rounded-lg">
            <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Status</th></tr></thead>
        </table>
    </div>
    <script>
        $(function () {
            $('#products-table').DataTable({
                processing: true, serverSide: true, ajax: '{{ route('admin.products') }}',
                columns: [{data:'id'},{data:'name'},{data:'price'},{data:'stock'},{data:'is_active'}]
            });
        });
    </script>
</x-layouts.admin>
