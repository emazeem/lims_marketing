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
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
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
                                                                <a href="" class="btn btn-dark">Show</a>
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                                <div class="card">
                                                    <div class="col-2">
                                                        <form action="{{route('store-emails')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <input type="text" class="form-control" name="country" id="country">
                                                            </div>
                                                            <label for="emails">Email List</label>
                                                            <textarea class="form-control" cols="1" rows="30" id="emails" name="emails"></textarea>
                                                            <button type="submit" class="btn btn-dark btn-sm btn-block">Add in DB</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
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
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $(function () {
            $('.email-select-2').select2();
            CKEDITOR.replace('message', {
                toolbar: [
                    {
                        name: 'document',
                        groups: ['mode', 'document', 'doctools'],
                        items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
                    },
                    {
                        name: 'basicstyles',
                        groups: ['basicstyles', 'cleanup'],
                        items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language']
                    },
                    {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                    {
                        name: 'insert',
                        items: ['Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']
                    },
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'tools', items: ['Maximize', 'ShowBlocks']},
                    {name: 'others', items: ['-']},

                ]
            });

            $('#email-form').on('submit', function (e) {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                e.preventDefault();

                var button=$('.send-email-btn');
                var previous=$('.send-email-btn').html();
                button.attr('disabled','disabled').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing');

                if ($('#subject').val()=='' || $('#message').val()==''){
                    var message='';
                    if ($('#subject').val()==''){
                        message+='Subject field is required.*';
                    }
                    if ($('#message').val()==''){
                        message+='Message field is required.*';
                    }
                    if ($('#email').val()==''){
                        message+='To field is required.*';
                    }
                    derror(message);
                    button.attr('disabled',null).html(previous);
                }else {
                    $('#overlay-bg').addClass('overlay-bg');
                    $('.progress').show();
                    $('.progress-btn').show();
                    $('.progress-text').show();
                    var all_mails=$('#email').val();
                    var total=all_mails.length;
                    $.each(all_mails,function (i,v) {
                        $('#index').val(v);
                        sendEmail(i,total,v);
                    });
                    button.attr('disabled',null).html(previous);
                }
            });
        });
        function derror(message) {
            swal("Failed", message, "error");
        }
    </script>
</div>
</body>
</html>

