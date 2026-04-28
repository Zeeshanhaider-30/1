<x-layouts.admin title="Admins Table">
    <div class="dt-harbor harbor-card p-4">
        <table id="admins-table" class="display w-full overflow-hidden rounded-lg">
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Created At</th></tr></thead>
        </table>
    </div>
    <script>
        $(function () {
            $('#admins-table').DataTable({
                processing: true, serverSide: true, ajax: '{{ route('admin.admins') }}',
                columns: [{data:'id'},{data:'name'},{data:'email'},{data:'created_at'}]
            });
        });
    </script>
</x-layouts.admin>
