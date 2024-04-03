<x-app-layout>
    <div class="container mt-3">
        <h1 class="h1">User List</h1>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><img src="/storage/{{$user->profile_photo_path}}" alt="{{$user->profile_photo_path}}"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>