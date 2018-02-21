@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="6" rows="3">
    <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a3"></twitter>
    <music position="b1:c1"></music>
    <review-stats position="e1"></review-stats>
    <ad-stats position="f1"></ad-stats>
    <todos heading="Dan" team-member="In Progress - Dan" position="b2"></todos>
    <todos heading="Bloke" team-member="In Progress - Bloke" position="c2"></todos>
    <time-weather position="d1" date-format="ddd DD/MM" time-zone="Europe/London" weather-city="Oxford, UK"></time-weather>
    <calendar position="d2:d3"></calendar>
    <internet-connection></internet-connection>
</dashboard>

@endsection
