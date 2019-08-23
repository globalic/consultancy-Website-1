<form class="form form-submit" method="post" action="{{route('store.store')}}"
                              enctype="multipart/form-data">
                           @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label required">Your Name</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Phone" class="col-form-label required">Phone Number</label>
                                            <input name="phone" type="text" class="form-control" id="phone" placeholder="Contact number" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="col-form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="subject" placeholder="Your Email" required>
                                </div>
                                <!--end row-->
                                <div class="form-group">
                                    <label for="subject" class="col-form-label">Subject</label>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="message" class="col-form-label required">Your Message</label>
                                    <textarea name="description" id="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LdbK5IUAAAAADgrfqGtA2xFZSKue5QZ3ou2f20o"></div>
    
                                <button type="submit" class="btn btn-primary float-right">Send Message</button>
                            </form>