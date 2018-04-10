@extends('layouts.admin')

@section('header')
@stop

@section('footer')
@stop

@section('content')
    <div class="container">
        <transition name="fade">
            <router-view name="companiesIndex"></router-view>
            <router-view></router-view>
        </transition>
    </div>

    {{--<style>--}}
        {{--.fade-enter-active, .fade-leave-active {--}}
            {{--transition: opacity .5s--}}
        {{--}--}}
        {{--.fade-enter, .fade-leave-active {--}}
            {{--opacity: 0--}}
        {{--}--}}
    {{--</style>--}}

@endsection
