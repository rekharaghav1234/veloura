@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h3 class="fw-bold mb-4">
                        Select Payment Method
                    </h3>
                    <form id="paymentForm">

                        @csrf
                    
                        <div class="payment-option border rounded p-3 mb-3">
                            <input type="radio"
                                   name="payment_method"
                                   value="COD"
                                   checked>
                    
                            <label class="ms-2 fw-semibold">
                                Cash On Delivery
                            </label>
                    
                            <div class="text-muted small">
                                Pay when your order arrives
                            </div>
                        </div>
                    
                        <div class="payment-option border rounded p-3 mb-3">
                            <input type="radio"
                                   name="payment_method"
                                   value="ONLINE">
                    
                            <label class="ms-2 fw-semibold">
                                Online Payment
                            </label>
                    
                            <div class="small text-muted mt-2">
                    
                                <i class="bi bi-phone"></i> Google Pay &nbsp;
                    
                                <i class="bi bi-phone"></i> PhonePe &nbsp;
                    
                                <i class="bi bi-credit-card"></i> Cards &nbsp;
                    
                                <i class="bi bi-bank"></i> Net Banking
                    
                            </div>
                        </div>
                    
                        <button type="button"
                        id="payBtn"
                        class="btn btn-dark w-100 py-3">
                    Continue
                </button>
                    
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    
document.getElementById('payBtn').addEventListener('click', function(){

let paymentMethod =
document.querySelector('input[name="payment_method"]:checked').value;
console.log(paymentMethod);
if(paymentMethod === 'COD')
{
    fetch('{{ url("/place-order") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            payment_method: 'COD'
        })
    })
    .then(res => res.json())
    .then(data => {

        console.log(data);

        if(data.success)
{
    Swal.fire({
        icon: 'success',
        title: 'Order Placed Successfully!',
        html: `
            <p>Thank you for shopping with <b>Veloura</b>.</p>
            <p>Your Order ID: <b>#${data.order_id}</b></p>
        `,
        confirmButtonText: 'Track Order',
        confirmButtonColor: '#16a34a',
        allowOutsideClick: false
    }).then(() => {
        window.location.href = '/my-orders';
    });
}
else
{
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: data.message
    });
}

    });

    return;
}

// ONLINE PAYMENT
fetch('/create-razorpay-order')
.then(res => res.json())
.then(data => {

    let rzp = new Razorpay({
        key: "{{ env('RAZORPAY_KEY') }}",
        amount: data.amount,
        currency: "INR",
        order_id: data.order_id,

        handler: function(response){

            fetch('/payment-success',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                },
                body:JSON.stringify({
                    razorpay_payment_id:response.razorpay_payment_id,
                    razorpay_order_id:response.razorpay_order_id
                })
            })
            .then(res=>res.json())
            .then(data=>{

                Swal.fire({
    icon: 'success',
    title: 'Payment Successful!',
    html: `
        <p>Your order has been placed successfully.</p>
        <p>Thank you for shopping with <b>Veloura</b>.</p>
    `,
    confirmButtonText: 'Track Order',
    confirmButtonColor: '#16a34a',
    allowOutsideClick: false
}).then(() => {
    window.location.href = '/my-orders';
});

            });

        }
    });

    rzp.open();

});
});
    
    </script>
    {{-- <script>
        document.getElementById('payBtn').addEventListener('click', function () {
        
            console.log("Button Clicked");
        
            let paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        
            console.log("Payment Method:", paymentMethod);
        
            if (paymentMethod === 'COD') {
        
                console.log("Sending Request...");
        
                fetch('/place-order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        payment_method: paymentMethod
                    })
                })
                .then(async (res) => {
        
                    console.log("Status:", res.status);
        
                    const text = await res.text();
        
                    console.log("Response:", text);
        
                    if(res.status != 200){
                        return;
                    }
        
                    const data = JSON.parse(text);
        
                    if(data.success){
        
                        Swal.fire({
                            icon:'success',
                            title:'Order Placed Successfully!',
                            text:'Thank you for shopping with Veloura.'
                        }).then(()=>{
                            window.location='/my-orders';
                        });
        
                    }else{
        
                        Swal.fire({
                            icon:'error',
                            title:'Error',
                            text:data.message ?? 'Something went wrong'
                        });
        
                    }
        
                })
                .catch(err=>{
                    console.log("Fetch Error:", err);
                });
        
                return;
            }
        
            // ONLINE PAYMENT
            console.log("ONLINE PAYMENT");
        
        });
        </script> --}}
        @endsection