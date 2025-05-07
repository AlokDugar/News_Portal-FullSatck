@extends('layouts.app')

@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </section>

    <main>
        <section class="blog-list-area pt-60 pb-60">
            <div class="container">
                <div class="row gy-4 justify-cotnent-center align-items-center">
                    <div class="col-lg-5 pe-lg-4 pe-0">
                        <div class="contact-box">
                            <div class="title">
                                <h3>Contact Us</h3>
                                <p>Morbi quis elementum ex, id commodo odio. In maximus, augue europea vestibulum gomat. </p>
                            </div>
                            <div class="left-social">
                                <ul>
                                    <li><a href="https://www.facebook.com/"><i class="ri-facebook-fill"></i></a></li>
                                    <li><a href="https://www.twitter.com/"><i class="ri-instagram-line"></i></a></li>
                                    <li><a href="https://www.linkedin.com/"><i class="ri-linkedin-fill"></i></a></li>
                                </ul>
                            </div>
                            <div class="informations">
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <div class="info">
                                        <a href="tel:{{$contact->phone}}">+977 {{$contact->phone}}</a>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="info">
                                        <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact__form">
                            <div class="form-title">
                                <h2>Have Any Questions</h2>
                            </div>
                            <form class="form-wrap" id="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your Name*" id="name"
                                                required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" required
                                                placeholder="Email Address*" data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="msg_subject" placeholder="Subject*" id="msg_subject" required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group v1">
                                            <textarea name="message" id="message" placeholder="Your Messages Here" cols="30" rows="10" required data-error="Please enter your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="form-check checkbox">
                                            <input
                                                name="gridCheck"
                                                value="I agree to the terms and privacy policy."
                                                class="form-check-input"
                                                type="checkbox"
                                                id="gridCheck"
                                                required
                                            >
                                            <label class="form-check-label" for="gridCheck">
                                                I agree to the <a  href="terms-conditions.html">Terms &amp; Conditions</a> and <a  href="privacy-policy.html">Privacy Policy</a>
                                            </label>
                                            <div class="help-block with-errors gridCheck-error"></div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-two">Send your Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('msg_subject').value;
        const message = document.getElementById('message').value;

        const data = {
            name: name,
            email: email,
            subject: subject,
            message: message
        };

        fetch('http://127.0.0.1:8000/api/v1/contact-lists', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            console.log('Success:', result);

            Swal.fire({
                icon: 'success',
                title: 'Message Sent!',
                text: 'Thank you for your inquiry. We will get back to you shortly.',
                confirmButtonColor: '#3085d6'
            });

            document.getElementById('contactForm').reset();
        })
        .catch(error => {
            console.error('Error:', error);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong while sending your message.',
                confirmButtonColor: '#d33'
            });
        });
    });
</script>
@endsection
