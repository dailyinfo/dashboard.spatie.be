@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="6" rows="3">
    <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a3"></twitter>
    <music position="c1:d1"></music>
    <ad-stats position="f1"></ad-stats>
    <tasks team-member="dan" position="b2"></tasks>
    <tasks team-member="bloke" position="c2"></tasks>
    <tasks team-member="jen" position="d2"></tasks>
    <tasks team-member="katy" position="e2"></tasks>
    <tasks team-member="katy" position="b3"></tasks>
    <tasks team-member="russ" position="c3"></tasks>
    <tasks team-member="alice" position="d3"></tasks>
    <time-weather position="e3" date-format="ddd DD/MM" time-zone="Europe/London" weather-city="Oxford, UK"></time-weather>
    <calendar position="f2:f3"></calendar>
    <internet-connection></internet-connection>
</dashboard>

@endsection
