<div class="container mx-auto px-4 py-6">
    <div class="mb-4">
        <input type="text" wire:model="search" placeholder="Search notices..." class="p-2 border border-gray-300 rounded">
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publish Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Effective Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($notices as $notice)
                <tr>
                    <td class="px-6 py-4">{{ $notice->id }}</td>
                    <td class="px-6 py-4">{{ $notice->title }}</td>
                    <td class="px-6 py-4">{{ $notice->content }}</td>
                    <td class="px-6 py-4">{{ $notice->type }}</td>
                    <td class="px-6 py-4">{{ $notice->publish_date }}</td>
                    <td class="px-6 py-4">{{ $notice->effective_date }}</td>
                    <td class="px-6 py-4">{{ $notice->status }}</td>
                    <td class="px-6 py-4">{{ $notice->contact_email }}</td>
                    <td class="px-6 py-4">{{ $notice->contact_phone }}</td>
                    <td class="px-6 py-4">{{ $notice->created_at }}</td>
                    <td class="px-6 py-4">{{ $notice->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $notices->links() }}
    </div>
</div>
