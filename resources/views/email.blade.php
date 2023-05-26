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

    <div class="row">
        <div class="col-sm-12">
            <div class="card email-card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="mail-body-content">
                                            <form class="form-material row" method="post" id="email-form" action="{{route('send.email')}}">
                                                @csrf

                                                <div class="form-group col-12 p-0 m-0">
                                                    <label for="email">To</label>
                                                    <select class="form-control email-select-2" id="email"
                                                            name="email[]" multiple>
                                                        <option value='emazeem07@gmail.com' selected>emazeem07@gmail.com</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6 col-12 p-0 m-0">
                                                    <label for="from">From</label>
                                                    <input type="email" class="form-control" id="from" name="from"
                                                           readonly
                                                           placeholder="Enter email" value="emazeem07@gmail.com">
                                                </div>
                                                <div class="form-group col-md-6 col-12 p-0 m-0">
                                                    <label for="subject">Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject"
                                                           placeholder="Subject" value="Introducing a Revolutionary LIMS Solution Tailored for ISO 17025 Accredited Labs">
                                                </div>

                                                <div class="form-group col-12 p-0 m-0">
                                                    <label for="message">Message</label>
                                                    <textarea class="form-control" id="message" name="message"
                                                              placeholder="Enter your message">I hope this message finds you well. I am reaching out to introduce a groundbreaking web solution that is set to transform the way accredited laboratories operate and manage their data. Our comprehensive Laboratory Information Management System (LIMS) software, developed using Laravel and PHP, is a game-changer in the industry and offers a level of detail and functionality never seen before.
Imagine a solution that not only streamlines your laboratory operations but also saves you valuable human effort while driving unprecedented business growth. Our LIMS software is precisely that solution.With our LIMS solution, your laboratory will experience unparalleled efficiency and accuracy in managing key aspects of your operations. Let me provide you with an overview of the impressive features our software encompasses.
1. Calibration Management: Our LIMS allows you to effectively manage pressure, temperature, volume, mass, RPM, and time parameters with ease. It provides a centralized platform to handle calibration equipment, reference data, and errors management, ensuring precise and reliable measurements.
2. Modules Galore: We understand the diverse needs of laboratories, and that's why our LIMS comes equipped with a range of modules to streamline your processes. From HR and leave record management to purchase, accounts, finance, quotation, and order modules, we've got you covered.
3. Quality Assurance: With our quality module, you can maintain the highest standards by tracking and managing quality control procedures, deviations, and corrective actions. Our software facilitates compliance with ISO 17025 regulations and helps you deliver accurate and trustworthy results to your clients.
4. Items Reference Data Management: Our LIMS provides a comprehensive system for managing items reference data. You can easily organize and track data related to units under calibration, enabling seamless generation of reports and certificates with calculated factors and uncertainties specific to each unit.
5. Unmatched Calculation Capabilities: Our software's calculation engine empowers you to perform complex calculations of errors and uncertainties, ensuring the utmost accuracy in your reports. You can confidently deliver detailed certificates, uncertainty budgets, and worksheets to your clients, demonstrating your commitment to quality and precision.
What sets our LIMS solution apart is its unmatched level of detail and functionality. We have meticulously designed and developed this software, recognizing the need for a comprehensive and tailored solution that has not been available in the market before.
I would be delighted to schedule a personalized demo for you, where I can showcase the power and capabilities of our LIMS software. Please let me know a convenient time for a call or an in-person meeting, and I will ensure that you have a firsthand experience of how our solution can revolutionize your laboratory operations.
Thank you for considering our groundbreaking LIMS software. We are excited to partner with you and help you achieve new heights of efficiency and excellence in your laboratory.
Best regards,
Muhammad AzeemAl-Meezan Industrial Meterology Services,emazeem07@gmail.com info@aimscal.com


                                                    </textarea>
                                                </div>

                                                <div class="float-right mt-3 col-12 text-right p-0 m-0">
                                                    <button type="submit" class="btn send-email-btn waves-effect waves-light btn-primary">
                                                        <i class="fa fa-paper-plane"></i> Send
                                                    </button>
                                                </div>
                                                <input type="hidden" value="1" id="index" name="index">
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

