@extends('static.en.single_layout')
@section('title', 'Контакти')
@section('content')
@include('static.includes.en.lang_btn')
    <div class="col-md-12 header-about-text text-center">
        Contacts
    </div>
    <div class="col-md-12 text-center contacts-wrapper">
        <p>
            <i class="fas fa-search-location"></i> Vratsa, 3000, str. Kokiche 14 (between the bus station and the Language School in Vratsa)
        </p>
        <p>
            <a href="tel:+359 88 207 6174"><i class="fas fa-mobile-alt"></i> mobile: +359 88 207 6174</a>
        </p>
        <p>
            <a href="mailto:school@vratsasoftware.com"><i class="far fa-envelope"></i> e-mail: school@vratsasoftware.com</a>
        </p>
        <p class="col-md-12 google-maps text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2908.1880964326006!2d23.55967391573659!3d43.20554397913902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40ab191ed1f43f5f%3A0x372e45daa202e9b5!2z0YPQuy4g4oCe0JrQvtC60LjRh9C14oCcIDE0LCAzMDAyINC2LtC6LiDQodCw0LzRg9C40LssINCS0YDQsNGG0LA!5e0!3m2!1sbg!2sbg!4v1550230270053" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </p>
    </div>
<div class="section" style="margin-top: -20%">
    @include('static.includes.en.footer')
</div>
@endsection
