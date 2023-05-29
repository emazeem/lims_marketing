<!DOCTYPE html>
<html lang="en">
<head>
    <title>LIMS | Marketing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <script src="{{url('assets/js/1.10.1/jquery.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <div class="row mt-5">
        <div class="col-sm-12 mt-5">
            <div class="card email-card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Countries</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add Email List</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Country</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach(\App\Models\Country::all() as $country)
                                                        <tr>
                                                            <td>
                                                                {{$country->name}}
                                                            </td>
                                                            <td>
                                                                <a href="{{url('show-emails/'.$country->id)}}" class="btn btn-dark">Show</a>
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                                <div class="card">
                                                    <div class="offset-md-4 col-md-4 col-12">
                                                        <form action="{{route('store-emails')}}" method="post">
                                                            @csrf

                                                            <div class="form-group">
                                                                <label for="option">Select an Option</label>
                                                                <select class="form-control" id="option" name="option">
                                                                    <option selected disabled >-- Select an Option</option>
                                                                    <option value="0">New Country</option>
                                                                    <option value="1">Existing Country</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group new-country" style="display: none">
                                                                <label for="country">Country</label>
                                                                <input type="text" class="form-control" name="country" id="country">
                                                            </div>
                                                            <div class="form-group existing-countries" style="display:none;">
                                                                <label for="country_id">Select Country</label>
                                                                <select class="form-control" id="country_id" name="country_id">
                                                                    @foreach(\App\Models\Country::all() as $country)
                                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <label for="emails">Email List</label>
                                                            <textarea class="form-control" cols="1" rows="30" id="emails" name="emails"></textarea>
                                                            <button type="submit" class="btn btn-dark btn-sm btn-block">Add in DB</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(function () {
            $('#option').change(function (){
                var value=$(this).val();
                if(value=='0'){
                    $('.new-country').show();
                    $('.existing-countries').hide();
                }else{
                    $('.new-country').hide();
                    $('.existing-countries').show();
                }
            });
        });

    </script>
</div>
</body>
</html>

