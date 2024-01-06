<section class="my-container-admin attractions_list">

    {{-- Modal for adding content to the database starts  --}}
    <div class="modal fade" id="addContent" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"> Add{{ ucfirst($listName) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="post" id="add{{ ucfirst($listName) }}">
                        @csrf
                        @foreach ($fields as $field)
                            <x-generic.input :$field />
                        @endforeach
                        <button class="btn btn-majesty w-100" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal for adding content to the database ends --}}

    {{-- Modal for viewing content to the database starts  --}}
    <div class="modal fade" id="viewContent" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content payment-view">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"> {{ ucfirst($listName) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="title fw-bolder mb-3">Abdul-Azeem's Visitation Details</h5>
                    <div class="records">

                    </div>
                    <div class="status">
                        <p class="m-0">Status:</p>
                        <span class="indicator bg-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal for viewing content to the database ends --}}

    {{-- Modal for editing content to the database starts  --}}
    <div class="modal fade" id="editContent" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"> Edit {{ ucfirst($listName) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="post" id="edit{{ ucfirst($listName) }}">
                        @csrf
                        @foreach ($fields as $field)
                            <x-generic.input :$field />
                        @endforeach
                        <button class="btn btn-majesty w-100" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal for adding content to the database ends --}}

    <div class="table-responsive">
        <div class="top">
            <h4 class="title text-capitalize text-muted m-0">
                {{ $listName }} List
            </h4>

            @if ($listName != 'view payments')
                <button type="button" class="btn btn-majesty" data-bs-toggle="modal" data-bs-target="#addContent">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Add
                </button>
            @endif
        </div>
        <table class="table table-striped table-hover table-borderless" id="myListTable">
            <thead class="">
                <tr>
                    <th>S/N</th>
                    @foreach ($headers as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @if ($listName == 'attractions')
                    @foreach ($contents as $content)
                        <tr class="">
                            <td scope="row"></td>
                            <td>{{ $content->attraction_name }}</td>
                            <td>{{ $content->attraction_description }}</td>
                            <td>
                                <div class="action">
                                    <button type="button" class="btn btn-sm btn-success"
                                        data-button="editAttractionContentToggler"
                                        data-id="{{ $content->attraction_id }}"
                                        data-table="{{ $listName }}"
                                        data-target="#editContent" onclick="openEditAttractionModal(this)">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        <span>Edit</span>
                                    </button>
                                    {{-- <button type="button" class="btn btn-sm btn-majesty">
                               <i class="fas fa-binoculars" aria-hidden="true"></i>
                               <span>View</span>
                           </button> --}}
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-can" aria-hidden="true"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @elseif ($listName == 'accomodations')
                    @foreach ($contents as $content)
                        <tr class="">
                            <td scope="row"></td>
                            <td>{{ $content->accomodation_name }}</td>
                            <td> ₦{{ number_format($content->accomodation_price, 2, '.', ',') }}</td>
                            <td>{{ $content->accomodation_description }}</td>
                            <td>
                                <div class="action">
                                    <button type="button" class="btn btn-sm btn-success"
                                        data-button="editAccomodationContentToggler"
                                        data-id="{{ $content->accomodation_id }}"
                                        data-table="{{ $listName }}"
                                        data-target="#editContent" onclick="openEditAccomodationModal(this)">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        <span>Edit</span>
                                    </button>
                                    {{-- <button type="button" class="btn btn-sm btn-majesty">
                               <i class="fas fa-binoculars" aria-hidden="true"></i>
                               <span>View</span>
                           </button> --}}
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-can" aria-hidden="true"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @elseif ($listName == 'view payments')
                    @foreach ($contents as $content)
                        <tr class="">
                            <td scope="row"></td>
                            <td>{{ $content->name }}</td>
                            <td>{{ $content->email }}</td>
                            <td> ₦{{ number_format($content->amount, 2, '.', ',') }}</td>
                            <td class="text-{{ $content->payment_status == 1 ? 'success' : 'danger' }}">
                                {{ $content->payment_status == 1 ? 'paid' : 'unpaid' }}</td>
                            <td>
                                <div class="action">
                                    <button type="button" class="btn btn-sm btn-success"
                                        data-button="viewVisitationContentToggler"
                                        data-id="{{ $content->visitation_id }}"
                                        data-table="{{ $listName }}"
                                        data-target="#viewContent" onclick="openViewModal(this)">
                                        <i class="fa fa-binoculars" aria-hidden="true"></i>
                                        <span>View</span>
                                    </button>
                                    <!-- Button trigger modal -->

                                    {{-- <button type="button" class="btn btn-sm btn-majesty">
                               <i class="fas fa-binoculars" aria-hidden="true"></i>
                               <span>View</span>
                           </button> --}}
                                    @if ($content->payment_status == 0)
                                        <button type="button" class="btn btn-sm btn-fresh">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                            <span>Confirm Payment</span>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @elseif ($listName == 'administrators')
                    @foreach ($contents as $content)
                        <tr class="">
                            <td scope="row"></td>
                            <td>{{ $content->firstname }}</td>
                            <td>{{ $content->lastname }}</td>
                            <td> {{ $content->email }}</td>
                            <td>{{ $content->role }}</td>
                            <td>
                                <div class="action">
                                    <button type="button" class="btn btn-sm btn-success"
                                        data-button="editAdministratorContentToggler"
                                        data-id="{{ $content->administrator_id }}"
                                        data-table="{{ $listName }}"
                                        data-target="#editContent" onclick="openEditAddministratorModal(this)">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        <span>Edit</span>
                                    </button>
                                    {{-- <button type="button" class="btn btn-sm btn-majesty">
                               <i class="fas fa-binoculars" aria-hidden="true"></i>
                               <span>View</span>
                           </button> --}}
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-can" aria-hidden="true"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</section>
