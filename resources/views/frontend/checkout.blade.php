@extends('frontend.layouts.app')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4">

            <!-- CHECKOUT FORM -->
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-4">
                            Delivery Address
                        </h3>

                        <form action="{{ route('checkout.address.save') }}" method="POST">

                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="fw-semibold mb-2">
                                        Full Name
                                    </label>

                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name', Auth::user()->name ?? '') }}"
                                           required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="fw-semibold mb-2">
                                        Mobile Number
                                    </label>

                                    <input type="text"
                                           name="phone"
                                           class="form-control"
                                           value="{{ old('phone', Auth::user()->phone ?? '') }}"
                                           required>

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="fw-semibold mb-2">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email', Auth::user()->email ?? '') }}"
                                       required>

                            </div>

                            <div class="mb-3">

                                <label class="fw-semibold mb-2">
                                    House No / Flat No
                                </label>

                                <input type="text"
                                name="house_no"
                                class="form-control"
                                value="{{ old('house_no', Auth::user()->house_no ?? '') }}">

                            </div>

                            <div class="mb-3">

                                <label class="fw-semibold mb-2">
                                    Area / Street / Colony
                                </label>

                                <input type="text"
                                name="area"
                                class="form-control"
                                value="{{ old('area', Auth::user()->area ?? '') }}"
                                required>

                            </div>

                            <div class="mb-3">

                                <label class="fw-semibold mb-2">
                                    Landmark (Optional)
                                </label>

                                <input type="text"
                                name="landmark"
                                class="form-control"
                                value="{{ old('landmark', Auth::user()->landmark ?? '') }}">

                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Pincode</label>
                            
                                <input type="text"
                                       name="pincode"
                                       class="form-control"
                                       value="{{ old('pincode', Auth::user()->pincode ?? '') }}"
                                       required>
                            </div>
                         

                                {{-- <div class="col-md-4 mb-3">

                                    <label class="fw-semibold mb-2">
                                        City
                                    </label>

                                    <input type="text"
                                           name="city"
                                           class="form-control"
                                           required>

                                </div>

                                <div class="col-md-4 mb-3">

                                    <label class="fw-semibold mb-2">
                                        State
                                    </label>

                                    <input type="text"
                                           name="state"
                                           class="form-control"
                                           required>

                                </div>

                                <div class="col-md-4 mb-3">

                                    <label class="fw-semibold mb-2">
                                        Pincode
                                    </label>

                                    <input type="text"
                                           name="pincode"
                                           class="form-control"
                                           required>

                                </div> --}}


<div class="row">

    <div class="col-md-4 mb-3">
        <label>Country</label>
        <select class="form-control" id="country" name="country">
            <option value="India" selected>India</option>
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label>State</label>
        <select class="form-control"
        id="state"
        name="state">

    @if(Auth::user()->state)
        <option value="{{ Auth::user()->state }}" selected>
            {{ Auth::user()->state }}
        </option>
    @else
        <option value="">Select State</option>
    @endif

</select>
    </div>

    <div class="col-md-4 mb-3">
        <label>District</label>
        <select class="form-control"
        id="district"
        name="district">

    @if(Auth::user()->district)
        <option value="{{ Auth::user()->district }}" selected>
            {{ Auth::user()->district }}
        </option>
    @else
        <option value="">Select District</option>
    @endif

</select>
    </div>

    <div class="col-md-4 mb-3">
        <label>City</label>
        <input type="text"
       class="form-control"
       id="city"
       name="city"
       value="{{ old('city', Auth::user()->city ?? '') }}"
       required>
    </div>

</div>

                           

<button type="submit"
class="btn btn-dark px-5 py-3 mt-3 rounded-3">
Continue To Payment
</button>

                        </form>

                    </div>

                </div>

            </div>

            <!-- ORDER SUMMARY -->
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            Order Summary
                        </h4>

                        @php
                            $total = 0;
                        @endphp

                        @foreach($carts as $cart)

                            @php
                                $subtotal = $cart->product->price * $cart->quantity;
                                $total += $subtotal;
                            @endphp

                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('uploads/products/'.$cart->product->first_image) }}"
                                style="width:70px;height:70px;object-fit:cover;border-radius:10px;">
                        

                                <div class="ms-3 flex-grow-1">

                                    <h6 class="mb-1">
                                        {{ $cart->product->name }}
                                    </h6>

                                    <small class="text-muted">
                                        Qty : {{ $cart->quantity }}
                                    </small>

                                </div>

                                <strong>
                                    ₹{{ $subtotal }}
                                </strong>

                            </div>

                        @endforeach

                        <hr>

                        <div class="d-flex justify-content-between">

                            <span>Subtotal</span>

                            <strong>
                                ₹{{ $total }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mt-2">

                            <span>Delivery</span>

                            <span class="text-success">
                                FREE
                            </span>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <h5 class="fw-bold">
                                Total
                            </h5>

                            <h5 class="fw-bold">
                                ₹{{ $total }}
                            </h5>

                        </div>

                        <div class="alert alert-success mt-3 mb-0">

                            Estimated Delivery:
                            <strong>
                                {{ now()->addDays(5)->format('d M Y') }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
 
</section>
<script>

    document.addEventListener("DOMContentLoaded", function () {
    
        const stateDropdown = document.getElementById('state');
        const districtDropdown = document.getElementById('district');
        const cityDropdown = document.getElementById('city');
    
        // STATES LOAD
        fetch('https://countriesnow.space/api/v0.1/countries/states', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                country: 'India'
            })
        })
        .then(res => res.json())
        .then(data => {
    
            data.data.states.forEach(state => {
    
                stateDropdown.innerHTML +=
                    `<option value="${state.name}">
                        ${state.name}
                    </option>`;
    
            });
    
        });
    
        // DISTRICT LOAD
        // stateDropdown.addEventListener('change', function () {
    
        //     let state = this.value;
    
        //     districtDropdown.innerHTML =
        //         '<option>Loading...</option>';
    
        //     cityDropdown.innerHTML =
        //         '<option>Select City</option>';
    
        //     fetch('https://api.postalpincode.in/postoffice/' + state)
        //     .then(res => res.json())
        //     .then(data => {
    
        //         districtDropdown.innerHTML =
        //             '<option>Select District</option>';
    
        //         let districts = [];
    
        //         if(data[0].PostOffice){
    
        //             data[0].PostOffice.forEach(item => {
    
        //                 if(!districts.includes(item.District)){
    
        //                     districts.push(item.District);
    
        //                     districtDropdown.innerHTML +=
        //                         `<option value="${item.District}">
        //                             ${item.District}
        //                         </option>`;
        //                 }
    
        //             });
    
        //         }
    
        //     });
    
        // });
        stateDropdown.addEventListener('change', function () {

let state = this.value;

districtDropdown.innerHTML =
    '<option>Loading...</option>';

cityDropdown.innerHTML =
    '<option>Select City</option>';

fetch('https://countriesnow.space/api/v0.1/countries/state/cities', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        country: 'India',
        state: state
    })
})
.then(res => res.json())
.then(data => {

    districtDropdown.innerHTML =
        '<option value="">Select District</option>';

    data.data.forEach(city => {

        districtDropdown.innerHTML +=
            `<option value="${city}">
                ${city}
            </option>`;
    });

});

});
    
        // CITY LOAD
    
    
    });
    
    </script>


@endsection