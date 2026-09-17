@extends('frontend.layouts.app')

@section('content')

<style>

/* =========================================================
   VELOURA — PREMIUM ADMIN DASHBOARD
========================================================= */

.admin-dashboard {
    min-height: calc(100vh - 90px);
    background: #f8f5f2;
    /* padding: 28px 28px 35px; */
    color: #3f2b25;
}

.admin-dashboard * {
    box-sizing: border-box;
}

.admin-dashboard .dashboard-container {
    max-width: 1450px;
    /* margin: 0 auto; */
}


/* =========================================================
   WELCOME BANNER
========================================================= */

.veloura-welcome {
    position: relative;
    min-height: 150px;
    border-radius: 18px;
    overflow: hidden;
    /* margin-bottom: 20px; */

    background:
        linear-gradient(
            90deg,
            #f4e2d7 0%,
            #f8e9e1 45%,
            #ead2c5 100%
        );

    border: 1px solid #eadbd3;
}

.veloura-welcome::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    right: 250px;
    top: -210px;
    border-radius: 50%;
    background: rgba(255,255,255,.28);
}

.veloura-welcome-content {
    position: relative;
    z-index: 2;
    padding: 24px 30px;
}

.veloura-welcome-small {
    margin: 0 0 2px;
    color: #744d40;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.veloura-welcome-title {
    margin: 0;
    color: #33221d;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 36px;
    line-height: 1.1;
    font-weight: 500;
}

.veloura-welcome-title span {
    color: #b76e79;
    font-size: 34px;
}

.veloura-welcome-text {
    margin: 7px 0 0;
    color: #6f625d;
    font-size: 14px;
}

.veloura-welcome-brand {
    position: absolute;
    right: 270px;
    top: 27px;
    text-align: center;
    z-index: 2;
}

.veloura-welcome-brand .brand-symbol {
    font-size: 27px;
    line-height: 1;
    color: #5b372d;
}

.veloura-welcome-brand h4 {
    margin: 4px 0 0;
    color: #3f2821;
    font-family: Georgia, serif;
    font-size: 24px;
    letter-spacing: 2px;
    font-weight: 500;
}

.veloura-welcome-brand small {
    color: #765b51;
    font-size: 8px;
    letter-spacing: 2px;
}

.veloura-welcome-side {
    position: absolute;
    right: 0;
    top: 0;
    width: 235px;
    height: 100%;
    background: linear-gradient(
        135deg,
        rgba(255,255,255,.08),
        rgba(183,110,121,.14)
    );
    display: flex;
    align-items: center;
    justify-content: center;
}

.veloura-welcome-side-text {
    color: #65443a;
    font-family: Georgia, serif;
    font-style: italic;
    font-size: 14px;
    line-height: 1.45;
}

.veloura-welcome-side-text::after {
    content: "";
    display: block;
    width: 32px;
    height: 1px;
    margin-top: 8px;
    background: #a67a6d;
}


/* =========================================================
   STAT CARDS
========================================================= */

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 20px;
}

.dashboard-stat {
    position: relative;
    min-height: 124px;
    padding: 18px;
    background: #fff;
    border: 1px solid #eadfd9;
    border-radius: 14px;
    overflow: hidden;
    transition: .25s ease;
}

.dashboard-stat:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(75,52,44,.08);
}

.dashboard-stat::after {
    content: "";
    position: absolute;
    width: 75px;
    height: 75px;
    right: -30px;
    bottom: -35px;
    border-radius: 50%;
    background: #f8eeeb;
}

.stat-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #f7e8e7;
    color: #9c5965;
    font-size: 19px;
    margin-bottom: 11px;
}

.stat-label {
    color: #77706d;
    font-size: 12px;
    margin-bottom: 4px;
}

.stat-value {
    color: #33231e;
    font-size: 23px;
    line-height: 1.2;
    font-weight: 700;
}

.stat-growth {
    margin-top: 7px;
    color: #159447;
    font-size: 11px;
}

.stat-growth i {
    margin-right: 2px;
}

.stat-products .stat-icon {
    background: #f8e8e6;
    color: #a45d66;
}

.stat-customers .stat-icon {
    background: #f6e6e8;
    color: #9b5966;
}

.stat-orders .stat-icon {
    background: #f4e9e1;
    color: #8a5d4d;
}

.stat-revenue .stat-icon {
    background: #eee9dc;
    color: #8b7250;
}


/* =========================================================
   MAIN GRID
========================================================= */

.dashboard-main-grid {
    display: grid;
    grid-template-columns: 1.08fr .92fr;
    gap: 14px;
    margin-bottom: 14px;
}


/* =========================================================
   COMMON CARD
========================================================= */

.dashboard-card {
    background: #fff;
    border: 1px solid #eadfd9;
    border-radius: 14px;
    overflow: hidden;
}

.dashboard-card-header {
    height: 64px;
    padding: 0 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #eee7e3;
}

.dashboard-card-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.dashboard-card-title-icon {
    width: 33px;
    height: 33px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8e9e7;
    color: #925b55;
    font-size: 16px;
}

.dashboard-card-title h5 {
    margin: 0;
    color: #3d2923;
    font-size: 16px;
    font-weight: 650;
}

.dashboard-view-all {
    color: #b76e79;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
}

.dashboard-view-all:hover {
    color: #4b342c;
}


/* =========================================================
   SALES OVERVIEW
========================================================= */

.sales-body {
    padding: 15px 18px 16px;
}

.sales-top {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 8px;
}

.sales-filter {
    border: 1px solid #e7ddd8;
    background: #fff;
    color: #4d403b;
    border-radius: 8px;
    padding: 7px 10px;
    font-size: 11px;
}

.sales-chart {
    width: 100%;
    height: 205px;
    position: relative;
}

.sales-chart svg {
    width: 100%;
    height: 100%;
    overflow: visible;
}

.sales-grid-line {
    stroke: #eee9e5;
    stroke-width: 1;
}

.sales-area {
    fill: rgba(183,110,121,.13);
}

.sales-line {
    fill: none;
    stroke: #b76e79;
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.sales-point {
    fill: #b76e79;
    stroke: #fff;
    stroke-width: 2;
}

.sales-label {
    fill: #77716d;
    font-size: 9px;
}

.sales-y-label {
    fill: #77716d;
    font-size: 9px;
}


/* =========================================================
   RECENT ORDERS
========================================================= */

.recent-orders-body {
    overflow-x: auto;
}

.dashboard-orders-table {
    width: 100%;
    min-width: 570px;
    border-collapse: collapse;
}

.dashboard-orders-table th {
    padding: 12px 14px;
    background: #fcf9f7;
    color: #81756f;
    font-size: 10px;
    font-weight: 600;
    text-align: left;
    white-space: nowrap;
}

.dashboard-orders-table td {
    padding: 13px 14px;
    border-top: 1px solid #f1eae6;
    color: #574943;
    font-size: 11px;
    white-space: nowrap;
}

.dashboard-orders-table tbody tr {
    transition: .2s ease;
}

.dashboard-orders-table tbody tr:hover {
    background: #fdf9f7;
}

.dashboard-order-id {
    color: #3d2b25;
    font-weight: 650;
}

.dashboard-customer {
    color: #51423d;
    font-weight: 500;
}

.dashboard-amount {
    color: #3f2b25;
    font-weight: 650;
}


/* =========================================================
   ORDER STATUS
========================================================= */

.dashboard-status {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
}

.dashboard-status::before {
    content: "";
    width: 5px;
    height: 5px;
    border-radius: 50%;
    margin-right: 5px;
}

.status-delivered {
    background: #e4f5e9;
    color: #168345;
}

.status-delivered::before {
    background: #1d9b4d;
}

.status-pending {
    background: #fff0d1;
    color: #b57909;
}

.status-pending::before {
    background: #e6a21a;
}

.status-processing {
    background: #e4efff;
    color: #2169c7;
}

.status-processing::before {
    background: #3c82df;
}

.status-shipped {
    background: #eee5fa;
    color: #7542ae;
}

.status-shipped::before {
    background: #8b55c1;
}

.status-default {
    background: #f3ece9;
    color: #795d54;
}

.status-default::before {
    background: #b76e79;
}


/* =========================================================
   BOTTOM GRID
========================================================= */

.dashboard-bottom-grid {
    display: grid;
    grid-template-columns: 1.25fr .75fr;
    gap: 14px;
}


/* =========================================================
   PRODUCTS
========================================================= */

.products-body {
    padding: 14px;
}

.dashboard-product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}

.dashboard-product {
    border: 1px solid #eee4df;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    transition: .25s ease;
}

.dashboard-product:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 18px rgba(75,52,44,.07);
}

.dashboard-product-image {
    width: 100%;
    height: 105px;
    object-fit: cover;
    display: block;
    background: #f6eee8;
}

.dashboard-product-content {
    padding: 8px 9px 10px;
}

.dashboard-product-name {
    color: #3d2c26;
    font-size: 11px;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 4px;
}

.dashboard-product-price {
    color: #4b342c;
    font-size: 12px;
    font-weight: 700;
}

.dashboard-product-stock {
    color: #817873;
    font-size: 9px;
    margin-top: 3px;
}


/* =========================================================
   QUICK ACTIONS
========================================================= */

.quick-actions-body {
    padding: 14px;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.quick-action {
    min-height: 68px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border-radius: 11px;
    text-decoration: none;
    background: linear-gradient(135deg,#fbefed,#f8f2ed);
    border: 1px solid #f0e4df;
    color: #3f2b25;
    transition: .25s ease;
}

.quick-action:hover {
    transform: translateY(-2px);
    background: #f6e8e6;
    color: #3f2b25;
}

.quick-action-icon {
    flex: 0 0 38px;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255,255,255,.7);
    color: #895247;
    font-size: 17px;
}

.quick-action-text {
    font-size: 11px;
    font-weight: 550;
}

.quick-action-arrow {
    margin-left: auto;
    color: #a8786d;
    font-size: 13px;
}


/* =========================================================
   FOOTER
========================================================= */

.dashboard-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 18px;
    color: #857a75;
    font-size: 10px;
}

.dashboard-footer-brand {
    color: #4b342c;
    font-family: Georgia, serif;
    font-size: 12px;
    letter-spacing: 1px;
}

.dashboard-footer-divider {
    margin: 0 8px;
    color: #c5b7b0;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1100px) {

    .admin-dashboard {
        /* padding: 22px 18px 30px; */
    }

    .dashboard-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .dashboard-main-grid,
    .dashboard-bottom-grid {
        grid-template-columns: 1fr;
    }

    .veloura-welcome-brand {
        right: 220px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .admin-dashboard {
        padding: 15px 10px 28px;
    }

    .dashboard-container {
        width: 100%;
    }

    .veloura-welcome {
        display:none;
    }

    .veloura-welcome-content {
        padding: 20px 18px;
    }

    .veloura-welcome-small {
        font-size: 9px;
        letter-spacing: 1.4px;
    }

    .veloura-welcome-title {
        font-size: 27px;
    }

    .veloura-welcome-title span {
        font-size: 25px;
    }

    .veloura-welcome-text {
        font-size: 10px;
        max-width: 190px;
    }

    .veloura-welcome-brand {
        display: none;
    }

    .veloura-welcome-side {
        width: 100px;
        opacity: .7;
    }

    .veloura-welcome-side-text {
        font-size: 10px;
    }

    .dashboard-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 9px;
        margin-bottom: 14px;
    }

    .dashboard-stat {
        min-height: 112px;
        padding: 14px;
        border-radius: 12px;
    }

    .stat-icon {
        width: 37px;
        height: 37px;
        font-size: 16px;
        margin-bottom: 9px;
    }

    .stat-label {
        font-size: 10px;
    }

    .stat-value {
        font-size: 19px;
    }

    .stat-growth {
        font-size: 9px;
    }

    .dashboard-card {
        border-radius: 12px;
    }

    .dashboard-card-header {
        height: 55px;
        padding: 0 13px;
    }

    .dashboard-card-title {
        gap: 7px;
    }

    .dashboard-card-title-icon {
        width: 29px;
        height: 29px;
        font-size: 13px;
    }

    .dashboard-card-title h5 {
        font-size: 13px;
    }

    .dashboard-view-all {
        font-size: 10px;
    }

    .sales-body {
        padding: 10px 10px 12px;
    }

    .sales-chart {
        height: 175px;
    }

    .dashboard-main-grid,
    .dashboard-bottom-grid {
        gap: 12px;
        margin-bottom: 12px;
    }

    .dashboard-product-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }

    .dashboard-product-image {
        height: 125px;
    }

    .dashboard-product-content {
        padding: 8px;
    }

    .quick-actions-grid {
        gap: 8px;
    }

    .quick-action {
        min-height: 62px;
        padding: 8px;
    }

    .quick-action-icon {
        width: 34px;
        height: 34px;
        flex-basis: 34px;
        font-size: 15px;
    }

    .quick-action-text {
        font-size: 10px;
    }

    .dashboard-footer {
        flex-direction: column;
        gap: 7px;
        text-align: center;
    }
}


</style>


@php

    /*
    |--------------------------------------------------------------------------
    | Recent Orders
    |--------------------------------------------------------------------------
    */

    $recentOrders = \App\Models\Order::latest()
        ->take(5)
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Dashboard Products
    |--------------------------------------------------------------------------
    */

    $dashboardProducts = \App\Models\Product::latest()
        ->take(4)
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Sales Data — Last 7 Days
    |--------------------------------------------------------------------------
    */

    $salesDays = collect();

    for ($i = 6; $i >= 0; $i--) {

        $date = now()->subDays($i);

        $amount = \App\Models\Order::whereDate(
            'created_at',
            $date->toDateString()
        )->sum('total_amount');

        $salesDays->push([
            'label' => $date->format('M d'),
            'amount' => (float) $amount
        ]);
    }

    $maxSales = max(
        $salesDays->max('amount') ?? 0,
        1
    );

@endphp


<div class="admin-dashboard">

    <div class="dashboard-container">


        {{-- =====================================================
             WELCOME BANNER
        ====================================================== --}}

        <div class="veloura-welcome">

            <div class="veloura-welcome-content">

                <div class="veloura-welcome-small">
                    Welcome Back,
                </div>

                <h1 class="veloura-welcome-title">
                    Admin <span>♡</span>
                </h1>

                <p class="veloura-welcome-text">
                    Here's what's happening with your store today.
                </p>

            </div>


            <div class="veloura-welcome-brand">

                <div class="brand-symbol">♢</div>

                <h4>VELOURA</h4>

                <small>TIMELESS ELEGANCE</small>

            </div>


            <div class="veloura-welcome-side">

                <div class="veloura-welcome-side-text">
                    Fashion<br>
                    Beauty<br>
                    Lifestyle
                </div>

            </div>

        </div>



        {{-- =====================================================
             STATISTICS
        ====================================================== --}}

        <div class="dashboard-stats">


            {{-- PRODUCTS --}}

            <div class="dashboard-stat stat-products">

                <div class="stat-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div class="stat-label">
                    Total Products
                </div>

                <div class="stat-value">
                    {{ $totalProducts }}
                </div>

                <div class="stat-growth">
                    <i class="bi bi-arrow-up"></i>
                    Store inventory
                </div>

            </div>


            {{-- CUSTOMERS --}}

            <div class="dashboard-stat stat-customers">

                <div class="stat-icon">
                    <i class="bi bi-people"></i>
                </div>

                <div class="stat-label">
                    Total Customers
                </div>

                <div class="stat-value">
                    {{ $totalUsers }}
                </div>

                <div class="stat-growth">
                    <i class="bi bi-person-check"></i>
                    Registered users
                </div>

            </div>


            {{-- ORDERS --}}

            <div class="dashboard-stat stat-orders">

                <div class="stat-icon">
                    <i class="bi bi-bag-check"></i>
                </div>

                <div class="stat-label">
                    Total Orders
                </div>

                <div class="stat-value">
                    {{ $totalOrders }}
                </div>

                <div class="stat-growth">
                    <i class="bi bi-arrow-up"></i>
                    All orders
                </div>

            </div>


            {{-- REVENUE --}}

            <div class="dashboard-stat stat-revenue">

                <div class="stat-icon">
                    <i class="bi bi-currency-rupee"></i>
                </div>

                <div class="stat-label">
                    Total Revenue
                </div>

                <div class="stat-value">
                    ₹{{ number_format($totalRevenue, 0) }}
                </div>

                <div class="stat-growth">
                    <i class="bi bi-graph-up"></i>
                    Store revenue
                </div>

            </div>

        </div>



        {{-- =====================================================
             SALES + RECENT ORDERS
        ====================================================== --}}

        <div class="dashboard-main-grid">


            {{-- SALES OVERVIEW --}}

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="dashboard-card-title">

                        <div class="dashboard-card-title-icon">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>

                        <h5>
                            Sales Overview
                        </h5>

                    </div>

                    <select class="sales-filter">
                        <option>Last 7 Days</option>
                    </select>

                </div>


                <div class="sales-body">

                    <div class="sales-chart">

                        @php

                            $chartWidth = 700;
                            $chartHeight = 180;
                            $chartTop = 10;
                            $chartBottom = 25;

                            $count = $salesDays->count();

                            $points = [];

                            foreach ($salesDays as $index => $day) {

                                $x = $count > 1
                                    ? ($index * ($chartWidth / ($count - 1)))
                                    : 0;

                                $y = $chartTop +
                                    (($maxSales - $day['amount']) / $maxSales)
                                    * ($chartHeight - $chartTop - $chartBottom);

                                $points[] = round($x, 2) . ',' . round($y, 2);
                            }

                            $pointString = implode(' ', $points);

                            $areaPoints =
                                '0,' . $chartHeight . ' ' .
                                $pointString . ' ' .
                                $chartWidth . ',' . $chartHeight;

                        @endphp


                        <svg
                            viewBox="0 0 {{ $chartWidth }} {{ $chartHeight }}"
                            preserveAspectRatio="none"
                        >

                            {{-- GRID --}}

                            <line
                                x1="0"
                                y1="20"
                                x2="700"
                                y2="20"
                                class="sales-grid-line"
                            />

                            <line
                                x1="0"
                                y1="65"
                                x2="700"
                                y2="65"
                                class="sales-grid-line"
                            />

                            <line
                                x1="0"
                                y1="110"
                                x2="700"
                                y2="110"
                                class="sales-grid-line"
                            />

                            <line
                                x1="0"
                                y1="155"
                                x2="700"
                                y2="155"
                                class="sales-grid-line"
                            />


                            {{-- AREA --}}

                            <polygon
                                points="{{ $areaPoints }}"
                                class="sales-area"
                            />


                            {{-- LINE --}}

                            <polyline
                                points="{{ $pointString }}"
                                class="sales-line"
                            />


                            {{-- POINTS --}}

                            @foreach($salesDays as $index => $day)

                                @php

                                    $x = $count > 1
                                        ? ($index * ($chartWidth / ($count - 1)))
                                        : 0;

                                    $y = $chartTop +
                                        (($maxSales - $day['amount']) / $maxSales)
                                        * ($chartHeight - $chartTop - $chartBottom);

                                @endphp

                                <circle
                                    cx="{{ $x }}"
                                    cy="{{ $y }}"
                                    r="4"
                                    class="sales-point"
                                />

                                <text
                                    x="{{ $x }}"
                                    y="175"
                                    text-anchor="middle"
                                    class="sales-label"
                                >
                                    {{ $day['label'] }}
                                </text>

                            @endforeach

                        </svg>

                    </div>

                </div>

            </div>



            {{-- RECENT ORDERS --}}

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="dashboard-card-title">

                        <div class="dashboard-card-title-icon">
                            <i class="bi bi-receipt"></i>
                        </div>

                        <h5>
                            Recent Orders
                        </h5>

                    </div>

                    <a href="/admin/orders" class="dashboard-view-all">
                        View All →
                    </a>

                </div>


                <div class="recent-orders-body">

                    <table class="dashboard-orders-table">

                        <thead>

                            <tr>

                                <th>
                                    Order ID
                                </th>

                                <th>
                                    Customer
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($recentOrders as $order)

                                @php

                                    $status = strtolower(
                                        trim($order->status ?? '')
                                    );

                                    $statusClass = match($status) {

                                        'delivered' => 'status-delivered',

                                        'pending' => 'status-pending',

                                        'processing' => 'status-processing',

                                        'shipped' => 'status-shipped',

                                        default => 'status-default'

                                    };

                                @endphp


                                <tr>

                                    <td>

                                        <span class="dashboard-order-id">
                                            #ORD{{ $order->id }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="dashboard-customer">
                                            {{ $order->name }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="dashboard-amount">
                                            ₹{{ number_format($order->total_amount, 0) }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="dashboard-status {{ $statusClass }}">
                                            {{ ucfirst($order->status ?? 'Pending') }}
                                        </span>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="4"
                                        style="text-align:center;padding:35px;color:#999;"
                                    >

                                        <i class="bi bi-inbox"></i>

                                        <br>

                                        No orders found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>



        {{-- =====================================================
             PRODUCTS + QUICK ACTIONS
        ====================================================== --}}

        <div class="dashboard-bottom-grid">


            {{-- TOP PRODUCTS --}}

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="dashboard-card-title">

                        <div class="dashboard-card-title-icon">
                            <i class="bi bi-stars"></i>
                        </div>

                        <h5>
                            Products
                        </h5>

                    </div>

                    <a
                        href="/admin/products"
                        class="dashboard-view-all"
                    >
                        View All →
                    </a>

                </div>


                <div class="products-body">

                    <div class="dashboard-product-grid">

                        @forelse($dashboardProducts as $product)

                            @php

                                $images = str_replace(
                                    ['[',']','"'],
                                    '',
                                    $product->images ?? ''
                                );

                                $images = explode(',', $images);

                                $firstImage = trim(
                                    $images[0] ?? ''
                                );

                            @endphp


                            <div class="dashboard-product">


                                @if($firstImage)

                                    <img
                                        src="{{ asset('uploads/products/'.$firstImage) }}"
                                        class="dashboard-product-image"
                                        alt="{{ $product->name }}"
                                    >

                                @else

                                    <div
                                        class="dashboard-product-image d-flex align-items-center justify-content-center"
                                    >

                                        <i
                                            class="bi bi-image"
                                            style="font-size:30px;color:#c7aaa0;"
                                        ></i>

                                    </div>

                                @endif


                                <div class="dashboard-product-content">

                                    <div class="dashboard-product-name">
                                        {{ $product->name }}
                                    </div>

                                    <div class="dashboard-product-price">
                                        ₹{{ number_format($product->price, 0) }}
                                    </div>

                                    <div class="dashboard-product-stock">
                                        Product
                                    </div>

                                </div>

                            </div>

                        @empty

                            <div
                                style="
                                    grid-column:1/-1;
                                    text-align:center;
                                    padding:30px;
                                    color:#999;
                                "
                            >

                                No products found.

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>



            {{-- QUICK ACTIONS --}}

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="dashboard-card-title">

                        <div class="dashboard-card-title-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>

                        <h5>
                            Quick Actions
                        </h5>

                    </div>

                </div>


                <div class="quick-actions-body">

                    <div class="quick-actions-grid">


                        <a
                            href="/admin/products/create"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                <i class="bi bi-box-seam"></i>
                            </div>

                            <span class="quick-action-text">
                                Add Product
                            </span>

                            <i class="bi bi-chevron-right quick-action-arrow"></i>

                        </a>



                        <a
                            href="/admin/orders"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                <i class="bi bi-bag"></i>
                            </div>

                            <span class="quick-action-text">
                                Manage Orders
                            </span>

                            <i class="bi bi-chevron-right quick-action-arrow"></i>

                        </a>



                        <a
                            href="/banners"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                <i class="bi bi-image"></i>
                            </div>

                            <span class="quick-action-text">
                                Add Banner
                            </span>

                            <i class="bi bi-chevron-right quick-action-arrow"></i>

                        </a>



                        <a
                            href="/admin/users"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                <i class="bi bi-person"></i>
                            </div>

                            <span class="quick-action-text">
                                View Customers
                            </span>

                            <i class="bi bi-chevron-right quick-action-arrow"></i>

                        </a>


                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <div class="dashboard-footer">

            <div>

                <span class="dashboard-footer-brand">
                    VELOURA
                </span>

                <span class="dashboard-footer-divider">
                    |
                </span>

                Admin Dashboard

            </div>


            <div>
                © {{ date('Y') }} Veloura. All rights reserved.
            </div>

        </div>


    </div>

</div>

@endsection