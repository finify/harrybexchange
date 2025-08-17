<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};

use App\Models\Coins;
use App\Models\Giftcard;

new 
#[Layout('components.layouts.home')]
#[Title('Home')]
class extends Component {
    //
    public $coins ;
    public $cards ;
    public function mount(){
        $this->coins = Coins::get();
        $this->cards = Giftcard::get();

    }
}; ?>

<div>
  <!-- Banner Top -->
  <section class="banner pb-0">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-12">
          <div class="banner__content">
            <h2 class="title">Seamless trading across borders </h2>
            <p class="fs-20 desc">
              HBX is the easiest, safest, and fastest way to buy &
              sell crypto and digital assets.
            </p>
            <a class="btn-action" onclick="trade_modal.showModal()"><span>Get started now</span></a>
            {{-- <div class="partner">
              <h6>Our Partners</h6>
              <div class="partner__list">
                <div class="swiper swiper-partner">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="#"><img src="assets/images/partner/logo-01.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="#"><img src="assets/images/partner/logo-02.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="#"><img src="assets/images/partner/logo-03.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="#"><img src="assets/images/partner/logo-04.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="#"><img src="assets/images/partner/logo-01.png" alt="" /></a>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="banner__image">
            <img src="/assets/images/landingpage.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Banner Top -->
  <div x-data x-init="
            $nextTick(() => {
                const content = $refs.content;
                const item = $refs.item;
                const clone = item.cloneNode(true);
                content.appendChild(clone);
            });
    " class="relative w-full du-bg-base-100 container-block">
    <div
      class="relative w-full py-3 mx-auto overflow-hidden text-lg italic tracking-wide text-white uppercase du-bg-base-100 max-w-7xl sm:text-xs md:text-sm lg:text-base xl:text-xl 2xl:text-2xl">
      <div class="block-text">
        <h6 class="heading py-2 !normal-case ">Featured Assets</h6>
      </div>
      <div x-ref="content" class="flex animate-marquee">
        <div x-ref="item" class="flex items-center justify-around flex-shrink-0 w-auto px-3 gap-10 text-white">
          <img src="/assets/images/assets/apple.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/amazon.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/google.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/steam.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/walmart.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/nike.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/btc.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/eth.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/ltc.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/sol.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/steam.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/tron.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/trx.svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/usdc(erc20).svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/usdc(solana).svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/usdt(bep20).svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/usdt(erc20).svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/usdt(solana).svg" class="h-8 fill-current" alt="">
          <img src="/assets/images/assets/usdt(trc20).svg" class="h-8 fill-current" alt="">
        </div>
      </div>
    </div>
  </div>

  {{-- <section class="crypto mt-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="crypto__main !py-1 !px-3">
            <div class="flat-tabs">
              <ul class="menu-tab">
                <li class="active">
                  <h6 class="fs-16">Crypto</h6>
                </li>
                <li>
                  <h6 class="fs-16">DeFi</h6>
                </li>
                <li>
                  <h6 class="fs-16">BSC</h6>
                </li>
                <li>
                  <h6 class="fs-16">NFT</h6>
                </li>
                <li>
                  <h6 class="fs-16">Metaverse</h6>
                </li>
                <li>
                  <h6 class="fs-16">Polkadot</h6>
                </li>
                <li>
                  <h6 class="fs-16">Solana</h6>
                </li>
                <li>
                  <h6 class="fs-16">Opensea</h6>
                </li>
                <li>
                  <h6 class="fs-16">Makersplace</h6>
                </li>
              </ul>
              <div class="content-tab">
                <div class="content-inner">
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-btc"><span class="path1"></span><span class="path2"></span></span>
                        <span>Bitcoin</span>
                        <span class="unit">BTC/USD</span></a>
                    </div>
                    <h6 class="price">USD 46,168.95</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <p class="sale critical">-0.79%</p>
                    </div>
                  </div>
                  <div class="crypto-box active">
                    <div class="top">
                      <a href="#"><span class="icon-eth"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></span><span>Ethereum</span>
                        <span class="unit">ETH/USD</span></a>
                    </div>
                    <h6 class="price">USD $3,480.04</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale success">+10.55%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-tether"><span class="path1"></span><span
                            class="path2"></span></span><span>Tether</span>
                        <span class="unit">USDT/USD</span></a>
                    </div>
                    <h6 class="price">USD 1.00</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-0.01%%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-bnb"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span><span
                            class="path6"></span></span><span>BNB</span> <span class="unit">BNB/USD</span></a>
                    </div>
                    <h6 class="price">USD 443.56</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-1.24%</div>
                    </div>
                  </div>
                </div>
                <div class="content-inner">
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-btc"><span class="path1"></span><span class="path2"></span></span>
                        <span>Bitcoin</span>
                        <span class="unit">BTC/USD</span></a>
                    </div>
                    <h6 class="price">USD 46,168.95</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <p class="sale critical">-0.79%</p>
                    </div>
                  </div>
                  <div class="crypto-box active">
                    <div class="top">
                      <a href="#"><span class="icon-eth"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></span><span>Ethereum</span>
                        <span class="unit">ETH/USD</span></a>
                    </div>
                    <h6 class="price">USD $3,480.04</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale success">+10.55%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-tether"><span class="path1"></span><span
                            class="path2"></span></span><span>Tether</span>
                        <span class="unit">USDT/USD</span></a>
                    </div>
                    <h6 class="price">USD 1.00</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-0.01%%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-bnb"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span><span
                            class="path6"></span></span><span>BNB</span> <span class="unit">BNB/USD</span></a>
                    </div>
                    <h6 class="price">USD 443.56</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-1.24%</div>
                    </div>
                  </div>
                </div>
                <div class="content-inner">
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-btc"><span class="path1"></span><span class="path2"></span></span>
                        <span>Bitcoin</span>
                        <span class="unit">BTC/USD</span></a>
                    </div>
                    <h6 class="price">USD 46,168.95</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <p class="sale critical">-0.79%</p>
                    </div>
                  </div>
                  <div class="crypto-box active">
                    <div class="top">
                      <a href="#"><span class="icon-eth"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></span><span>Ethereum</span>
                        <span class="unit">ETH/USD</span></a>
                    </div>
                    <h6 class="price">USD $3,480.04</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale success">+10.55%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-tether"><span class="path1"></span><span
                            class="path2"></span></span><span>Tether</span>
                        <span class="unit">USDT/USD</span></a>
                    </div>
                    <h6 class="price">USD 1.00</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-0.01%%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-bnb"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span><span
                            class="path6"></span></span><span>BNB</span> <span class="unit">BNB/USD</span></a>
                    </div>
                    <h6 class="price">USD 443.56</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-1.24%</div>
                    </div>
                  </div>
                </div>
                <div class="content-inner">
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-btc"><span class="path1"></span><span class="path2"></span></span>
                        <span>Bitcoin</span>
                        <span class="unit">BTC/USD</span></a>
                    </div>
                    <h6 class="price">USD 46,168.95</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <p class="sale critical">-0.79%</p>
                    </div>
                  </div>
                  <div class="crypto-box active">
                    <div class="top">
                      <a href="#"><span class="icon-eth"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></span><span>Ethereum</span>
                        <span class="unit">ETH/USD</span></a>
                    </div>
                    <h6 class="price">USD $3,480.04</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale success">+10.55%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-tether"><span class="path1"></span><span
                            class="path2"></span></span><span>Tether</span>
                        <span class="unit">USDT/USD</span></a>
                    </div>
                    <h6 class="price">USD 1.00</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-0.01%%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-bnb"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span><span
                            class="path6"></span></span><span>BNB</span> <span class="unit">BNB/USD</span></a>
                    </div>
                    <h6 class="price">USD 443.56</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-1.24%</div>
                    </div>
                  </div>
                </div>
                <div class="content-inner">
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-btc"><span class="path1"></span><span class="path2"></span></span>
                        <span>Bitcoin</span>
                        <span class="unit">BTC/USD</span></a>
                    </div>
                    <h6 class="price">USD 46,168.95</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <p class="sale critical">-0.79%</p>
                    </div>
                  </div>
                  <div class="crypto-box active">
                    <div class="top">
                      <a href="#"><span class="icon-eth"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></span><span>Ethereum</span>
                        <span class="unit">ETH/USD</span></a>
                    </div>
                    <h6 class="price">USD $3,480.04</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale success">+10.55%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-tether"><span class="path1"></span><span
                            class="path2"></span></span><span>Tether</span>
                        <span class="unit">USDT/USD</span></a>
                    </div>
                    <h6 class="price">USD 1.00</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-0.01%%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-bnb"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span><span
                            class="path6"></span></span><span>BNB</span> <span class="unit">BNB/USD</span></a>
                    </div>
                    <h6 class="price">USD 443.56</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-1.24%</div>
                    </div>
                  </div>
                </div>
                <div class="content-inner">
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-btc"><span class="path1"></span><span class="path2"></span></span>
                        <span>Bitcoin</span>
                        <span class="unit">BTC/USD</span></a>
                    </div>
                    <h6 class="price">USD 46,168.95</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <p class="sale critical">-0.79%</p>
                    </div>
                  </div>
                  <div class="crypto-box active">
                    <div class="top">
                      <a href="#"><span class="icon-eth"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></span><span>Ethereum</span>
                        <span class="unit">ETH/USD</span></a>
                    </div>
                    <h6 class="price">USD $3,480.04</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale success">+10.55%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-tether"><span class="path1"></span><span
                            class="path2"></span></span><span>Tether</span>
                        <span class="unit">USDT/USD</span></a>
                    </div>
                    <h6 class="price">USD 1.00</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-0.01%%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-bnb"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span><span
                            class="path6"></span></span><span>BNB</span> <span class="unit">BNB/USD</span></a>
                    </div>
                    <h6 class="price">USD 443.56</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-1.24%</div>
                    </div>
                  </div>
                </div>
                <div class="content-inner">
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-btc"><span class="path1"></span><span class="path2"></span></span>
                        <span>Bitcoin</span>
                        <span class="unit">BTC/USD</span></a>
                    </div>
                    <h6 class="price">USD 46,168.95</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <p class="sale critical">-0.79%</p>
                    </div>
                  </div>
                  <div class="crypto-box active">
                    <div class="top">
                      <a href="#"><span class="icon-eth"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></span><span>Ethereum</span>
                        <span class="unit">ETH/USD</span></a>
                    </div>
                    <h6 class="price">USD $3,480.04</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale success">+10.55%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-tether"><span class="path1"></span><span
                            class="path2"></span></span><span>Tether</span>
                        <span class="unit">USDT/USD</span></a>
                    </div>
                    <h6 class="price">USD 1.00</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-0.01%%</div>
                    </div>
                  </div>
                  <div class="crypto-box">
                    <div class="top">
                      <a href="#"><span class="icon-bnb"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span><span class="path5"></span><span
                            class="path6"></span></span><span>BNB</span> <span class="unit">BNB/USD</span></a>
                    </div>
                    <h6 class="price">USD 443.56</h6>
                    <div class="bottom">
                      <p>36,641.20</p>
                      <div class="sale critical">-1.24%</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="coin-list">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block-text">
            <h3 class="heading">Market Rates</h3>
            <a class="btn-action-2" href="#">See All Coins</a>
          </div>

          <div class="coin-list__main">
            <div class="flat-tabs">
              <ul class="menu-tab !sticky !top-0 !left-0">
                <li class="active">
                  <h6 class="fs-16">Crypto</h6>
                </li>
                <li>
                  <h6 class="fs-16">Gift Cards</h6>
                </li>
              </ul>
              <div class="content-tab">
                <div class="content-inner">
                  <table class="table !w-[150%] lg:!w-[100%]" >
                    <thead>
                      <tr>
                        <th scope="col">Asset Name</th>
                        <th scope="col">Sell Rate</th>
                        <th scope="col">Buy Rate</th>
                        <th scope="col">Trade</th>
                      </tr>
                    </thead>
                    <tbody >
                      @foreach ($coins as $coin)
                        <tr>
                          <td>
                            <a href="#">
                              <img src="/images/coins/{{ strtolower($coin->coin_code) }}.svg" class="w-8" alt="">
                              <span>{{ $coin->coin_name }}</span>
                              <span class="unit">{{ $coin->coin_code }}</span></a>
                          </td>
                          <td class="boild">₦{{ number_format($coin->sell_price, 2) }}/$</td>
                          <td class="boild">₦{{ number_format($coin->buy_price, 2) }}/$</td>
                          <td>
                            <a href="#" class="btn">Trade</a>
                            {{-- <a href="#" class="btn">Buy</a> --}}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="content-inner">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Gift Card</th>
                        <th scope="col">Redeem Rate</th>
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
                            <a href="#" class="btn">Trade</a>
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

  <section class="work">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block-text center">
            <h5 class="heading">Get started in a few minutes</h5>
            <p class="fs-20 desc">
              Trade crypto and digital assets with confidence.
            </p>
          </div>

          <div class="work__main">
            <div class="work-box">
              <div class="image">
                <img class="!inline" src="assets/images/icon/Cloud.png" alt="" />
              </div>
              <div class="content">
                <p class="step">Step 1</p>
                <a href="#" class="title">Download</a>
                <p class="text">
                  Stacks is a production-ready library of stackable content
                  blocks built in React Native.
                </p>
              </div>
              <img class="line" src="assets/images/icon/connect-line.png" alt="" />
            </div>
            <div class="work-box">
              <div class="image">
                <img class="!inline" src="assets/images/icon/Wallet.png" alt="" />
              </div>
              <div class="content">
                <p class="step">Step 2</p>
                <a href="#" class="title">Connect wallet</a>
                <p class="text">
                  Stacks is a production-ready library of stackable content
                  blocks built in React Native.
                </p>
              </div>
              <img class="line" src="assets/images/icon/connect-line.png" alt="" />
            </div>
            <div class="work-box">
              <div class="image">
                <img class="!inline" src="assets/images/icon/Mining.png" alt="" />
              </div>
              <div class="content">
                <p class="step">Step 3</p>
                <a href="#" class="title">Start trading</a>
                <p class="text">
                  Stacks is a production-ready library of stackable content
                  blocks built in React Native.
                </p>
              </div>
              <img class="line" src="assets/images/icon/connect-line.png" alt="" />
            </div>
            <div class="work-box">
              <div class="image">
                <img class="!inline" src="assets/images/icon/Comparison.png" alt="" />
              </div>
              <div class="content">
                <p class="step">Step 4</p>
                <a href="#" class="title">Earn money</a>
                <p class="text">
                  Stacks is a production-ready library of stackable content
                  blocks built in React Native.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-12">
          <img src="assets/images/rewards.svg" class="w-full" alt="">
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="about__content" data-aos="fade-up" data-aos-duration="1000">
            <h3 class="heading">Why Choose Us</h3>
            <p class="fs-20 decs">
              Your trusted partner for fast, secure, and hassle-free crypto & gift card trading.
            </p>
            <ul class="list">
              <li>
                <h6 class="title">
                  <span class="icon-check"></span>Trusted by Thousands Nationwide
                </h6>
                <p class="text">
                  We’ve built a solid reputation in the crypto space by delivering secure, fast, and transparent
                  transactions. Join thousands of Nigerians who rely on us for safe Bitcoin and gift card trading.
                </p>
              </li>
              <li>
                <h6 class="title">
                  <span class="icon-check"></span>Swift Payments, Zero Hassles
                </h6>
                <p class="text">
                  Time is money — that’s why we ensure instant payments and easy conversions. Whether you’re buying,
                  selling, or exchanging, we keeps it simple and stress-free.
                </p>
              </li>
            </ul>
            <a href="#" class="btn-action">Explore More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="download">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-12">
          <div class="download__content" data-aos="fade-up" data-aos-duration="1000">
            <h5 class="heading">Download Our App (Coming soon on Ios and Android)</h5>
            <p class="fs-20 decs">
              Experience seamless crypto and gift card trading on the go. With our app, you can buy, sell, and exchange
              anytime, anywhere — faster and safer.
            </p>
            <ul class="list">
              <li>
                <h6 class="title">
                  <span class="icon-check"></span>Buy, Sell, And Trade On The
                  Go
                </h6>
                <p class="text">
                  Manage your assets from your mobile decive
                </p>
              </li>
              <li>
                <h6 class="title">
                  <span class="icon-check"></span>Take Control Of Your Wealth
                </h6>
                <p class="text">
                  Rest assured you (and only you) have access to your funds
                </p>
              </li>
            </ul>
            <div class="group-button">
              <a href="#"><img src="assets/images/icon/googleplay.png" alt="" /></a>
              <a href="#"><img src="assets/images/icon/appstore.png" alt="" /></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="download__image">
            <img src="assets/images/app.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-12">
          <div class="block-text">
            <h3 class="heading">Our customers love what we do</h3>
            <h6 class="fs-20">
              Here’s what our users are saying...
            </h6>
            {{-- <p>
              It is a long established fact that a reader will be distracted
              by the readable content of a page when looking at its layout.
            </p> --}}

            <div class="swiper swiper-thumb1">
              <div class="swiper-wrapper list-img">
                <div class="swiper-slide">
                  <img src="assets/images/avt/avt-02.png" alt="" />
                </div>
                <div class="swiper-slide">
                  <img src="assets/images/avt/avt-03.png" alt="" />
                </div>
                <div class="swiper-slide">
                  <img src="assets/images/avt/avt-04.png" alt="" />
                </div>
              </div>
            </div>
            <div class="couter">
              <h6>30+</h6>
              <p class="title">Customer Reviews</p>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="swiper swiper-testimonial-1">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonials-box">
                  <span class="icon-quote"></span>
                  <h6 class="text">
                    “Super easy to use and the payment was lightning fast. I’m impressed!”
                  </h6>
                  <div class="bottom">
                    <div class="info">
                      <img src="assets/images/avt/avt-02.png" alt="" />
                      <div class="content">
                        <h6 class="name">Emeka D.</h6>
                        {{-- <p class="position">Director, Company</p> --}}
                      </div>
                    </div>
                    {{-- <img src="assets/images/partner/logo-05.png" alt="" /> --}}
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonials-box">
                  <span class="icon-quote"></span>
                  <h6 class="text">
                    “GHands down the best platform for crypto trading in Naija! If you want peace of mind and zero
                    scams, just use Harrybxchange”
                  </h6>
                  <div class="bottom">
                    <div class="info">
                      <img src="assets/images/avt/avt-03.png" alt="" />
                      <div class="content">
                        <h6 class="name">Zainab O.</h6>
                        {{-- <p class="position">Director, Company</p> --}}
                      </div>
                    </div>
                    {{-- <img src="assets/images/partner/logo-05.png" alt="" /> --}}
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonials-box">
                  <span class="icon-quote"></span>
                  <h6 class="text">
                    “ I converted my Bitcoin to Naira sharp-sharp. You guys truly deserve your flowers”
                  </h6>
                  <div class="bottom">
                    <div class="info">
                      <img src="assets/images/avt/avt-04.png" alt="" />
                      <div class="content">
                        <h6 class="name">Tobi Ezeani</h6>
                        {{-- <p class="position">Director, Company</p> --}}
                      </div>
                    </div>
                    {{-- <img src="assets/images/partner/logo-05.png" alt="" /> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- You can open the modal using ID.showModal() method -->
  <button class="btn" onclick="trade_modal.showModal()">open modal</button>
  

  {{-- <div class="du-dock download !backdrop-blur !p-0 text-neutral-content">
    <div class="flex w-full">
      <button class="!w-[95vw] btn-action">
        Start Trading
      </button>
    </div>
  </div> --}}

    {{-- <div class="du-dock download !backdrop-blur !p-0 text-neutral-content" x >
      <button>
        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><polyline points="1 11 12 2 23 11" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></polyline><path d="m5,13v7c0,1.105.895,2,2,2h10c1.105,0,2-.895,2-2v-7" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path><line x1="12" y1="22" x2="12" y2="18" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line></g></svg>
        <span class="du-dock-label">Home</span>
      </button>
      
      <button class="du-dock-active">
        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><polyline points="3 14 9 14 9 17 15 17 15 14 21 14" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></polyline><rect x="3" y="3" width="18" height="18" rx="2" ry="2" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect></g></svg>
        <span class="du-dock-label">Inbox</span>
      </button>
      
      <button>
        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle><path d="m22,13.25v-2.5l-2.318-.966c-.167-.581-.395-1.135-.682-1.654l.954-2.318-1.768-1.768-2.318.954c-.518-.287-1.073-.515-1.654-.682l-.966-2.318h-2.5l-.966,2.318c-.581.167-1.135.395-1.654.682l-2.318-.954-1.768,1.768.954,2.318c-.287.518-.515,1.073-.682,1.654l-2.318.966v2.5l2.318.966c.167.581.395,1.135.682,1.654l-.954,2.318,1.768,1.768,2.318-.954c.518.287,1.073.515,1.654.682l.966,2.318h2.5l.966-2.318c.581-.167,1.135-.395,1.654-.682l2.318.954,1.768-1.768-.954-2.318c.287-.518.515-1.073.682-1.654l2.318-.966Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path></g></svg>
        <span class="du-dock-label">Settings</span>
      </button>
    </div> --}}
    
</div>