<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Service List</h4>
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
                @foreach ($services as $key => $item)
                    <tr class="list-item">
                        <td>{{ $sl }}</td>
                        <td>
                            <img style="width: 60px;height:60px;border-radius:50%;" src="{{ asset('storage/serviceimages/'.$item->service_image) }}" alt="Service">
                        </td>
                        <td>
                            {{ $item->title }}
                        </td>

                        <td>
                            {{ textFormat($item->description) . ' ...' }}
                        </td>

                        <td>
                            <button type="button" class="btn btn-sm btn-primary ml-2 serviceEdit"
                            data-title="{{ $item->title }}" data-description="{{ $item->description }}" data-name="{{ $item->name }}"
                            data-image="{{ $item->service_image }}"
                            data-id="{{ $item->id }}"  data-toggle="modal" data-target="#editServiceModal">
                                <i class="dw dw-edit2"></i>
                            </button>
                            <button class="btn btn-sm btn-danger deleteserviceButton" data-id="{{ $item->id }}">
                                <i class="dw dw-delete-3"></i>
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
</div>

<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="serviceId" name="serviceId">
                    <div class="form-group">
                        <label for="service_image">Service Image</label>
                        <input type="file" class="form-control" name="service_image">
                        @error('service_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <img style="width: 100px; height:100px;margin-bottom: 12px;border-radius: 4px;box-shadow: 0 0 10px;" id="service_image" src="" alt="">
                    </div>

                    <div class="form-group">
                        <label for="name">Service Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInput">Title</label>
                        <input type="text" class="form-control" id="servcieTitle" name="title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInput">Description</label>
                        <textarea class="form-control" id="serviceDescription" name="description"></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('assets/js/admin/service.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.serviceEdit').on('click', function(){
            var id          = $(this).data('id');
            var name        = $(this).data('name');
            var title       = $(this).data('title');
            var description = $(this).data('description');
            var image       = $(this).data('image');


            $('#serviceId').val(id);
            $('#name').val(name);
            $('#servcieTitle').val(title);
            $('#serviceDescription').val(description);

            if (image) {
                $('#service_image').attr('src', '{{ asset('storage/serviceimages/') }}/' + image);
            } else {
                $('#service_image').attr('src', '');
            }
        });
    });
</script>
