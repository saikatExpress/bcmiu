<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Faq List</h4>
    </div>
    <div class="pb-20">
        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="table-plus datatable-nosort">Title</th>
                    <th>Description</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sl = 1;
                @endphp
                @foreach ($faqs as $key => $item)
                    <tr class="list-item">
                        <td>{{ $sl }}</td>

                        <td class="table-plus">
                            {{ ucfirst($item->title) }}
                        </td>

                        <td>
                            {{ $item->description }}
                        </td>

                        <td>
                            <button type="button" class="btn btn-sm btn-primary ml-2 faqEdit"
                            data-title="{{ $item->title }}" data-description="{{ $item->description }}"
                            data-id="{{ $item->id }}"  data-bs-toggle="modal" data-bs-target="#editFaqModal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button class="btn btn-sm btn-danger ml-2 deletefaqButton" data-id="{{ $item->id }}">
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
</div>

<div class="modal fade" id="editFaqModal" tabindex="-1" role="dialog" aria-labelledby="editFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFaqModalLabel">Edit Item</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('faq.edit') }}" method="POST">
                    @csrf
                    <input type="hidden" id="faqId" name="faqId">
                    <div class="form-group">
                        <label for="exampleInput">Title</label>
                        <input type="text" class="form-control" id="faqTitle" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput">Description</label>
                        <textarea class="form-control" id="faqDescription" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function(){
        $('.faqEdit').on('click', function(){
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');


            $('#faqId').val(id);
            $('#faqTitle').val(title);
            $('#faqDescription').val(description);
        });

        $(document).on('click', '.deletefaqButton', function(){
            var faqId = $(this).data("id");
            var listItem = $(this).closest(".list-item");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "/faq/delete/" + faqId,
                        success: function (response) {
                            listItem.remove();

                            Swal.fire("Deleted!", response.message, "success");
                        },
                        error: function (error) {
                            Swal.fire(
                                "Error!",
                                error.responseJSON.message,
                                "error"
                            );
                        },
                    });
                }
            });
        });
    });
</script>
