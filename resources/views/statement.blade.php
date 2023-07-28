@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Statement of account</h3>
                            </div>

                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>DATE TIME</th>
                                            <th>AMOUNT</th>
                                            <th>TYPE</th>
                                            <th>DETAILS</th>
                                            <th>BALANCE</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="card-footer d-flex align-items-center">
                                <ul class="pagination m-0 ms-auto" id="custom-pagination">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .paging_simple_numbers {
            display: none !important;
        }
    </style>

    <script type="text/javascript">
        var dataTable;

        function paginate(pageNumber) {
            dataTable.page(pageNumber).draw('page'); // Go to the specified page
        }

        $(function() {
            dataTable = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                lengthChange: false,
                paging: true,
                info: false,
                pageLength: 10,
                ajax: "{{ route('statement.result') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                    },
                    {
                        data: 'type',
                        name: 'type',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'summary',
                        name: 'summary'
                    },
                    {
                        data: 'balance',
                        name: 'balance'
                    },
                ]
            });

            dataTable.on('draw', function() {
                var pageInfo = dataTable.page.info();
                var currentPage = pageInfo.page + 1;
                var totalPages = pageInfo.pages;
                var paginationHtml = '';

                if (totalPages > 1) {
                    current = currentPage == 1 ? 'aria-disabled="true"' : '';
                    disabled = currentPage == 1 ? 'disabled' : '';
                    goTo = pageInfo.page - 1;
                    paginationHtml += '<li class="page-item ' + disabled + '" ' + currentPage + '>' +
                        '<a class="page-link" href="#" tabindex="-1" onclick="paginate(' + goTo + ')">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">' +
                        '<path stroke="none" d="M0 0h24v24H0z" fill="none" />' +
                        '<path d="M15 6l-6 6l6 6" />' +
                        '</svg>prev' +
                        '</a></li>';

                    for (var i = 1; i <= totalPages; i++) {
                        active = i == currentPage ? 'active' : '';
                        goTo = i - 1;
                        paginationHtml += '<li class="page-item"><a class="page-link ' + active +
                            '" href="#" onclick="paginate(' + goTo + ')">' + i + '</a></li>';
                    }

                    current = currentPage == totalPages ? 'aria-disabled="true"' : '';
                    disabled = currentPage == totalPages ? 'disabled' : '';
                    goTo = pageInfo.page + 1;
                    paginationHtml += '<li class="page-item ' + disabled + '" ' + currentPage + '>' +
                        '<a class="page-link" href="#" onclick="paginate(' + goTo + ')">next' +
                        '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">' +
                        '<path stroke="none" d="M0 0h24v24H0z" fill="none" />' +
                        '<path d="M9 6l6 6l-6 6" />' +
                        '</svg>' +
                        '</a></li>';

                    $('#custom-pagination').html(paginationHtml);
                }
            });
        });
    </script>
@endsection
