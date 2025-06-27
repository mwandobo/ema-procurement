@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Credibility</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ !isset($editCredibility) ? 'active show' : '' }}" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="{{ !isset($editCredibility) ? 'true' : 'false' }}">Credibility
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ isset($editCredibility) ? 'active show' : '' }}" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="{{ isset($editCredibility) ? 'true' : 'false' }}">{{ isset($editCredibility) ? 'Edit Credibility' : 'New Credibility' }}</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade {{ !isset($editCredibility) ? 'active show' : '' }}" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 106.484px;">Group Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 150.219px;">Clients</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 101.219px;">Percentage</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 98.1094px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($credibilities))
                                            @foreach ($credibilities as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $row->group_name }}</td>
                                                <td>
                                                    @foreach ($row->clients as $client)
                                                        {{ $client->name }}<br>
                                                    @endforeach
                                                </td>
                                                <td>{{ $row->percentage }}%</td>
                                                <td>
                                                    <div class="form-inline">
                                                        <a class="list-icons-item text-info" 
                                                            href="{{ route('customer_credibilities.credibility_edit', $row->id) }}" title="Edit">
                                                            <i class="icon-pencil7"></i>
                                                        </a>
                                                        <form action="{{ route('customer_credibilities.credibility_destroy', $row->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="list-icons-item text-danger ml-2" title="Delete" style="background:none; border:none; cursor:pointer;">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ isset($editCredibility) ? 'active show' : '' }}" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ isset($editCredibility) ? 'Edit Credibility' : 'Create New Credibility' }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @if(isset($editCredibility))
                                                    {{ Form::open(['route' => ['customer_credibilities.credibility_update', $editCredibility->id]]) }}
                                                    @method('PUT')
                                                @else
                                                    {{ Form::open(['route' => 'customer_credibilities.credibility_store']) }}
                                                    @method('POST')
                                                @endif

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Group Name</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="group_name" class="form-control" required 
                                                            value="{{ isset($editCredibility) ? $editCredibility->group_name : old('group_name') }}"
                                                            placeholder="e.g. Premium Customers, Loyal Clients">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Clients</label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control m-b" name="client_ids[]" multiple required id="client_ids" style="width: 100% !important">
                                                            <option value="">Select Clients</option>
                                                            @if(!empty($clients))
                                                            @foreach($clients as $client)
                                                                <option value="{{ $client->id }}" 
                                                                    {{ isset($editCredibility) && $editCredibility->clients->pluck('id')->contains($client->id) ? 'selected' : '' }}>
                                                                    {{ $client->name }}
                                                                </option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Percentage</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="number" name="percentage" class="form-control" 
                                                                value="{{ isset($editCredibility) ? $editCredibility->percentage : old('percentage') }}"
                                                                min="0" max="100" step="0.01" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                        <small class="form-text text-muted">Enter percentage value (e.g., 75 for 75% credibility)</small>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit">Save</button>
                                                        @if(isset($editCredibility))
                                                            <a href="{{ route('customer_credibilities.credibility_index') }}" class="btn btn-sm btn-danger float-right m-t-n-xs mr-2">Cancel</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '←' : '→', 'previous': $('html').attr('dir') == 'rtl' ? '→' : '←' }
        },
    });
</script>

<script>
    $(document).ready(function() {
        $('.m-b').select2({
            placeholder: "Select Clients",
            allowClear: true
        });
    });
</script>
@endsection
