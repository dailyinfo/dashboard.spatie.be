@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="6" rows="3">
    <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a3"></twitter>
    <music position="c1"></music>
    <review-stats position="f2"></review-stats>
    <ad-stats position="f3"></ad-stats>
    <delivery-stats position="e3"></delivery-stats>
    <todos heading="Dan" team-member="In Progress - Dan" position="c2"></todos>
    <todos heading="Bloke" team-member="In Progress - Bloke" position="d2"></todos>
    <time-weather position="f1" date-format="ddd DD/MM" time-zone="Europe/London" weather-city="Oxford, UK"></time-weather>
    <calendar position="b1:b3"></calendar>
    <internet-connection></internet-connection>
</dashboard>

@endsection
