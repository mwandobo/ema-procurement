<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Menu Component for {{$menu->name}} </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table id="basic-dt" class="table table-hover" style="width:100%">
                 
                  
                        <thead>
                            <tr>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 186.484px;">#</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 186.484px;">Menu Component</th>
                                  
                            </tr>
                        </thead>
                        <tbody>
                            @if(!@empty($items))
                            @foreach ($items as $row)
                            <tr class="gradeA even" role="row">

                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{$row->name}}</td>
        
                            </tr>
                            @endforeach

                            @endif

                        </tbody>
                    </table>
            </div>                                        

        </div>
        <div class="modal-footer bg-whitesmoke br">
 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
    </div>
</div>