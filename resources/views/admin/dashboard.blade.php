@extends('admin.layout.layout')


@section('content')


@if(Session::has('login_success'))
    <script>
    Swal.fire(
    'Login Successfull',
    'Welcome back',
    'success'
        )
    </script>
@endif

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <h6 class="mb-0">Admin</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-money text-success border-success"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Pending Trades</div>
                                    <div class="stat-digit">{{ $details['pendingtrades'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Completed Trades</div>
                                   <div class="stat-digit">{{ $details['completedtrades'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Subscriptions</div>
                                     <div class="stat-digit">22</div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Active Trades</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-dark  student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Amount</th>
                                                <th>Transaction id</th>
                                                <th>Trade type</th>
                                                <th>Trade name</th>
                                                <th>Trade Details</th>
                                                <th>Trade Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($pendingtrades as $trade )
                                            <tr>
                                                <td>{{ $trade->user->username }}</td>
                                                <td>@money($trade->buy_amount + $trade->sell_amount)</td>
                                                <td>{{ $trade->transaction_id }}</td>
                                                <td>{{ $trade->trade_type }}</td>
                                                <td>{{ $trade->trade_name }}</td>
                                                <td>
                                                    <pre>{{ json_encode($trade->trade_details, JSON_PRETTY_PRINT) }}</pre>
                                                </td>
                                                <td> 
                                                    @if ($trade->trade_status == 'pending')
                                                        <span class='badge badge-warning'>Pending</span>
                                                    @elseif ($trade->trade_status == 'success')
                                                        <span class='badge badge-success'>Success</span>
                                                    @else
                                                        <span class='badge badge-danger'>Failed</span>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                    <div class="dropdown-menu">
                                                        <form style="float:left; margin-left:10px;" action="{{ url('admin/dashboard') }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" name="tradeid" value="{{ $trade->id }}">
                                                            
                                                            <input type="hidden" name="action" value="approveteade">
                                                            
                                                            <button type="submit" class="dropdown-item text-success">Approve Trade</button>
                                                        </form>
                                                        <form style="float:left; margin-left:10px;" action="{{ url('admin/dashboard') }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" name="tradeid" value="{{ $trade->id }}">
                                                            
                                                            <input type="hidden" name="action" value="failtrade">
                                                            
                                                            <button type="submit" class="dropdown-item text-danger">Cancel Trade</button>
                                                        </form>
                                                        

                                                    </div>
                                                </div>
                                                </td>
                                            
                                            </tr>
                                        @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



    



@endsection

