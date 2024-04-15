<section id="contact" class="lets-talk">
    <div class="background bg-img bg-fixed section-padding" data-background="images/slider/1.jpg" data-overlay-dark="6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="section-title">Have a question or want to learn more about our ventures?
                        </div>
                    <p>Contact us today and let's explore
                        how we can collaborate to drive innovation and create value together.</p>
                    <form method="post" class="" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input class="line-gray" name="name" type="text" placeholder="Full Name *" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="line-gray" name="email" type="email" placeholder="Email Address *" required="">
                            </div>
                            {{-- <div class="col-md-12 form-group">
                                <input class="line-gray" name="phone" type="text" placeholder="Phone *" required="">
                            </div> --}}
                            {{-- <div class="col-md-6 form-group">
                                <input class="line-gray" name="subject" type="text" placeholder="Subject *" required="">
                            </div> --}}
                            <div class="col-md-12 form-group">
                                <textarea class="line-gray" name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <input class="line-gray w-100" name="submit" type="submit" value="Send">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>