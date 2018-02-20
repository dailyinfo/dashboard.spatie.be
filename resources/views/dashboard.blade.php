@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="6" rows="3">
    <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a3"></twitter>
    <music position="c1:d1"></music>
    <ad-stats position="f1"></ad-stats>
    <todos team-member="Dan" position="b2"></todos>
    <todos team-member="Bloke" position="c2"></todos>
    <todos team-member="Jen" position="d2"></todos>
    <todos team-member="Katy" position="e2"></todos>
    <todos team-member="Susie" position="b3"></todos>
    <todos team-member="Russ" position="c3"></todos>
    <todos team-member="Alice" position="d3"></todos>
    <time-weather position="e3" date-format="ddd DD/MM" time-zone="Europe/London" weather-city="Oxford, UK"></time-weather>
    <calendar position="f2:f3"></calendar>
    <internet-connection></internet-connection>
</dashboard>

@endsection
