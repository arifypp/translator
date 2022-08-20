<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ appName() }}</title>
        <meta name="description" content="@yield('meta_description', appName())">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        @stack('before-styles')
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
        <link href="{{ mix('css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ mix('css/keyboard.css') }}" rel="stylesheet">
        <link href="{{ mix('css/style.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        @include('includes.partials.announcements')

        <section class="card-header" id="app">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="logo d-inline-block mr-4">
                            <a href="#"><h3><span>CB</span> Translate</h3></a>
                        </div>
                        <nav class="d-inline-block">
                            <div class="menu-item">
                                <a href="#"> <i class="bi bi-translate"></i> Text</a>
                                <a href="#"> <i class="bi bi-file-earmark-text"></i> Document</a>
                                <a href="#"><i class="bi bi-globe"></i> Website</a>
                            </div>
                        </nav>
                    </div>
                    <div class="col-xl-4 text-right justify-content-end justify-align-end">
                        <div class="avater">
                            <a href="#">
                                <i class="bi bi-person"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="translate-box mt-5 pt-5">
            <div class="container">
                <div class="row lang-body align-middle">
                    <div class="col-xl-6 m-0 p-0">
                        <div class="lang-selector">
                            <button type="button">English</button>
                        </div>
                    </div>
                    <div class="col-xl-6 m-0 p-0">
                        <div class="lang-selector">
                            <button type="button">Norway</button>
                        </div>
                    </div>
                    <div class="lang-switch">
                        <a href="#">
                            <i class="bi bi-arrow-left-right"></i>
                        </a>
                    </div>
                    <span class="separtor"></span>
                    <div class="col-xl-6">
                        <div class="translate-text">
                            <textarea name="langContent" id="langContent" cols="15" rows="5" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="Start typing or paste content"></textarea>
                            <span class="remove-icon">
                                <i class="bi bi-x-lg"></i>
                            </span>
                        </div>
                         <!-- Assets for translate -->
                        <div class="row my-3">
                            <div class="col-xl-6">
                                <div class="speakmic">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Voice Input" ><i class="bi bi-mic"></i></a>
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Voice Stop" style="display:none;"><i class="bi bi-mic-mute"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-6 text-right">
                                <div class="keyboard">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="On-screen keyboard"><i class="bi bi-keyboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 bg-light">
                        <div class="nb-spinner"></div>

                        <div class="translate-result">
                        </div>

                        <div class="copy-div">
                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Copy Text"><i class="bi bi-files"></i></a>
                        </div>
                        <div class="like-sign">
                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Like Translation"><i class="bi bi-hand-thumbs-up-fill"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Disike Translation"><i class="bi bi-hand-thumbs-down-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @stack('before-scripts')
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/frontend.js') }}"></script>
        <script src="{{ mix('js/keyboard.min.js') }}"></script>
        <script>
            // Main part translation

            $(document).ready(function(){
            
            $("#langContent").change(function(e){
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                        "X-CSRFToken": '{{csrf_token()}}'
                    }
                });

            var transText = $("#langContent").val()

            if(this.value.length){
                $.ajax({
                    type:'POST',
                    url:"{{ route('frontend.translate') }}",
                    data: {"_token": "{{ csrf_token() }}", "transText": transText},
                    beforeSend: function(){
                        $(".nb-spinner").show();
                    },
                    complete: function(){
                        $(".nb-spinner").hide();
                    },
                    success:function(data){
                        if(data.query){
                            $('.translate-result').html(data.query.targettext);
                            $('.copy-div a').show();
                            $('.like-sign').show();
                        }
                        else{
                            $('.translate-result').html("Data Not Found");
                        }
                    }
                });
            }
                    
                }); 

            });
        </script>
        <script src="{{ mix('js/custom.js') }}"></script>
        @stack('after-scripts')
    </body>
</html>
