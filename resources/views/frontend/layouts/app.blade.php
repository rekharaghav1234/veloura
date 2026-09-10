<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>VELOURA</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/vendor.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap"
    rel="stylesheet">

    <style>

        *{
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#f8f9fa;
        }

        .navbar{
            background:white;
        }

        .hero{
    height: 90vh;
    background:
    linear-gradient(rgba(0,0,0,0.4),
    rgba(0,0,0,0.4)),
    url('/images/banner.png');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    display: flex;
    align-items: center;
}
        

        .product-card{
            background:white;
            border-radius:20px;
            overflow:hidden;
            transition:0.3s;
        }

        .product-card:hover{
            transform:translateY(-5px);
        }

        .product-card img{
            height:350px;
            object-fit:cover;
        }

        .price{
            font-size:20px;
            font-weight:600;
        }

        @media(max-width:768px){

            .hero{
                height:70vh;
            }

            .hero h1{
                font-size:40px;
            }

        }
        /* =========================
   PREMIUM NAVBAR
========================= */



/* LOGO */

/* Fix navbar height independent of logo */
/* .custom-navbar{
    background: rgba(246, 238, 232, 0.92);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid #ead7cd;
    height: 120px; /* fixed navbar height */


/* Logo inside navbar */
.logo-img{
    max-height: 80px; /* logo max height */
    width: auto;
    object-fit: contain;
}

.navbar-nav .nav-link{
    color: #4B342C;
    font-weight: 500;
    font-size: 15px;
    letter-spacing: 0.5px;
    transition: 0.3s;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active{
    color: #B76E79;
}

.nav-action-btn{
    padding: 10px 22px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: 0.3s;
}

.login-btn{
    border: 1px solid #d8b8be;
    color: #4B342C;
    background: transparent;
}

.login-btn:hover{
    background: #f3e3e6;
}

.register-btn{
    background: #B76E79;
    color: white;
    border: none;
}

.register-btn:hover{
    background: #9d5963;
    color: white;
}

.user-box{
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-circle{
    height: 38px;
    width: 38px;
    border-radius: 50%;
    background: #B76E79;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.user-name{
    color: #4B342C;
    font-weight: 500;
}

.admin-btn{
    background: #4B342C;
    color: white;
}

.logout-btn{
    background: #e8d4c8;
    color: #4B342C;
    border: none;
}

.navbar-toggler{
    border: none !important;
    box-shadow: none !important;
}


/* footer */
footer{
    background: #4B342C !important;
    color: #F6EEE8;
    border-top: 1px solid #d8c2b7;
}

/* Footer Text */

footer p{
    color: #f3e7e1 !important;
}

/* Small Text */

footer .small{
    color: #d9c1b6 !important;
}

/* Logo */

footer img{
    height: 90px;
    object-fit: contain;
}

/* Optional Social Icons */

.footer-icons a{
    color: #F6EEE8;
    font-size: 20px;
    margin: 0 10px;
    transition: 0.3s;
}

.footer-icons a:hover{
    color: #B76E79;
}
.admin-sidebar{
    width:280px;
    position:fixed;
    left:0;
    top:0;
    height:100vh;
}

.admin-content{
    margin-left:280px;
    padding:20px;
}
.admin-sidebar{
    position: fixed;
    left: -280px;
    top: 0;
    width: 280px;
    height: 100vh;
    background: #1f2937;
    transition: 0.3s;
    z-index: 9999;
}

.admin-sidebar.active{
    left: 0;
}
.category-circle{
    width:100%;
    max-width:220px;
    aspect-ratio:1/1;
    object-fit:cover;
    border-radius:50%;
    transition:.3s;
}

.category-circle:hover{
    transform:scale(1.05);
}

.category-btn{
    text-decoration:none;
    font-weight:600;
    color:#000;
}

@media(max-width:768px){

    .category-circle{
        max-width:90px;
    }

    .category-btn{
        font-size:12px;
    }

    .categories .row{
        flex-wrap:nowrap;
    }
}

.custom-navbar{
    position: fixed;
    top:0;
    left:0;
    width:100%;
    z-index:1055;

    background: rgba(246,238,232,.95);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    border-bottom:1px solid #ead7cd;

    height:90px;
    display:flex;
    align-items:center;

    box-shadow:0 2px 10px rgba(0,0,0,.08);
}
body{
    padding-top: 100px;   /* navbar ki height ke according */
}
.categories{
    margin-top: 20px;
    padding-top: 20px;
}

.product-content{
    padding:14px;
}

.product-name{
    font-size:18px;
    font-weight:600;
    color:#222;
    margin-bottom:12px;

    overflow:hidden;
    display:-webkit-box;
    -webkit-line-clamp:1;
    -webkit-box-orient:vertical;
}

.product-bottom{
    display:flex;
    justify-content:space-between;
    align-items:end;
}

.left-info{
    display:flex;
    flex-direction:column;
    gap:8px;
}

.rating-box{
    display:inline-flex;
    align-items:center;
    gap:4px;

    background:#0f9d58;
    color:#fff;

    padding:4px 10px;

    border-radius:20px;

    font-size:12px;
    font-weight:600;

    width:max-content;
}

.product-price{
    font-size:34px;
    font-weight:700;
    color:#111;
}

.view-btn{

    background:#111;
    color:#fff;
    text-decoration:none;

    padding:10px 18px;
    border-radius:30px;

    font-size:14px;
    font-weight:600;

    transition:.3s;
}

.view-btn:hover{
    background:#444;
    color:#fff;
}

.product-content{
    padding:12px;
}

.product-badge{
    display:inline-block;
    background:#111;
    color:#fff;
    font-size:10px;
    padding:3px 8px;
    border-radius:20px;
    margin-bottom:8px;
}

.product-name{
    font-size:16px;
    font-weight:600;
    color:#222;
    margin-bottom:4px;
}

.product-description{
    font-size:12px;
    color:#777;
    line-height:18px;
    margin-bottom:10px;

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.price-rating-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:12px;
}

.product-price{
    font-size:22px;
    font-weight:600;
    color:#111;
}

.rating-box{
    background:#16a34a;
    color:#fff;
    padding:3px 9px;
    border-radius:20px;
    font-size:12px;
    font-weight:500;
}

.view-btn{
    display:block;
    width:100%;
    background:#222;
    color:#fff;
    text-align:center;
    padding:8px;
    border-radius:8px;
    text-decoration:none;
    font-size:13px;
    transition:.3s;
}

.view-btn:hover{
    background:#000;
    color:#fff;
}

@media(max-width:768px){

.product-content{
    padding:10px;
}

.product-name{
    font-size:14px;
}

.product-description{
    font-size:11px;
    margin-bottom:8px;
}

.product-price{
    font-size:18px;
}

.rating-box{
    font-size:11px;
    padding:2px 8px;
}

.view-btn{
    padding:7px;
    font-size:12px;
}
/* CATEGORY SECTION */

.categories{
    padding:30px 0;
}

.category-img{
    width:170px !important;
    height:170px !important;
    border-radius:50% !important;
    object-fit:cover !important;
    display:block;
    margin:auto;
    border:4px solid #eee;
    box-shadow:0 5px 15px rgba(0,0,0,.15);

    max-width:none !important;
}

.category-title{
    margin-top:12px;
    font-size:18px;
    font-weight:600;
}

/* Mobile */

@media(max-width:768px){

.category-img{
    width:80px !important;
    height:80px !important;
}

.category-title{
    font-size:13px;
}

}
/* ── reset & base ── */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background: #f5f7fb;
    padding: 2rem 1rem;
    color: #1e293b;
}

.container-fluid {
    max-width: 1440px;
    margin: 0 auto;
}

/* ── page header ── */
.page-header {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    gap: 1rem;
}

.page-header h3 {
    font-weight: 700;
    font-size: 1.75rem;
    letter-spacing: -0.02em;
    color: #0f172a;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.page-header h3 i {
    color: #3b82f6;
    font-size: 1.9rem;
}

.header-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.75rem;
}

.header-actions .search-box {
    position: relative;
    width: 260px;
}

.header-actions .search-box input {
    width: 100%;
    padding: 0.55rem 1rem 0.55rem 2.6rem;
    border-radius: 40px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    font-size: 0.9rem;
    transition: all 0.2s;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
}

.header-actions .search-box input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
}

.header-actions .search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 1rem;
}

.btn-outline-primary-custom {
    border-radius: 40px;
    padding: 0.5rem 1.4rem;
    font-weight: 500;
    font-size: 0.875rem;
    border: 1px solid #e2e8f0;
    background: #fff;
    color: #1e293b;
    transition: all 0.2s;
}

.btn-outline-primary-custom:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
}

/* ── card ── */
.card-order {
    background: #ffffff;
    border: none;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04), 0 1px 4px rgba(0, 0, 0, 0.02);
    overflow: hidden;
}

.card-order .card-body {
    padding: 0;
}

/* ── TABLE WRAPPER – FIXED SCROLL ── */
.table-responsive-custom {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;  /* smooth scroll on iOS */
    padding: 0.25rem;
}

/* If you prefer to use Bootstrap's .table-responsive, you can remove this class,
   but we keep both for safety. The wrapper now has overflow-x:auto. */

/* ── table ── */
.table-order {
    margin: 0;
    font-size: 0.875rem;
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    min-width: 1100px;   /* forces horizontal scroll when viewport is smaller */
}

.table-order thead th {
    background: #f8fafc;
    color: #475569;
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    padding: 0.9rem 1rem;
    border-bottom: 1px solid #e9edf2;
    white-space: nowrap;
    position: sticky;
    top: 0;
    z-index: 5;
}

.table-order thead th i {
    margin-right: 0.35rem;
    font-size: 0.7rem;
    opacity: 0.6;
}

.table-order tbody td {
    padding: 0.85rem 1rem;
    vertical-align: middle;
    border-bottom: 1px solid #f1f4f9;
    background: #fff;
    transition: background 0.15s;
}

.table-order tbody tr:hover td {
    background: #fafcff;
}

.table-order tbody tr:last-child td {
    border-bottom: none;
}

/* ── customer cell ── */
.customer-cell {
    display: flex;
    flex-direction: column;
}

.customer-cell .name {
    font-weight: 600;
    color: #0f172a;
    font-size: 0.875rem;
}

.customer-cell .email {
    font-size: 0.75rem;
    color: #94a3b8;
    margin-top: 0.1rem;
}

/* ── badges ── */
.badge-status {
    font-weight: 500;
    font-size: 0.7rem;
    padding: 0.35rem 0.85rem;
    border-radius: 40px;
    letter-spacing: 0.01em;
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    white-space: nowrap;
}

.badge-status.bg-primary-soft {
    background: #dbeafe;
    color: #1d4ed8;
}

.badge-status.bg-success-soft {
    background: #dcfce7;
    color: #15803d;
}

.badge-status.bg-danger-soft {
    background: #fee2e2;
    color: #b91c1c;
}

.badge-status.bg-warning-soft {
    background: #fef3c7;
    color: #b45309;
}

.badge-status.bg-info-soft {
    background: #e0f2fe;
    color: #0369a1;
}

.badge-status.bg-secondary-soft {
    background: #f1f5f9;
    color: #475569;
}

.badge-status .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    display: inline-block;
}

.badge-status .dot.green {
    background: #22c55e;
}
.badge-status .dot.red {
    background: #ef4444;
}
.badge-status .dot.blue {
    background: #3b82f6;
}
.badge-status .dot.amber {
    background: #f59e0b;
}
.badge-status .dot.gray {
    background: #94a3b8;
}

/* ── form selects inside table ── */
.form-select-sm-custom {
    font-size: 0.75rem;
    padding: 0.3rem 1.8rem 0.3rem 0.75rem;
    border-radius: 40px;
    border: 1px solid #e2e8f0;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23475569' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.7rem center;
    background-size: 10px;
    appearance: none;
    cursor: pointer;
    transition: all 0.2s;
    min-width: 130px;
    color: #1e293b;
    font-weight: 500;
}

.form-select-sm-custom:hover {
    border-color: #b9c7da;
}

.form-select-sm-custom:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
}

.form-select-sm-custom option {
    font-weight: 400;
}

/* ── address cell ── */
.address-cell {
    max-width: 200px;
    font-size: 0.8rem;
    color: #334155;
    line-height: 1.4;
    word-break: break-word;
}

/* ── action button ── */
.btn-view {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.3rem 1rem;
    border-radius: 40px;
    font-size: 0.75rem;
    font-weight: 600;
    background: #0f172a;
    color: #fff;
    border: none;
    transition: all 0.2s;
    text-decoration: none;
}

.btn-view:hover {
    background: #1e293b;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.2);
}

.btn-view i {
    font-size: 0.8rem;
}

/* ── empty state ── */
.empty-state {
    text-align: center;
    padding: 4rem 1rem;
}

.empty-state i {
    font-size: 3.5rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.empty-state h5 {
    font-weight: 600;
    color: #1e293b;
}

.empty-state p {
    color: #94a3b8;
    max-width: 360px;
    margin: 0.25rem auto 0;
}

/* ── responsive tweaks ── */
@media (max-width: 768px) {
    body {
        padding: 1rem 0.5rem;
    }

    .page-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }

    .page-header h3 {
        font-size: 1.4rem;
    }

    .header-actions .search-box {
        width: 100%;
    }

    .header-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .table-order thead th,
    .table-order tbody td {
        padding: 0.65rem 0.75rem;
        font-size: 0.8rem;
    }

    .form-select-sm-custom {
        min-width: 100px;
        font-size: 0.7rem;
        padding: 0.25rem 1.6rem 0.25rem 0.6rem;
    }

    .badge-status {
        font-size: 0.65rem;
        padding: 0.25rem 0.6rem;
    }
}

@media (max-width: 480px) {
    .table-order {
        min-width: 900px;  /* still triggers scroll */
    }
}

/* ── scrollbar styling (optional) ── */
.table-responsive-custom::-webkit-scrollbar {
    height: 6px;
}

.table-responsive-custom::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.table-responsive-custom::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.table-responsive-custom::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* ── subtle row animation ── */
.table-order tbody tr {
    animation: fadeSlide 0.25s ease forwards;
    opacity: 0;
}

@keyframes fadeSlide {
    0% {
        opacity: 0;
        transform: translateY(6px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.table-order tbody tr:nth-child(1) {
    animation-delay: 0.01s;
}
.table-order tbody tr:nth-child(2) {
    animation-delay: 0.03s;
}
.table-order tbody tr:nth-child(3) {
    animation-delay: 0.05s;
}
.table-order tbody tr:nth-child(4) {
    animation-delay: 0.07s;
}
.table-order tbody tr:nth-child(5) {
    animation-delay: 0.09s;
}
.table-order tbody tr:nth-child(6) {
    animation-delay: 0.11s;
}
.table-order tbody tr:nth-child(7) {
    animation-delay: 0.13s;
}
.table-order tbody tr:nth-child(8) {
    animation-delay: 0.15s;
}
.table-order tbody tr:nth-child(9) {
    animation-delay: 0.17s;
}
.table-order tbody tr:nth-child(10) {
    animation-delay: 0.19s;
}
.btn-view.btn-danger {
    background: #ef4444;
}
.btn-view.btn-danger:hover {
    background: #dc2626;
}

/* ── Edit & Delete button variants ── */
.btn-view.btn-edit {
    background: #3b82f6;
}
.btn-view.btn-edit:hover {
    background: #2563eb;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.35);
}

.btn-view.btn-delete {
    background: #ef4444;
}
.btn-view.btn-delete:hover {
    background: #dc2626;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.35);
}

/* ── Product image ── */
.product-img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 12px;
    background: #f1f5f9;
    border: 2px solid #f1f5f9;
    transition: all 0.3s ease;
}
.product-img:hover {
    border-color: #3b82f6;
    transform: scale(1.05);
}

/* ── Product name ── */
.product-name {
    font-weight: 600;
    color: #0f172a;
    transition: color 0.2s;
}
.product-name:hover {
    color: #3b82f6;
}

/* ── Stock badge ── */
.badge-stock {
    font-weight: 500;
    font-size: 0.7rem;
    padding: 0.35rem 0.85rem;
    border-radius: 40px;
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    white-space: nowrap;
}
.badge-stock.in-stock {
    background: #dcfce7;
    color: #15803d;
}
.badge-stock.low-stock {
    background: #fef3c7;
    color: #b45309;
}
.badge-stock.out-of-stock {
    background: #fee2e2;
    color: #b91c1c;
}
.badge-stock .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    display: inline-block;
}
.badge-stock .dot.green {
    background: #22c55e;
}
.badge-stock .dot.amber {
    background: #f59e0b;
}
.badge-stock .dot.red {
    background: #ef4444;
}

/* ── Form Styles ── */
.form-group-modern {
    margin-bottom: 1.5rem;
}

.form-label-modern {
    display: block;
    font-weight: 600;
    font-size: 0.85rem;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.form-label-modern .text-danger {
    color: #ef4444;
}

.form-control-modern {
    width: 100%;
    padding: 0.7rem 1rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    background: #f8fafc;
    color: #1e293b;
}

.form-control-modern:focus {
    outline: none;
    border-color: #3b82f6;
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.form-control-modern::placeholder {
    color: #94a3b8;
}

/* ── Input Group ── */
.input-group-modern {
    display: flex;
    align-items: center;
}

.input-group-text-modern {
    padding: 0.7rem 1rem;
    background: #f1f5f9;
    border: 2px solid #e2e8f0;
    border-right: none;
    border-radius: 12px 0 0 12px;
    font-weight: 600;
    color: #475569;
}

.input-group-modern .form-control-modern {
    border-radius: 0 12px 12px 0;
}

/* ── Image Upload ── */
.image-upload-wrapper {
    position: relative;
    border: 2px dashed #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    background: #fafcff;
    cursor: pointer;
}

.image-upload-wrapper:hover {
    border-color: #3b82f6;
    background: #f0f7ff;
}

.image-upload-preview {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    pointer-events: none;
}

.image-upload-preview img {
    max-width: 150px;
    max-height: 150px;
    border-radius: 12px;
    object-fit: cover;
}

/* ── Submit Button ── */
.btn-submit-modern {
    padding: 0.7rem 2rem;
    background: #0f172a;
    color: #fff;
    border: none;
    border-radius: 40px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-submit-modern:hover {
    background: #1e293b;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.2);
}

.btn-submit-modern:active {
    transform: translateY(0);
}

/* ─── Alert styling ─── */
.alert-success-modern {
    border-radius: 16px;
    border-left: 4px solid #22c55e;
    background: #f0fdf4;
    color: #166534;
    padding: 1rem 1.5rem;
}

/* ─── Responsive ─── */
@media (max-width: 992px) {
    .card-body {
        padding: 1.5rem !important;
    }
}

@media (max-width: 576px) {
    .card-body {
        padding: 1rem !important;
    }

    .btn-submit-modern {
        width: 100%;
        justify-content: center;
    }

    .d-flex.justify-content-end {
        flex-direction: column;
        gap: 0.75rem !important;
    }

    .d-flex.justify-content-end a {
        width: 100%;
        text-align: center;
    }

    .image-upload-wrapper {
        padding: 1rem;
    }


}

/* CART */
/* ─── Shopping Cart Styles ─── */
.cart-section {
    padding: 3rem 0;
    background: #f8fafc;
    min-height: 70vh;
}

.cart-header {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.cart-header h2 {
    font-weight: 700;
    font-size: 2rem;
    color: #0f172a;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.cart-header h2 i {
    color: #3b82f6;
}

.cart-item {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
    padding: 1.25rem 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.25s ease;
    border: 1px solid #f1f5f9;
}

.cart-item:hover {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    border-color: #e2e8f0;
}

.cart-item .row {
    align-items: center;
}

.cart-item .product-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 12px;
    background: #f1f5f9;
}

.cart-item .product-name {
    font-weight: 600;
    color: #0f172a;
    font-size: 1.05rem;
    margin: 0;
}

.cart-item .product-price {
    font-weight: 600;
    color: #1e293b;
}

.cart-item .quantity-control {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.cart-item .quantity-control .qty-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    background: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #475569;
    transition: all 0.2s;
    cursor: pointer;
    text-decoration: none;
}

.cart-item .quantity-control .qty-btn:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
}

.cart-item .quantity-control .qty-input {
    width: 50px;
    text-align: center;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.3rem 0;
    font-weight: 500;
}

.cart-item .item-total {
    font-weight: 700;
    color: #0f172a;
    font-size: 1.1rem;
}

.cart-item .btn-remove {
    background: #fee2e2;
    border: none;
    color: #b91c1c;
    border-radius: 40px;
    padding: 0.3rem 0.9rem;
    font-size: 0.8rem;
    transition: all 0.2s;
}

.cart-item .btn-remove:hover {
    background: #fecaca;
    color: #7f1d1d;
}

/* ─── Cart Summary ─── */
.cart-summary {
    background: #ffffff;
    border-radius: 16px;
    padding: 1.5rem 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    border: 1px solid #f1f5f9;
    margin-top: 2rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}

.cart-summary .total-label {
    font-size: 1.1rem;
    color: #475569;
}

.cart-summary .total-amount {
    font-size: 2rem;
    font-weight: 700;
    color: #0f172a;
}

.btn-checkout {
    background: #0f172a;
    color: #fff;
    border: none;
    padding: 0.8rem 2.5rem;
    border-radius: 40px;
    font-weight: 600;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-checkout:hover {
    background: #1e293b;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.2);
    color: #fff;
}

.btn-checkout i {
    font-size: 1.1rem;
}

/* ─── Empty Cart ─── */
.empty-cart {
    text-align: center;
    padding: 4rem 1rem;
}

.empty-cart i {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 1.5rem;
}

.empty-cart h4 {
    color: #1e293b;
    font-weight: 600;
}

.empty-cart p {
    color: #94a3b8;
}

/* ─── Responsive ─── */
@media (max-width: 768px) {
    .cart-item {
        padding: 1rem;
    }

    .cart-item .product-image {
        width: 60px;
        height: 60px;
    }

    .cart-item .product-name {
        font-size: 0.95rem;
    }

    .cart-summary {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .btn-checkout {
        width: 100%;
        justify-content: center;
    }

    .cart-item .row > div {
        margin-bottom: 0.5rem;
    }
}

/* @media (max-width: 576px) {
    .cart-header h2 {
        font-size: 1.5rem;
    }

    .cart-item .quantity-control .qty-input {
        width: 40px;
    }

    .cart-summary .total-amount {
        font-size: 1.5rem;
    }

    .cart-section {
        padding: 20px 0;
    }
    
    .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .cart-item {
        background: #fff;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .product-image {
        border-radius: 10px;
        height: 80px;
        object-fit: cover;
    }
    
    .product-name {
        font-size: 16px;
        margin-bottom: 5px;
    }
    
    .product-price {
        font-weight: 600;
        color: #333;
    }
    
    
    .quantity-control {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .qty-btn {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        background: #f1f1f1;
        text-decoration: none;
        font-size: 18px;
    }
    
    .qty-input {
        width: 40px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 6px;
    }
    
  
    .cart-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 12px;
    }
    
   
    .empty-cart {
        text-align: center;
        padding: 50px 20px;
    }
    
   
    @media (max-width: 768px) {
    
        .cart-header h2 {
            font-size: 18px;
        }
    
        .cart-item .row {
            flex-direction: column;
            text-align: center;
        }
    
        .product-image {
            height: 120px;
            margin-bottom: 10px;
        }
    
        .quantity-control {
            justify-content: center;
        }
    
        .cart-summary {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }
    
        .btn-remove {
            display: block;
            margin-top: 10px;
        }
    }
} */
@media (max-width: 576px) {

    /* .cart-section {
        padding: 10px 0;
    } */

    /* Shopping Cart heading small */
    .cart-header h2 {
        font-size: 1.1rem;
        /* gap: 0.4rem; */
        margin: 0;
    }

    .cart-header h2 i {
        font-size: 1rem;
    }

    /* Items badge */
    .cart-header h2 .badge {
        font-size: 0.65rem !important;
        padding: 0.25rem 0.55rem !important;
        margin-left: 1px !important;
    }

    /* Continue Shopping */
    .cart-header .btn-outline-primary-custom {
        font-size: 0.7rem;
        padding: 6px 10px;
    }

    /* Cart item */
    .cart-item {
        padding: 12px;
        margin-bottom: 12px;
        border-radius: 10px;
    }

    /* Product image */
    .cart-item .product-image {
        width: 70px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* Product name */
    .cart-item .product-name {
        font-size: 0.85rem;
        line-height: 1.3;
    }

    .cart-item small {
        font-size: 0.68rem;
    }

    /* Price */
    .cart-item .product-price {
        font-size: 0.8rem;
    }

    /* Quantity */
    .cart-item .quantity-control {
        gap: 4px;
    }

    .cart-item .quantity-control .qty-btn {
        width: 28px;
        height: 28px;
        font-size: 14px;
    }

    .cart-item .quantity-control .qty-input {
        width: 38px;
        height: 28px;
        font-size: 12px;
    }

    /* Subtotal */
    .cart-item .item-total {
        font-size: 0.85rem;
    }

    /* Remove */
    .cart-item .btn-remove {
        font-size: 0.68rem;
        padding: 5px 8px;
    }

    /* Summary */
    .cart-summary {
        padding: 15px;
        gap: 12px;
    }

    .cart-summary .total-label {
        font-size: 0.8rem;
    }

    .cart-summary .total-amount {
        font-size: 1.3rem;
    }

    .btn-checkout {
        width: 100%;
        justify-content: center;
        font-size: 0.8rem;
        padding: 9px 15px;
    }
}


}

    </style>

</head>

<body>

{{-- NAVBAR --}}
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
      <symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor"
          d="M11 3.5h1M4.5.5h6a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4h-6a4 4 0 0 1-4-4v-6a4 4 0 0 1 4-4Zm3 10a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor"
          d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="twitter" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="pinterest" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor"
          d="m4.5 13.5l3-7m-3.236 3a2.989 2.989 0 0 1-.764-2V7A3.5 3.5 0 0 1 7 3.5h1A3.5 3.5 0 0 1 11.5 7v.5a3 3 0 0 1-3 3a2.081 2.081 0 0 1-1.974-1.423L6.5 9m1 5.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="youtube" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="m1.61 12.738l-.104.489l.105-.489Zm11.78 0l.104.489l-.105-.489Zm0-10.476l.104-.489l-.105.489Zm-11.78 0l.106.489l-.105-.489ZM6.5 5.5l.277-.416A.5.5 0 0 0 6 5.5h.5Zm0 4H6a.5.5 0 0 0 .777.416L6.5 9.5Zm3-2l.277.416a.5.5 0 0 0 0-.832L9.5 7.5ZM0 3.636v7.728h1V3.636H0Zm15 7.728V3.636h-1v7.728h1ZM1.506 13.227c3.951.847 8.037.847 11.988 0l-.21-.978a27.605 27.605 0 0 1-11.568 0l-.21.978ZM13.494 1.773a28.606 28.606 0 0 0-11.988 0l.21.978a27.607 27.607 0 0 1 11.568 0l.21-.978ZM15 3.636c0-.898-.628-1.675-1.506-1.863l-.21.978c.418.09.716.458.716.885h1Zm-1 7.728a.905.905 0 0 1-.716.885l.21.978A1.905 1.905 0 0 0 15 11.364h-1Zm-14 0c0 .898.628 1.675 1.506 1.863l.21-.978A.905.905 0 0 1 1 11.364H0Zm1-7.728c0-.427.298-.796.716-.885l-.21-.978A1.905 1.905 0 0 0 0 3.636h1ZM6 5.5v4h1v-4H6Zm.777 4.416l3-2l-.554-.832l-3 2l.554.832Zm3-2.832l-3-2l-.554.832l3 2l.554-.832Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="dribble" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          d="M4.839 1.024c3.346 4.041 5.096 7.922 5.704 12.782M.533 6.82c5.985-.138 9.402-1.083 11.97-4.216M2.7 12.594c3.221-4.902 7.171-5.65 11.755-4.293M14.5 7.5a7 7 0 1 0-14 0a7 7 0 0 0 14 0Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <rect width="20" height="18" x="2" y="4" rx="4" />
          <path d="M8 2v4m8-4v4M2 10h20" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="shopping-bag" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path
            d="M3.977 9.84A2 2 0 0 1 5.971 8h12.058a2 2 0 0 1 1.994 1.84l.803 10A2 2 0 0 1 18.833 22H5.167a2 2 0 0 1-1.993-2.16l.803-10Z" />
          <path d="M16 11V6a4 4 0 0 0-4-4v0a4 4 0 0 0-4 4v5" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="gift" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <rect width="18" height="14" x="3" y="8" rx="2" />
          <path d="M12 5a3 3 0 1 0-3 3m6 0a3 3 0 1 0-3-3m0 0v17m9-7H3" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-cycle" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path
            d="M22 12c0 6-4.39 10-9.806 10C7.792 22 4.24 19.665 3 16m-1-4C2 6 6.39 2 11.806 2C16.209 2 19.76 4.335 21 8" />
          <path d="m7 17l-4-1l-1 4M17 7l4 1l1-4" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-left" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M17 11H9.41l3.3-3.29a1 1 0 1 0-1.42-1.42l-5 5a1 1 0 0 0-.21.33a1 1 0 0 0 0 .76a1 1 0 0 0 .21.33l5 5a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42L9.41 13H17a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="play" viewBox="0 0 24 24">
        <g fill="none" fill-rule="evenodd">
          <path
            d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
          <path fill="currentColor"
            d="M5.669 4.76a1.469 1.469 0 0 1 2.04-1.177c1.062.454 3.442 1.533 6.462 3.276c3.021 1.744 5.146 3.267 6.069 3.958c.788.591.79 1.763.001 2.356c-.914.687-3.013 2.19-6.07 3.956c-3.06 1.766-5.412 2.832-6.464 3.28c-.906.387-1.92-.2-2.038-1.177c-.138-1.142-.396-3.735-.396-7.237c0-3.5.257-6.092.396-7.235Z" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
    </defs>
  </svg>
  <div class="container mt-3">
    <a href="{{ url()->previous() }}" class="back-btn">
        <i class="bi bi-arrow-left"></i> Back
    </a>
  </div>
<nav >

    @include('frontend.partials.navbar')

</nav>

@auth

        @if(Auth::user()->role == 'admin')

            @include('admin.layouts.sidebar')

        @endif

    @endauth

@yield('content')


@include('frontend.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/SmoothScroll.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>
<script>
  document.getElementById('menuBtn').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('active');
  });
  </script>
</body>
</html>