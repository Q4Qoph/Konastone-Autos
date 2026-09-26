@extends('layouts.app')

@section('title', 'Konastone Autos and Imports - Contact Page')
@section('meta_description', 'Contact Konastone Autos and Imports in Mombasa.')
@section('canonical', route('contact'))
@section('og_title', 'Konastone Autos and Imports - Contact Page')
@section('og_description', 'Contact Konastone Autos and Imports in Mombasa.')

@section('page-sections')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg.jpg') }}" data-overlay="black" data-opacity="3">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Page</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-area-2 space-top" id="contact-sec">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title">Our Contact Information</h2>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-4 col-lg-6 contact-feature-wrap">
                    <div class="contact-feature">
                        <div class="contact-feature-icon">
                            <i class="fa-sharp fa-regular fa-location-dot"></i>
                        </div>
                        <div class="media-body">
                            <p class="contact-feature_label">Our Address</p>
                            <a href="{{ config('dealership.contact.map_url') }}" class="contact-feature_link">{{ config('dealership.contact.address') }}, {{ config('dealership.contact.city') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 contact-feature-wrap">
                    <div class="contact-feature">
                        <div class="contact-feature-icon">
                            <i class="fa-regular fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <p class="contact-feature_label">Contact Number</p>
                            <a href="tel:{{ config('dealership.contact.phone_formatted') }}" class="contact-feature_link">Mobile: {{ config('dealership.contact.phone') }}</a>
                            <a href="mailto:{{ config('dealership.contact.email') }}" class="contact-feature_link">Email: {{ config('dealership.contact.email') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 contact-feature-wrap">
                    <div class="contact-feature">
                        <div class="contact-feature-icon">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div class="media-body">
                            <p class="contact-feature_label">Opening Hour</p>
                            <span class="contact-feature_link">{{ config('dealership.contact.working_hours') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-form-area">
        <div class="container">
            <div class="row gx-0">
                <div class="col-xl-12">
                    <div class="contact-all-wrapper">
                        <div class="row gy-30 align-items-center">
                            <div class="col-lg-7">
                                <div class="contact-form-wrap">
                                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                                        @csrf
                                        <h3 class="form-title">Get In Touch</h3>
                                        @if (session('contact_status'))
                                            <div class="alert alert-success" role="status">{{ session('contact_status') }}</div>
                                        @endif
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Your Name">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="tel" class="form-control @error('number') is-invalid @enderror" name="number" id="number" value="{{ old('number') }}" placeholder="Phone Number">
                                                @error('number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <select name="subject" id="subject" class="orderby @error('subject') is-invalid @enderror">
                                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }} hidden>Select Subject</option>
                                                    <option value="Car Purchase" @selected(old('subject') === 'Car Purchase')>Car Purchase</option>
                                                    <option value="Test Drive" @selected(old('subject') === 'Test Drive')>Test Drive</option>
                                                    <option value="Vehicle Availability" @selected(old('subject') === 'Vehicle Availability')>Vehicle Availability</option>
                                                    <option value="Trade-In or Sell a Car" @selected(old('subject') === 'Trade-In or Sell a Car')>Trade-In or Sell a Car</option>
                                                    <option value="Financing" @selected(old('subject') === 'Financing')>Financing</option>
                                                    <option value="Other" @selected(old('subject') === 'Other')>Other</option>
                                                </select>
                                                @error('subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <textarea name="message" id="message" cols="30" rows="3" class="form-control @error('message') is-invalid @enderror" placeholder="Your Message">{{ old('message') }}</textarea>
                                                @error('message')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-btn col-12">
                                                <button class="th-btn star-btn">Submit Message</button>
                                            </div>
                                        </div>
                                        <p class="form-messages mb-0 mt-3"></p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="contact-form-thumb overflow-hidden">
                                    <img src="{{ asset('assets/img/contact/contact-page-thumb.jpg') }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-top">
        <div class="container-fluid p-0">
            <div class="contact-map">
                <iframe src="{{ config('dealership.contact.map_embed_url') }}" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection
