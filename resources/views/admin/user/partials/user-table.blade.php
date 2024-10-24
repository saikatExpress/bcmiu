<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>WhatsApp</th>
            <th>Division</th>
            <th>District</th>
            <th>Upazila</th>
            <th>Joined</th>
            <th>Status</th>
            <th>Action</th>
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
                <td>
                    <label class="btn btn-sm btn-{{ $user->status === 'active' ? 'success' : 'danger' }}">
                        {{ ucfirst($user->status) }}
                    </label>
                </td>
                <td>
                    <button class="btn btn-sm btn-primary editBtn" data-id="{{ $user->id }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="11" class="text-center">No users found</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination -->
<div class="pagination-wrapper">
    {{ $users->links('pagination::bootstrap-4') }}
</div>
