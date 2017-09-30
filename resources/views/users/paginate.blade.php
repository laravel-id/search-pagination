@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="alert alert-info">
                Tutorial mengenai demo aplikasi ini dapat dibaca di: <a href="https://www.laravel.web.id/2017/09/30/membuat-fitur-search-pagination/">Membuat Fitur Search + Pagination
</a>.
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">

                    <div class="row">
                        <form action="{{ url()->current() }}">
                            <div class="col-md-10">
                                <input type="text" name="keyword" class="form-control" placeholder="Search name or email..." value="{{ request('keyword') }}">
                            </div>
                            <div class="col-md-2 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
