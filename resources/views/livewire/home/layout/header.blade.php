<?php

use Livewire\Volt\Component;

use App\Models\Coins;
use App\Models\Giftcard;

new class extends Component {
    public $selectedTab = 'users-tab';
    public $crypto = 'buy';
    //
    public $coins ;
    public $cards ;
    public function mount(){
        $this->coins = Coins::get();
        $this->cards = Giftcard::get();

    }
}; ?>

<div x-data="{ 
        fullscreenModal: false, 
        transactionModal: false,
        crypto: 'buy',
        tradeoption: null
    }" x-init="
    $watch('fullscreenModal', function(value){
            if(value === true){
            console.log('fullscreenModal is true');
                document.body.classList.add('overflow-hidden');
            }else{
                document.body.classList.remove('overflow-hidden');
            }
        })
    " @keydown.escape="fullscreenModal=false">
    <header id="header_main" class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__body d-flex justify-content-between">
                        <div class="header__left">
                            <div class="logo">
                                <a class="light" href="index.html">
                                    <img src="assets/images/harryblogo.png" alt="" width="128"
                                        data-retina="assets/images/harryblogo.png" data-width="128" />
                                </a>
                                <a class="dark" href="index.html">
                                    <img src="assets/images/harryblogowhite.png" alt="" width="128"
                                        data-retina="assets/harryblogowhite.png" data-width="128" />
                                </a>
                            </div>

                        </div>
                        <div class="header__left">
                            <div class="left__main">
                                <nav id="main-nav" class="main-nav">
                                    <ul id="menu-primary-menu" class="menu">
                                        {{-- <li class="menu-item-has-children current-menu-item">
                                            <a href="#">Homepage </a>
                                            <ul class="sub-menu">
                                                <li class="menu-item current-item">
                                                    <a href="index.html">Home 01</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="home-v2.html">Home 02</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="home-v3.html">Home 03</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                        <li class="menu-item">
                                            <a href="/">Home </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="/buy">Buy Asset </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="/sell">Sell Asset </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="/rates">Asset Rates </a>
                                        </li>

                                    </ul>
                                </nav>
                                <!-- /#main-nav -->
                            </div>
                        </div>

                        <div class="header__right">
                            <div class="mode-switcher">
                                <a class="sun" href="#" onclick="switchTheme()">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.99993 11.182C9.7572 11.182 11.1818 9.75745 11.1818 8.00018C11.1818 6.24291 9.7572 4.81836 7.99993 4.81836C6.24266 4.81836 4.81812 6.24291 4.81812 8.00018C4.81812 9.75745 6.24266 11.182 7.99993 11.182Z"
                                            stroke="#23262F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8 1V2.27273" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8 13.7271V14.9998" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.04956 3.04932L3.9532 3.95295" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.0469 12.0469L12.9505 12.9505" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 8H2.27273" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.7273 8H15" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.04956 12.9505L3.9532 12.0469" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.0469 3.95295L12.9505 3.04932" stroke="#23262F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <a href="#" class="moon" onclick="switchTheme()">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0089 8.97241C12.7855 9.64616 12.4491 10.2807 12.0107 10.8477C11.277 11.7966 10.2883 12.5169 9.1602 12.9244C8.03209 13.3319 6.81126 13.4097 5.64056 13.1486C4.46987 12.8876 3.39772 12.2986 2.54959 11.4504C1.70145 10.6023 1.1124 9.53013 0.851363 8.35944C0.590325 7.18874 0.668097 5.96791 1.07558 4.8398C1.48306 3.71169 2.2034 2.72296 3.1523 1.9893C3.71928 1.55094 4.35384 1.21447 5.02759 0.991088C4.69163 1.84583 4.54862 2.77147 4.61793 3.7009C4.72758 5.17128 5.36134 6.55346 6.40394 7.59606C7.44654 8.63866 8.82873 9.27242 10.2991 9.38207C11.2285 9.45138 12.1542 9.30837 13.0089 8.97241Z"
                                            stroke="white" stroke-width="1.4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            {{-- <div class="dropdown notification">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton3"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon-notification"></span>
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                    <div class="dropdown-item">
                                        <div class="media server-log">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-server">
                                                <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                                <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                                <line x1="6" y1="6" x2="6" y2="6"></line>
                                                <line x1="6" y1="18" x2="6" y2="18"></line>
                                            </svg>
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6 class="">Server Rebooted</h6>
                                                    <p class="">45 min ago</p>
                                                </div>

                                                <div class="icon-status">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="media">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-heart">
                                                <path
                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                </path>
                                            </svg>
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6 class="">Licence Expiring Soon</h6>
                                                    <p class="">8 hrs ago</p>
                                                </div>

                                                <div class="icon-status">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="media file-upload">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-file-text">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                </path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                <polyline points="10 9 9 9 8 9"></polyline>
                                            </svg>
                                            <div class="media-body">
                                                <div class="data-info">
                                                    <h6 class="">Kelly Portfolio.pdf</h6>
                                                    <p class="">670 kb</p>
                                                </div>

                                                <div class="icon-status">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-check">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="mobile-button"><span></span></div>
                            <div class="wallet">
                                <a href="#">Login </a>
                            </div>
                            <div class="dropdown user">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton4"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/avt/avt-01.jpg" alt="" />
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                    <a class="dropdown-item" href="#"><i
                                            class="bx bx-user font-size-16 align-middle me-1"></i>
                                        <span>Profile</span></a>
                                    <a class="dropdown-item" href="#"><i
                                            class="bx bx-wallet font-size-16 align-middle me-1"></i>
                                        <span>My Wallet</span></a>
                                    <a class="dropdown-item d-block" href="#"><span
                                            class="badge bg-success float-end">11</span><i
                                            class="bx bx-wrench font-size-16 align-middle me-1"></i>
                                        <span>Settings</span></a>
                                    <a class="dropdown-item" href="#"><i
                                            class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                                        <span>Lock screen</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="user-login.html"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                        <span>Logout</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="du-dock download !backdrop-blur !p-0 text-neutral-content">
        <div class="flex w-full">
            <button @click="trade_modal.showModal()" class="!w-[95vw] btn-action">
                Start Trading
            </button>
            {{-- <button @click="fullscreenModal=true" class="!w-[95vw] btn-action">
                Start Trading
            </button> --}}
        </div>
    </div>

    <dialog id="trade_modal" class="du-modal backdrop-blur
        lg:[&>.du-modal-box]:w-[30%]
        [&>.du-modal-box]:w-full
        [&>.du-modal-box]:fixed
        lg:[&>.du-modal-box]:static
        [&>.du-modal-box]:bottom-0
        lg:[&>.du-modal-box]:bottom-20
        [&>.du-modal-box]:min-h-[40vh]
        lg:[&>.du-modal-box]:min-h-auto
        [&>.du-modal-box]:rounded-b-none
        lg:[&>.du-modal-box]:rounded-b-lg
    ">
        <div class="du-modal-box download !p-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h5 class="!text-2xl">Start Trade</h5>
            <div class="grid grid-cols-2 gap-2">
                <div class="!flex !flex-col !items-center du-card shadow-xl py-2 !rounded"
                    @click="fullscreenModal=true;trade_modal.close();crypto='buy';tradeoption='crypto'">
                    <x-icon name="m-arrow-down-tray" class="w-6" />
                    <p class="text-sm font-bold">Buy Crypto</p>
                </div>
                <div class="!flex !flex-col !items-center du-card shadow-xl py-2 !rounded"
                    @click="fullscreenModal=true;crypto='sell';trade_modal.close();tradeoption='crypto'">
                    <x-icon name="m-arrow-up-tray" class="w-6" />
                    <p class="text-sm font-bold">Sell Crypto</p>
                </div>
                <div class="!flex !flex-col !items-center du-card shadow-xl py-2 !rounded"
                    @click="fullscreenModal=true;trade_modal.close();tradeoption='giftcard'">
                    <x-icon name="m-arrow-up-tray" class="w-6" />
                    <p class="text-sm font-bold">Redeem Gift Card</p>
                </div>
                <div class="!flex !flex-col !items-center du-card shadow-xl py-2 !rounded"
                    @click="fullscreenModal=true;trade_modal.close();tradeoption='efunds'">
                    <x-icon name="m-arrow-up-tray" class="w-6" />
                    <p class="text-sm font-bold">eFunds Transactions</p>
                </div>
            </div>

        </div>
        <form method="dialog" class="du-modal-backdrop">
            <button></button>
        </form>
    </dialog>

    <template x-teleport="body">

        <div x-show="fullscreenModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            class="flex fixed inset-0 z-[999999999] w-screen h-screen bg-white">
            <div class="relative flex flex-col w-full h-full px-8">

                <div class="relative flex justify-between items-center w-full h-fit py-2">
                    <button class="btn-back"></button>
                    <p class="text-center text-lg font-bold"></p>
                    <button @click="fullscreenModal=false"
                        class="z-30 !flex !items-center !justify-center px-3 py-2 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 lg:border-white/20 du-btn-primary du-btn btn-action !w-fit text-neutral-600 lg:text-white hover:bg-neutral-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>Close</span>
                    </button>
                </div>
                <div class="relative w-full max-w-2xl mx-auto lg:mb-0">
                    <div class="relative text-left">
                        <div class="flex flex-col mb-6 space-y-2">

                        </div>
                        <section x-show="tradeoption=='crypto'" class="coin-list pt-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="block-text">
                                            <h3 class="heading !text-xl">Trade Crypto</h3>
                                            {{-- <a class="btn-action-2" href="#">See All Coins</a> --}}
                                        </div>

                                        <div class="coin-list__main">
                                            <div class="flat-tabs">
                                                <ul class="menu-tab !sticky !top-0 !bg-white">
                                                    <li :class="crypto == 'buy' ? 'active' : ''" @click="crypto='buy'">
                                                        <h6 class="fs-16">Buy Crypto</h6>
                                                    </li>
                                                    <li :class="crypto == 'sell' ? 'active' : ''"
                                                        @click="crypto='sell'">
                                                        <h6 class="fs-16">Sell Crypto</h6>
                                                    </li>
                                                </ul>
                                                <div class="content-tab">
                                                    <div x-show="crypto == 'buy'" class="!max-h-[500px]"
                                                        :class="crypto == 'buy' ? 'active content-inner' : 'content-inner'">
                                                        <table class="table">
                                                            <thead class="!sticky !top-[35px] !bg-white !border-b-2 !border-black shadow-[inset_0_-2px_0_black] py-4">
                                                                <tr>
                                                                    <th scope="col">Asset Name</th>
                                                                    <th scope="col">Buy Rate</th>
                                                                    <th scope="col">Trade</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($coins as $coin)
                                                                <tr>
                                                                    <td>
                                                                        <a href="#">
                                                                            <img src="/images/coins/{{ strtolower($coin->coin_code) }}.svg"
                                                                                class="w-8" alt="">
                                                                            <span>{{ $coin->coin_name }}</span>
                                                                            <span class="unit">{{ $coin->coin_code
                                                                                }}</span></a>
                                                                    </td>
                                                                    <td class="boild">₦{{
                                                                        number_format($coin->buy_price, 2) }}/$</td>
                                                                    <td>
                                                                        <a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=I%20want%20to%20buy%20{{ $coin->coin_name }}%20({{ $coin->coin_code }})" class="btn">Buy Crypto</a>
                                                                        {{-- <a href="#" class="btn">Buy</a> --}}
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div x-show="crypto == 'sell'"  class="!max-h-[300px]"
                                                        :class="crypto == 'sell' ? 'active content-inner' : 'content-inner'">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Asset Name</th>
                                                                    <th scope="col">Sell Rate</th>
                                                                    <th scope="col">Trade</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($coins as $coin)
                                                                <tr>
                                                                    <td>
                                                                        <a href="#">
                                                                            <img src="/images/coins/{{ strtolower($coin->coin_code) }}.svg"
                                                                                class="w-8" alt="">
                                                                            <span>{{ $coin->coin_name }}</span>
                                                                            <span class="unit">{{ $coin->coin_code
                                                                                }}</span></a>
                                                                    </td>
                                                                    <td class="boild">₦{{
                                                                        number_format($coin->sell_price, 2) }}/$</td>
                                                                    <td>
                                                                        <a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=I%20want%20to%20sell%20{{ $coin->coin_name }}%20({{ $coin->coin_code }})" class="btn">Sell Crypto</a>
                                                                        {{-- <a href="#" class="btn">Buy</a> --}}
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
                        </section>
                        <section x-show="tradeoption=='giftcard'" class="coin-list pt-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="block-text">
                                            <h3 class="heading !text-xl">Redeem Giftcard </h3>
                                            {{-- <a class="btn-action-2" href="#">See All Coins</a> --}}
                                        </div>

                                        <div class="coin-list__main">
                                            <div class="flat-tabs">
                                                <ul class="menu-tab">
                                                    <li class="active">
                                                        <h6 class="fs-16">Sell GiftCards</h6>
                                                    </li>
                                                    {{-- <li>
                                                        <h6 class="fs-16">Sell Crypto</h6>
                                                    </li> --}}
                                                </ul>
                                                <div class="content-tab">
                                                    <div class="content-inner">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Asset Name</th>
                                                                    <th scope="col">Redeem Rate/$</th>
                                                                    <th scope="col">Trade</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($cards as $card )
                                                                    <tr>
                                                                        <td>
                                                                            <a href="#">
                                                                            <img src="/cards/{{ strtolower($card->card_image) }}" class="w-8" alt="">
                                                                            <span>{{ $card->card_name }}</span>
                                                                            </a>
                                                                        </td>
                                                                        <td class="boild">₦{{ number_format($card->sell_price, 2) }}/$</td>
                                                                        <td>
                                                                            <a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=I%20want%20to%20redeem%20{{ $card->card_name }}" class="btn" target="_blank">Trade</a>
                                                                            {{-- <a href="#" class="btn">Buy</a> --}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    {{-- <div class="content-inner">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Asset Name</th>
                                                                    <th scope="col">Sell Rate/$</th>
                                                                    <th scope="col">Trade</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#"><span class="icon-btc"><span
                                                                                    class="path1"></span><span
                                                                                    class="path2"></span></span>
                                                                            <span>Bitcoin</span>
                                                                            <span class="unit">BTC</span></a>
                                                                    </td>
                                                                    <td class="boild">1,500</td>
                                                                    <td><a href="#" class="btn">Trade</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#"><span class="icon-eth"><span
                                                                                    class="path1"></span><span
                                                                                    class="path2"></span><span
                                                                                    class="path3"></span><span
                                                                                    class="path4"></span></span><span>Ethereum</span>
                                                                            <span class="unit">ETH</span></a>
                                                                    </td>
                                                                    <td class="boild">1,600</td>
                                                                    <td><a href="#" class="btn">Trade</a></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div> --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="relative top-0 bottom-0 right-0 flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">

                <div class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-black"></div>
                <img src="https://cdn.devdojo.com/images/may2023/pines-bg-2.png"
                    class="z-10 object-cover w-full h-full" />
            </div>
        </div>

    </template>

</div>