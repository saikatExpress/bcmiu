<style>
    #editFormContainer {
        transition: transform 0.3s ease-in-out;
        transform: translateX(100%);
    }
    #editFormContainer.show {
        transform: translateX(0);
    }
</style>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Banner List</h4>
    </div>
    <div class="pb-20">
        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sl = 1;
                @endphp
                @foreach ($banners as $key => $item)
                    <tr class="list-item">
                        <td>{{ $sl }}</td>
                        <td>
                            <img style="width: 60px;height:60px;border-radius:50%;" src="{{ asset('storage/bannerimages/'.$item->banner_image) }}" alt="Banner">
                        </td>
                        <td>
                            {{ $item->title }}
                        </td>

                        <td>
                            {{ $item->description }}
                        </td>

                        <td>
                            <button class="btn btn-sm btn-primary editBannerBtn" data-id="{{ $item->id }}">
                                <i class="dw dw-edit2"></i>
                            </button>
                            <button class="btn btn-sm btn-danger deletebannerButton" data-id="{{ $item->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    @php
                        $sl++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Edit Form Modal (Initially Hidden) -->
    <div id="editFormContainer" style="display: block; position: fixed; top: 0; right: 0; width: 30%; height: 100%; background: #fff; box-shadow: -2px 0 5px rgba(0,0,0,0.3); padding: 20px; overflow-y: auto; z-index: 1000;">
        <button id="closeEditForm" style="position: absolute; top: 10px; right: 10px;">&times;</button>

        <h4>Edit Banner</h4>
        <form id="editForm" action="{{ route('banners.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="editId" name="id">

            <div class="form-group">
                <label for="editBannerImage">Banner Image <span class="text-danger"> * </span></label>
                <input type="file" class="form-control" id="editBannerImage" name="banner_image">
                <img id="editBannerImagePreview" style="width: 100px; height: 100px; border-radius: 50%; margin-top: 10px;" alt="Banner Preview">
            </div>

            <div class="form-group">
                <label for="editName">Name <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="editName" name="name" required>
            </div>

            <div class="form-group">
                <label for="editTitle">Title <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="editTitle" name="title" required>
            </div>

            <div class="form-group">
                <label for="editDescription">Description <span class="text-danger"> * </span></label>
                <textarea class="form-control" id="editDescription" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="facebook_link">Facebook Link</label>
                <input type="text" class="form-control" id="facebook_link" name="facebook_link">
            </div>

            <div class="form-group">
                <label for="twitter_link">Twitter Link</label>
                <input type="text" class="form-control" id="twitter_link" name="twitter_link">
            </div>

            <div class="form-group">
                <label for="instagram_link">Instagram Link</label>
                <input type="text" class="form-control" id="instagram_link" name="instagram_link">
            </div>

            <div class="form-group">
                <label for="linkedin_link">LinkedIn Link</label>
                <input type="text" class="form-control" id="linkedin_link" name="linkedin_link">
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
        </form>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/admin/banner.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.editBannerBtn').click(function () {
            var id = $(this).data('id');
            var url = '{{ route('banners.show', ':id') }}'.replace(':id', id);

            $.get(url, function (data) {
                $('#editId').val(data.id);
                $('#editTitle').val(data.title);
                $('#editName').val(data.name);
                $('#editDescription').val(data.description);
                $('#facebook_link').val(data.facebook_link);
                $('#twitter_link').val(data.twitter_link);
                $('#instagram_link').val(data.instagram_link);
                $('#linkedin_link').val(data.linkedin_link);

                if (data.banner_image) {
                    $('#editBannerImagePreview').attr('src', '{{ asset('storage/bannerimages/') }}/' + data.banner_image);
                } else {
                    $('#editBannerImagePreview').attr('src', '');
                }

                $('#editFormContainer').addClass('show');
            });
        });

        $('#closeEditForm').click(function () {
            $('#editFormContainer').removeClass('show');
        });

        $(document).mouseup(function (e) {
            var container = $("#editFormContainer");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.removeClass('show');
            }
        });
    });
</script>
