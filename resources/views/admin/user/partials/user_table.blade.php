<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Division</th>
                <th>District</th>
                <th>Upazila</th>
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
                    <td>
                        <a href="https://wa.me/88{{ $user->whatsapp }}" target="_blank">
                            {{ $user->whatsapp }}
                        </a>
                    </td>
                    <td>{{ divisionName($user->division_id) }}</td>
                    <td>{{ districtName($user->district_id) }}</td>
                    <td>{{ upazilaName($user->upazila_id) }}</td>
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
