<x-admin-master>
    @section('content')

        <h1>Users</h1>

        @if(session('user-deleted'))
            <div class="alert alert-danger">{{session('user-deleted')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Registered date</th>
                            <th>Updated profile date</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Registered date</th>
                            <th>Updated profile date</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td><img height="50px" src="{{$user->avatar}}" alt=""></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td>
                                <form method="post" action="{{route('admin.users.destroy', $user->id)}}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Delete</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection

        @section('scripts')

            <!-- Page level custom scripts -->
            @vite('vendor/datatables/dataTables.bootstrap4.min.js')
            @vite(['vendor/datatables/jquery.dataTables.min.js'])
            @vite(['public/js/demo/datatables-demo.js'])
        @endsection
</x-admin-master>
