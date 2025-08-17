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
                            <li class="breadcrumb-item"><a href="/admin/giftcards">Giftcards</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Giftcard</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Giftcard</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session('status'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <form action="{{ route('giftcards.update', $giftcard->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Card Name</label>
                                            <input required class="form-control" type="text" name="card_name" value="{{ $giftcard->card_name }}"/>
                                            @error('card_name')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Sell Price</label>
                                            <input required class="form-control" type="number" step="0.01" name="sell_price" value="{{ $giftcard->sell_price }}"/>
                                            @error('sell_price')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Buy Price</label>
                                            <input required class="form-control" type="number" step="0.01" name="buy_price" value="{{ $giftcard->buy_price }}"/>
                                            @error('buy_price')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Card Image</label>
                                            <input class="form-control" type="file" name="card_image"/>
                                            @if($giftcard->card_image)
                                                <img src="{{ asset('cards/' . $giftcard->card_image) }}" alt="Card Image" width="100" class="mt-2"/>
                                            @endif
                                            @error('card_image')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark btn-block">Update Giftcard</button>
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