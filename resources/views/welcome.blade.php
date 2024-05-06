@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @auth
            <div class="card">
                <h2 class="card-header" style="color: #001e68;">Welcome to e-Aswaaqmisr</h2>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p style="color: #424242;">You are logged in!</p>
                    <div class="additional-content">
                        <h3 style="color: #001e68;">Overview</h3>
                        <p style="font-size: 18px; color: #424242;">
                            This is a simple Customer Relationship Management (CRM) system designed for small businesses to manage their interactions with customers efficiently. It provides basic functionalities such as storing customer information, tracking interactions, and managing tasks. With the addition of new features, it now allows users to manage both companies and employees.</p>
                    </div>
                </div>
            </div>
            @endauth
            @guest
            <div class="card">
                <h2 class="card-header" style="color: #001e68;">Welcome to e-Aswaaqmisr</h2>
                <div class="card-body">
                    <div class="additional-content">
                        <h3 style="color: #001e68;">Read Our Story</h3>
                        <h3 style="color: #001e68;">From The Beginning...</h3>
                        <p style="font-size: 18px; color: #424242;">
                            Established in 2020, eAswaaq is building Egypt’s flagship B2B & B2C marketplace. eAswaaq establishes, manages, and operates platforms that digitize traditional business processes through a wide array of end-to-end solutions connecting buyers and sellers, while providing added-value services including access to financial and logistical services. Offering a fully digital purchasing process, eAswaaq allows merchants to sell finished, intermediate, and raw material products to individual consumers and business customers in both single units and wholesale quantities.</p>
                        <a href="https://easwaaqmisr.com/about-us/" class="btn btn-primary" style="background-color: #001e68; border: none;" >Learn More</a>
                    </div>
                </div>
            </div>
            @endguest

        </div>
    </div>
</div>
@endsection
