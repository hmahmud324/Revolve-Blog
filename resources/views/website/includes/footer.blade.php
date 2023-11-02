<section class="footer-2 section-padding gray-bg pb-5">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('subscribe-newsletter') }}" method="POST" class="subscribe-footer text-center">
                @csrf
                <div class="form-group mb-0">
                    <h2 class="mb-3">Subscribe Newsletter</h2>
                    <p class="mb-4">Subscribe to my Newsletter for new blog posts, tips, and info.</p>
                    <div class="form-group form-row align-items-center mb-0">
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-dark" type="submit">Subscribe</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        <div class="footer-btm mt-5 pt-4 border-top">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline footer-socials-2 text-center">
                        <li class="list-inline-item"><a href="#">Privacy policy</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                        <li class="list-inline-item"><a href="#">About</a></li>
                        <li class="list-inline-item"><a href="#">Contact</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Category</a></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="copyright text-center ">
                        @ copyright all reserved to <a href="https://themefisher.com/">themefisher.com</a>-2019
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
