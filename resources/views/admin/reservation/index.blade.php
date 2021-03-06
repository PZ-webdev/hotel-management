@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Rezerwacje</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        {!! $dataTable->table([], true) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $dataTable->scripts() }}

    <script>
        $(function() {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //delete action
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                let link = $(this).attr("href");
                let table = $(this).data('table');

                Swal.fire({
                        title: 'Jesteś pewny?',
                        text: "Jeśli usuniesz, zmiany będą nieodwracalne!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Tak, usuń'
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: link,
                                type: 'POST',
                                data: {
                                    _method: "DELETE"
                                },
                                success: function(data, textStatus, xhr) {
                                    setTimeout(function() {
                                        $(this).parents("tr").remove();
                                        $('#' + table).DataTable().ajax.reload();
                                        return false;
                                    }, 500);

                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                },
                                error: function(data, textStatus, xhr) {
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.responseJSON.message
                                    });
                                }
                            })
                        }
                    })

            })
        });
    </script>
@endsection
