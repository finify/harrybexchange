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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Coin</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Wallet</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session('status'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <form action="{{ route('giftcards.update',$coin->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Giftcard name</label>
                                            <input class="form-control" type="text" name="card_name" value="{{ $coin->card_name }}"/>
                                            @error('card_name')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Sell Price</label>
                                            <input class="form-control" type="text" name="sell_price" value="{{ $coin->sell_price }}"/>
                                            @error('sell_price')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Buy Price</label>
                                            <input class="form-control" type="text" name="buy_price" value="{{ $coin->buy_price }}"/>
                                            @error('buy_price')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Giftcard image</label>
                                            <input type="file" name="card_image" class="form-control" />
                                            @error('card_image')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark btn-block">Update</button>
                                        </div>
                                    </form>
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

