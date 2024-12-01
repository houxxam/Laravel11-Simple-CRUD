<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

    <div class="container mt-5">
        <h3>Liste des membres : </h3>
        <a class="btn btn-primary" href="{{route('members.create')}}">ajouter</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">picture</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Join date</th>
                <th scope="col">Satus</th>
                <th scope="col"></th>
            </tr>  
            </thead> 
            <tbody>
            @foreach ($members as $member )
            <tr>
                <td>{{ $member->id }}</td>
                <td> 
                    @if ($member->picture)
                        <img src="{{asset('storage/' . $member->picture)}}" alt="{{ $member->first_name }} picture" width="45px">
                    @else
                        <img src="{{asset('storage/pictures/no-photo.png')}}" alt="{{ $member->first_name }} picture" width="45px">  
                    @endif
                </td>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->join_date }}</td>
                <td>{{ $member->status ? "Active" : "Inactive" }}</td>
                <td><form action="{{route('members.destroy',$member->id)}}" method="POST">
                    <a class="btn btn-secondary" href="{{route('members.show',$member->id)}}">Consulter</a>
                    <a class="btn btn-success" href="{{route('members.edit',$member->id)}}">Modifier</a>
                    
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure You want to delete {{$member->first_name}} ')">supprimer</button>
                    </form>
                   
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>

    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>