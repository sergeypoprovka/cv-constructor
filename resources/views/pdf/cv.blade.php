<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    <style>
        @page {
            margin: 0 !important;
        }
        @php
            include(public_path().'/css/app.css');
        @endphp
        h3{
            font-size: 2em;
            margin-bottom: 0.6em;
        }
        h1{
            font-size: 3em;
        }
        .deco_bar{
            background: rgb(244, 114, 182);
            height: 100%;
            width: 8px;
            margin-right: 30px;
            float: left;
        }
        #skills .el-rate__icon {
            font-size: 12px !important;
            margin-right: 2px;
        }
    </style>
</head>
<body>

<div class="flex flex-col justify-start items-center h-full">
    <div class="sheet" id="sheet">
        <div class="flex flex-row h-full w-full">
            <div class="deco_bar"></div>
            <div class="flex-grow">
                <div id="personal_info" class="p-4">
                    <h1 class="text-center">{{ $data['personal_info']['firstname'] }} {{ $data['personal_info']['lastname'] }}</h1>
                    <el-row>
                        @if(isset($data['personal_info']['email']))<el-col :span="8" class="text-left">{{ $data['personal_info']['email'] }}</el-col>@endif
                        @if(isset($data['personal_info']['phone']))<el-col :span="8" class="text-center">{{ $data['personal_info']['phone'] }}</el-col>@endif
                        @if(isset($data['personal_info']['portfolio'])) <el-col :span="8" class="text-right">{{ $data['personal_info']['portfolio'] }}</el-col> @endif
                    </el-row>
                    <hr class="my-4" />
                </div>
                @if(isset($data['objective']) && count($data['objective']))
                <div id="objectives" class="px-4 mb-4">
                    <h3>{{ __('Target job summary') }}</h3>
                    @if(isset($data['objective']['objective']))<p class="mb-2">{{ $data['objective']['objective'] }}</p>@endif
                    @if(isset($data['objective']['bullets']) && count($data['objective']['bullets']))
                    <ul class="list-disc ml-4">
                        @foreach($data['objective']['bullets'] as $bullet)
                            <li class="mr-4">
                                {{ $bullet }}
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                @if(isset($data['experience']) && count($data['experience']))
                <div id="work_experience" class="px-4">
                    <h3>{{ __('Work experience') }}</h3>
                    @if(isset($data['experience']['experience']) && count($data['experience']['experience']))
                    <ul>
                        @foreach($data['experience']['experience'] as $experience)
                        <li class="mb-4">
                            <p class="justify-between">
                                <strong>{{ $experience['job_title'] }}</strong>
                                <strong>{{ $experience['start'] }} - {{ $experience['end'] }}</strong>
                            </p>
                            <p><strong>{{ $experience['company_name'] }}</strong></p>
                            <p>{{ $experience['description'] }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                @if(isset($data['education']) && count($data['education']))
                <div id="education" class="px-4">
                    <h3>{{ __('Education') }}</h3>
                    @if(isset($data['education']['education']) && count($data['education']['education']))
                    <ul>
                        @foreach($data['education']['education'] as $education)
                        <li class="mb-4">
                            <p class="justify-between">
                                <strong>{{ $education['school_name'] }}</strong>
                                <strong>{{ $education['start'] }} - {{ $education['end'] }}</strong>
                            </p>
                            <p><strong>{{ $education['degree_course'] }}</strong></p>
                            <p>{{ $education['description'] }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                @if(isset($data['additional_education']) && count($data['additional_education']))
                <div id="additional_education" class="px-4">
                    <h3>{{ __('Additional Education') }}</h3>
                    @if(isset($data['additional_education']['additional_education']) && count($data['additional_education']['additional_education']))
                    <ul>
                        @foreach($data['additional_education']['additional_education'] as $additional_education)
                        <li class="mb-4">
                            <p class="justify-between">
                                <strong>{{ $additional_education['school_name'] }}</strong>
                                <strong>{{ $additional_education['start'] }} - {{ $additional_education['end'] }}</strong>
                            </p>
                            <p><strong>{{ $additional_education['degree_course'] }}</strong></p>
                            <p>{{ $additional_education['description'] }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                @if(isset($data['skills']) && count($data['skills']))
                <div id="skills" class="px-4">
                    <h3>{{ __('Skills') }}</h3>
                    @if(isset($data['skills']['skills']) && count($data['skills']['skills']))
                    <ul>
                        @foreach($data['skills']['skills'] as $skill)
                        <li class="mb-4 mr-4">
                            <p>{{ $skill['name'] }}</p>
                            <el-rate disabled v-model="{{ $skill['rating'] }}" :allow-half="true"></el-rate>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                @if(isset($data['language']) && count($data['language']))
                <div id="languages" class="px-4">
                    <h3>{{ __('Languages') }}</h3>
                    @if(isset($data['language']['language']) && count($data['language']['language']))
                    <ul>
                        @foreach($data['language']['language'] as $language)
                        <li class="mb-4">
                            <p>{{ $language['name'] }}</p>
                            <p>{{ $language['level'] }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

                @if(isset($data['hobbies']) && count($data['hobbies']))
                <div id="hobbies" class="px-4">
                    <h3>{{ __('Hobbies') }}</h3>
                    @if(isset($data['hobbies']['hobbies']) && count($data['hobbies']['hobbies']))
                    <ul>
                        @foreach($data['hobbies']['hobbies'] as $hobby)
                        <li class="mb-4 flex flex-row w-full justify-between">
                            <p>{{ $hobby['name'] }}</p>
                            <p>{{ $hobby['description'] }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

</body>
</html>
