<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Code</th>
                <th>BO ID</th>
                <th>Bank</th>
                <th>Branch</th>
                <th>Ac No</th>
                <th>Address</th>
                <th>WhatsApp</th>
                <th>Joined At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->trading_code }}</td>
                    <td>{{ $user->bo_id }}</td>
                    <td>{{ $user->bank_name }}</td>
                    <td>{{ $user->bank_branch }}</td>
                    <td>{{ $user->bank_account_no }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->whatsapp }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $users->appends(request()->query())->links() }}
</div>
