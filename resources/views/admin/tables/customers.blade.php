<x-layouts.admin title="Users Who Ordered">
    <div class="dt-harbor harbor-card p-4">
        <table id="customers-table" class="display w-full overflow-hidden rounded-lg">
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Orders Count</th></tr></thead>
        </table>
    </div>
    <script>
        $(function () {
            $('#customers-table').DataTable({
                processing: true, serverSide: true, ajax: '{{ route('admin.customers') }}',
                columns: [{data:'id'},{data:'name'},{data:'email'},{data:'orders_count'}]
            });
        });
    </script>
</x-layouts.admin>
