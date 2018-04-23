@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row">
            @foreach (array_slice($data->list , 0, 12) as $day)
                <div class="col-lg-3 mx-auto my-5">
                    <div class="card bg-gray weather text-center">
                        <div class="card-header text-uppercase">{{ $data->city->name }} ({{ $data->city->country }})
                        </div>
                        <div class="card-body">
                            <div class="icon">
                                <img src="http://openweathermap.org/img/w/{{ $day->weather[0]->icon }}.png"
                                     alt="icon">
                            </div>
                            <div class="temperature">{{ round($day->main->temp,1) }} &#8451;</div>
                            <div class="day">{{ \Carbon\Carbon::createFromTimestamp($day->dt)->format('l') }}</div>
                            <div class="additional">
                                <p>Humadity: {{ $day->main->humidity }} %</p>
                                <p>Pressure: {{ round($day->main->pressure) }}</p>
                            </div>
                            <div class="clouds">
                                Clouds: {{ $day->clouds->all}} %
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="date">
                                        <div class="hour">{{ date('H:s', $day->dt) }}</div>
                                        <div class="day">{{ date('d-m-Y', $day->dt) }}</div>
                                    </div>
                                </div>
                                <div class="col-lg-12 desc">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>{{ $day->weather[0]->description }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            Wind: {{ round($day->wind->speed,0)}} km/h
                                        </div>
                                        <div class="col-lg-6">
                                            Rain: {{ !empty($day->rain->{'3h'}) ? round($day->rain->{'3h'} ,1) : "-" }} mm
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
@endsection