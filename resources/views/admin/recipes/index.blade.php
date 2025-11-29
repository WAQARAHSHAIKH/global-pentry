@extends('layout.admin')

@section('title', 'Dashboard Overview')

@section('content')

<style>
    /* Global */
    body {
        background: #f6f7f9;
    }

    /* Sidebar */
    .sidebar {
        height: 100vh;
        background: #ffffff;
        border-right: 1px solid #e4e4e4;
        padding: 25px 20px;
        position: sticky;
        top: 0;
    }

    .sidebar .brand {
        font-size: 22px;
        font-weight: 700;
        color: #0b6b3a;
        margin-bottom: 30px;
    }

    .sidebar .menu-title {
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 700;
        color: #9ea2a8;
        margin-top: 25px;
        margin-bottom: 10px;
    }

    .sidebar .nav-link {
        display: flex;
        align-items: center;
        padding: 10px 12px;
        border-radius: 8px;
        color: #333;
        font-weight: 500;
        margin-bottom: 6px;
        transition: 0.2s;
    }

    .sidebar .nav-link:hover {
        background: #e9f7ef;
        color: #0b6b3a;
    }

    .sidebar .nav-link.active {
        background: #0b6b3a;
        color: white;
    }

    .sidebar i {
        font-size: 18px;
        margin-right: 10px;
    }

    /* Stat Cards */
    .stat-card {
        background: #fff;
        border-radius: 14px;
        padding: 22px;
        border-left: 5px solid transparent;
        box-shadow: 0 3px 12px rgba(0,0,0,0.05);
    }

    .stat-card h3 {
        font-size: 28px;
        font-weight: 700;
        margin-top: 10px;
    }

    .stat-note {
        font-size: 13px;
        color: #777;
    }

    /* Table Section */
    .section-box {
        background: #ffffff;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    }

    .add-btn {
        background: #0b6b3a;
        border-radius: 8px;
        padding: 10px 20px;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }

    .add-btn:hover {
        opacity: 0.9;
        color: #fff;
    }

</style>

<div class="container-fluid">
    <div class="row">

        {{-- =================== SIDEBAR =================== --}}
        <div class="col-md-3 col-lg-2 sidebar">

            <div class="brand">Global Pentry Admin</div>

            <a href="#" class="nav-link">
                <i class="fas fa-home"></i> Dashboard Overview
            </a>

            <div class="menu-title">Content & Users</div>

            <a href="#" class="nav-link">
                <i class="fas fa-check-circle"></i> Recipe Approvals
                <span class="badge bg-danger ms-auto">5</span>
            </a>

            <a href="{{ route('recipes.index') }}" class="nav-link active">
                <i class="fas fa-utensils"></i> Manage Recipes (CRUD)
            </a>

            <a href="#" class="nav-link">
                <i class="fas fa-users"></i> Manage Users (CRUD)
            </a>

            <div class="menu-title">Feedback & Sales</div>

            <a href="#" class="nav-link">
                <i class="fas fa-envelope"></i> Contact Queries
                <span class="badge bg-primary ms-auto">3</span>
            </a>

            <a href="#" class="nav-link">
                <i class="fas fa-dollar-sign"></i> Sales Transactions
            </a>

        </div>

        {{-- =================== MAIN AREA =================== --}}
        <div class="col-md-9 col-lg-10 p-4">

            <h1 class="fw-bold">Dashboard Overview</h1>
            <p class="text-muted">Welcome back, Admin. Here's a summary of your platform.</p>

            {{-- STAT CARDS --}}
            <div class="row g-4 my-3">

                <div class="col-md-3">
                    <div class="stat-card" style="border-left-color:#0b6b3a;">
                        <i class="fas fa-user fs-3 text-success"></i>
                        <h3>1,542</h3>
                        <p class="text-muted small">Total Registered Users</p>
                        <span class="stat-note">+12% from last month</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card" style="border-left-color:#e6b400;">
                        <i class="fas fa-exclamation-triangle fs-3 text-warning"></i>
                        <h3>5</h3>
                        <p class="text-muted small">Recipes Pending Approval</p>
                        <span class="stat-note">Requires immediate action</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card" style="border-left-color:#0075ff;">
                        <i class="fas fa-check-circle fs-3 text-primary"></i>
                        <h3>4,890</h3>
                        <p class="text-muted small">Total Published Recipes</p>
                        <span class="stat-note">Grown by 25 this week</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card" style="border-left-color:#00bcd4;">
                        <i class="fas fa-dollar-sign fs-3 text-info"></i>
                        <h3>$345.00</h3>
                        <p class="text-muted small">Revenue Today</p>
                        <span class="stat-note">32 recipes sold</span>
                    </div>
                </div>

            </div>

            {{-- RECIPES TABLE --}}
            <div class="section-box mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold">Manage All Recipes (CRUD)</h4>
                    <a href="{{ route('recipes.create') }}" class="add-btn">+ Add New Recipe</a>
                </div>

                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Author</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($recipes as $recipe)
                            <tr>
                                <td>{{ $recipe->title }}</td>

                                <td>
                                    <span class="badge bg-success">Approved</span>
                                </td>

                                <td>Waqar Ahmed</td>

                                <td class="text-end">
                                    <a href="{{ route('recipes.edit', $recipe) }}" class="text-primary me-2">Edit</a>
                                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Delete this recipe?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-danger p-0 m-0">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</div>

@endsection