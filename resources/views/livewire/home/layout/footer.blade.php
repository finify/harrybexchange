<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<footer class="footer style-2">
    <div class="container">
        <div class="footer__main">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="info">
                        <a href="index.html" class="logo">
                            <img src="/assets/images/harryblogo.png" alt="" width="200px" />
                        </a>
                        <h6>Let's talk! 🤙</h6>
                        <ul class="list">
                            <li>
                                <p>+12 345 678 9101</p>
                            </li>
                            <li>
                                <p>info@harrybexchange.com</p>
                            </li>
                            {{-- <li>
                                <p>
                                    Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi
                                    96522
                                </p>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="widget">
                        <div class="widget-link">
                            <h6 class="title">PRODUCTS</h6>
                            <ul>
                                <li><a href="#">Crypto</a></li>
                                <li><a href="#">Giftcards</a></li>
                                <li><a href="#">E-funds</a></li>
                            </ul>
                        </div>
                        <div class="widget-link s2">
                            <h6 class="title">Company</h6>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="footer-contact">
                        <h5>Newletters</h5>
                        <p>
                            Subscribe our newsletter to get more useful updates
                        </p>
                        <form action="#">
                            <input type="email" placeholder="Enter your email" required="" />
                            <button type="submit" class="btn-action">Submit</button>
                        </form>
                        <ul class="list-social">
                            <li>
                                <a href="#"><span class="icon-facebook-f"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-youtube"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid !pb-[50px]">
        <div class="footer__bottom">
            <p>
                ©2025 {{ config('app.name') }}. All rights reserved. 
            </p>
        </div>
    </div>
</footer>