@extends('admin.layout.layout')


@section('content')


<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Giftcards</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New Giftcard</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session('status'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <form action="{{ route('giftcards.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Giftcard name</label>
                                            <input class="form-control" type="text" name="card_name" />
                                            @error('card_name')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Sell Price</label>
                                            <input class="form-control" type="text" name="sell_price" placeholder="0.00" />
                                            @error('sell_price')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Buy Price</label>
                                            <input class="form-control" type="text" name="buy_price" placeholder="0.00" />
                                            @error('buy_price')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Giftcard Image</label>
                                            <input type="file" name="card_image" class="form-control" />
                                            @error('card_image')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark btn-block">Add new giftcard</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All giftcards</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Giftcard Name</th>
                                                <th>Sell Price</th>
                                                <th>Buy Price</th>
                                                <th>Card Image</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($giftcards as $giftcard)
                                            <tr>
                                                <td>{{ $giftcard->card_name }}</td>
                                                <td>{{ $giftcard->sell_price }}</td>
                                                <td>{{ $giftcard->buy_price }}</td>
                                                <td><img src="{{ asset('cards/'.$giftcard->card_image) }}" width="50" height="50" alt="Coin Image"></td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                    <div class="dropdown-menu">
                                                    <form action="{{ route('giftcards.destroy',$giftcard->id) }}" method="Post">
                                                        <a class="dropdown-item" href="{{ route('giftcards.edit',$giftcard->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                    </form>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger" role="alert">
                                            No data found
                                            </div>
                                        @endforelse
                                        
                                            
                                        </tbody>
                                    </table>
                                    {!! $giftcards->links() !!}
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

