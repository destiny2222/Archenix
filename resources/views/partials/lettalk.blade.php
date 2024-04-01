<section class="lets-talk">
    <div class="background bg-img bg-fixed section-padding" data-background="images/slider/1.jpg" data-overlay-dark="6">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-30">
                    <div class="sub-title border-bot-dark">Contact Us</div>
                </div>
                <div class="col-md-7">
                    <div class="section-title">Let's discuss your project</div>
                    <p>Fill out the form and our manager will contact you for consultation.</p>
                    <form method="post" class="" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input class="line-gray" name="name" type="text" placeholder="Full Name *" required="">
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="line-gray" name="email" type="email" placeholder="Email Address *" required="">
                            </div>
                            <div class="col-md-3 form-group">
                                <input class="line-gray" name="phone" type="text" placeholder="Phone *" required="">
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="line-gray" name="subject" type="text" placeholder="Subject *" required="">
                            </div>
                            <div class="col-md-6 form-group">
                                <textarea class="line-gray" name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                            </div>
                            <div class="col-md-2">
                                <input class="line-gray" name="submit" type="submit" value="Send">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>