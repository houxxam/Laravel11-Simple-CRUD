<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$member->first_name}} Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

    
    <div class="container bg-light mt-5 p-5">
        <div class="row">
        <div>
            <h4 class="modal-title">Member details</h4>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p class="fw-bold">First name : <span class="fw-light">{{$member->first_name}}</span></p>
                    <p class="fw-bold">Last name : <span  class="fw-light">{{$member->last_name}}</span></p>
                    <p class="fw-bold">Email : <span  class="fw-light">{{$member->email}}</span></p>
                    <p class="fw-bold">Phone: <span  class="fw-light">{{$member->phone_number}}</span></p>
                    <p class="fw-bold">Joined at: <span  class="fw-light">{{$member->join_date}}</span></p>
                    <p class="fw-bold">Status: <span  class="fw-light">{{$member->status ? "Active" : 'Inactive'}}</span></p>
                </div>
                <div class="col-md-4">
                    @if ($member->picture)
                    <img src="{{asset('storage/' . $member->picture)}}" alt="" width="100%">
                    @else
                    <img src="{{asset('storage/pictures/no-photo.png')}}" alt="" width="100%">    
                    @endif
                </div>
            </div>
            <hr>
            <div class="mt-3">
                <a href="{{route('members.edit',$member->id)}}" class="btn btn-warning">Modifier</a>
                <a href="{{route('members.index')}}" class="btn btn-primary">Back to list</a>
            </div>
        </div>
    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>