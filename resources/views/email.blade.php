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
                                    <h4>Emails Listing</h4>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>
                                                {{$country->name}}
                                            </td>
                                        </tr>
                                        @foreach($country->emails as $k=>$email)
                                            <tr>
                                                <td>
                                                    {{$k+1}} >
                                                    @if($email->status==0)
                                                        ✗
                                                    @else
                                                        ✓
                                                    @endif
                                                    {{$email->email}}</td>
                                            </tr>
                                        @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

