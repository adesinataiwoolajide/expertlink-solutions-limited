@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Contact us</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact us</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            
            <div class="contact-us-section-wrappaer section-space--pt_100 section-space--pb_70">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-lg-6">
                            <div class="conact-us-wrap-one mb-30">
                                <h3 class="heading">To make requests for <br>further information, <br><span class="text-color-primary">contact us</span> via our social channels. </h3>
                                <div class="sub-heading">We just need a couple of hours! <br> No more than 2 working days since receiving your issue ticket.</div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="contact-form-wrap">

                                @include('layouts.alert')
                                <form id="elsContactForm" method="POST" action="{{ route('website.sendContactUs') }}">
                                    @csrf
                                    <div class="contact-form">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input name="full_name" type="text" placeholder="Your Full Name *" required value="{{ old('full_name') }}">
                                                @if ($errors->has('full_name'))
                                                    <span style="color:red">{{ $errors->first('full_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="contact-inner">
                                                <input name="email" type="email" placeholder="Your Email *" required value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="contact-inner">
                                                <input name="subject" type="text" placeholder="Subject *" required value="{{ old('subject') }}">
                                                @if ($errors->has('subject'))
                                                    <span style="color:red">{{ $errors->first('subject') }}</span>
                                                @endif
                                            </div>
                                            <div class="contact-inner">
                                                <input name="phone_number"
                                                    type="text"
                                                    placeholder="Phone Number *"
                                                    required
                                                    value="{{ old('phone_number') }}"
                                                    pattern="[0-9]{10,11}"
                                                    title="Phone number must be 10–11 digits"
                                                    maxlength="11"
                                                    minlength="10">
                                                @if ($errors->has('phone_number'))
                                                    <span style="color:red">{{ $errors->first('phone_number') }}</span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea name="message" placeholder="Please describe what you need." required>{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span style="color:red">{{ $errors->first('message') }}</span>
                                            @endif
                                        </div>
                                        <div class="submit-btn mt-20">
                                            <button class="ht-btn ht-btn-md" type="submit">Send message</button>
                                            
                                        </div>
                                    </div>
                                </form>

                                <style>
                                    /* Styling for valid/invalid inputs */
                                    .valid-input {
                                        border: 2px solid green !important;
                                    }
                                    .invalid-input {
                                        border: 2px solid red !important;
                                    }
                                </style>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const form = document.getElementById("elsContactForm");

                                        // Helper function to show inline feedback + border styling
                                        function showFeedback(input, message, isValid) {
                                            // Remove old feedback
                                            const oldFeedback = input.parentNode.querySelector(".js-feedback");
                                            if (oldFeedback) oldFeedback.remove();

                                            // Remove old border classes
                                            input.classList.remove("valid-input", "invalid-input");

                                            if (message) {
                                                const feedback = document.createElement("span");
                                                feedback.classList.add("js-feedback");
                                                feedback.style.display = "block";
                                                feedback.textContent = message;
                                                feedback.style.color = isValid ? "green" : "red";
                                                input.insertAdjacentElement("afterend", feedback);

                                                // Apply border styling
                                                if (isValid) {
                                                    input.classList.add("valid-input");
                                                } else {
                                                    input.classList.add("invalid-input");
                                                }
                                            }
                                        }

                                        // Validation functions
                                        function validateFullName() {
                                            const input = form.querySelector("input[name='full_name']");
                                            const value = input.value.trim();
                                            if (!/^[A-Za-z]+ [A-Za-z]+/.test(value)) {
                                                showFeedback(input, "Please enter both first name and last name.", false);
                                                return false;
                                            }
                                            showFeedback(input, "✅ Looks good!", true);
                                            return true;
                                        }

                                        function validateEmail() {
                                            const input = form.querySelector("input[name='email']");
                                            const value = input.value.trim();
                                            const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
                                            if (!emailPattern.test(value)) {
                                                showFeedback(input, "Please enter a valid email address.", false);
                                                return false;
                                            }
                                            showFeedback(input, "✅ Valid email!", true);
                                            return true;
                                        }

                                        function validatePhone() {
                                            const input = form.querySelector("input[name='phone_number']");
                                            const value = input.value.trim();
                                            const phonePattern = /^[0-9]{10,11}$/;
                                            if (!phonePattern.test(value)) {
                                                showFeedback(input, "Phone number must be 10–11 digits.", false);
                                                return false;
                                            }
                                            showFeedback(input, "✅ Valid phone number!", true);
                                            return true;
                                        }

                                        function validateSubject() {
                                            const input = form.querySelector("input[name='subject']");
                                            const value = input.value.trim();
                                            if (value.length < 5) {
                                                showFeedback(input, "Subject must be at least 5 characters long.", false);
                                                return false;
                                            }
                                            showFeedback(input, "✅ Subject looks good!", true);
                                            return true;
                                        }

                                        function validateMessage() {
                                            const input = form.querySelector("textarea[name='message']");
                                            const value = input.value.trim();
                                            if (value.length < 20) {
                                                showFeedback(input, "Message must be at least 20 characters long.", false);
                                                return false;
                                            }
                                            showFeedback(input, "✅ Message looks good!", true);
                                            return true;
                                        }

                                        // Attach real-time validation
                                        form.querySelector("input[name='full_name']").addEventListener("input", validateFullName);
                                        form.querySelector("input[name='email']").addEventListener("input", validateEmail);
                                        form.querySelector("input[name='phone_number']").addEventListener("input", validatePhone);
                                        form.querySelector("input[name='subject']").addEventListener("input", validateSubject);
                                        form.querySelector("textarea[name='message']").addEventListener("input", validateMessage);

                                        // Final check before submission
                                        form.addEventListener("submit", function (e) {
                                            const valid =
                                                validateFullName() &&
                                                validateEmail() &&
                                                validatePhone() &&
                                                validateSubject() &&
                                                validateMessage();

                                            if (!valid) {
                                                e.preventDefault(); // stop submission
                                                alert("Please fix the errors before submitting the form.");
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- <div class="contact-us-info-wrappaer section-space--pb_100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="conact-info-wrap mt-30">
                                <h5 class="heading mb-20">San Francisco</h5>
                                <ul class="conact-info__list">
                                    <li>58 Howard Street #2 San Francisco, CA 941</li>
                                    <li><a href="#" class="hover-style-link text-color-primary">contact.sanfrancisco@mitech.com</a></li>
                                    <li><a href="#" class="hover-style-link text-black font-weight--bold">(+68)1221 09876</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="conact-info-wrap mt-30">
                                <h5 class="heading mb-20">New York</h5>
                                <ul class="conact-info__list">
                                    <li>58 Howard Street #14 New York</li>
                                    <li><a href="#" class="hover-style-link text-color-primary">contact.newyork@mitech.com</a></li>
                                    <li><a href="#" class="hover-style-link text-black font-weight--bold">(+47)1221 09878</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="conact-info-wrap mt-30">
                                <h5 class="heading mb-20">Russia</h5>
                                <ul class="conact-info__list">
                                    <li>The Courtyard Building 11 Curtain Road, Russia</li>
                                    <li><a href="#" class="hover-style-link text-color-primary">contact.russia@mitech.com</a></li>
                                    <li><a href="#" class="hover-style-link text-black font-weight--bold">(+53)1221 09877</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}
           
        </div>
    </div>

@endsection