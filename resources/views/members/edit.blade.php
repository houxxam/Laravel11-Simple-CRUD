<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editer Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5 p-5 bg-light">
        <h3>Editer  </h3>
        <div class="row">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{route('members.update',$member->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" required value="{{$member->first_name}}">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required value="{{$member->last_name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{$member->email}}">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone number</label>
                    <input type="tel" name="phone_number" class="form-control" maxlength="10" value="{{$member->phone_number}}">
                </div>
                <div class="mb-3">
                    <label for="join_date" class="form-label">Join Date</label>
                    <input type="date" name="join_date"  class="form-control" required value="{{$member->join_date}}">
                </div>
                <div class="mb-3">
                    @if ($member->picture)
                    <img src="{{asset('storage/' . $member->picture)}}" alt="" width="100px">
                    @else
                    <img src="{{asset('storage/pictures/no-photo.png')}}" alt="" width="100px">    
                    @endif
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" name="picture"  class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="status" id="status" class="form-check-input" {{$member->status ? "checked" : "" }} value="1">
                    <label for="status" class="form-check-label">Active Member</label ">
                </div>
                
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <a href="{{route('members.index')}}" class="btn btn-secondary">Back to list</a>
            </form>
           
        </div>
        
    </div>

 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>