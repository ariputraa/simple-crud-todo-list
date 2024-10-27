<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Add Tdl/Notes</title>
</head>

@include('sweetalert::alert')

<body>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color:lightskyblue">Create Your To-Do List Here. Throw in some activity!</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('tdl.store') }}">
                            @csrf
                            @method('post')
                            <a href="{{ route('tdl.index')}}">
                                <button class="btn btn-danger mt-1 col-md-12">Back</button>
                            </a>
                            <div class="mb-3">
                                <label class="form-label" style="font-size: 30px">Day</label>
                                <input class="form-control" type="text" name="day" placeholder="Add DAY here ...">
                                <div class="form-text" style="font-size: 15px">Enter the day you would like here!<div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-size: 30px">Goal</label>
                                <input class="form-control" type="text" name="goal" placeholder="Add GOAL here ...">
                                <div class="form-text" style="font-size: 15px">Throw in some goal here! Whatever you like!<div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-size: 30px">Time(Minutes)</label>
                                <input class="form-control" type="text" name="time" placeholder="Add TIME(Minutes) here ...">
                                <div class="form-text" style="font-size: 15px">Time is of the essence, plan it carefully!<div>
                            </div>

                            <div class="md-3">
                                <label for="Status" class="form-label">Status</label>
                                <select name="status" id="status">
                                    <option value="Select The Status" disabled selected>Select Status</option>
                                    <option value="Not Started Yet">Not Started Yet</option>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>

                            <div>
                                {{-- <input type="submit" value="Confirm To-Do List!"> --}}
                                <button class="btn btn-primary btn-success mt-2 col-md-12" type="submit" >Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
</body>

</html>
