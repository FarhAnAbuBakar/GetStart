@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
    @if(count($services) > 0)
        <ul class="list-group">
            @foreach($services as $service)
                <li class="list-group-item">
                    {{$service}}
                </li>      
            @endforeach
        </ul>
    @endif

      {{-- <h2>{{$services}}</h2> --}}

      {{-- @php
        var_dump ($services)
      @endphp --}}

    
    {{-- @if(count($services['services']) > 0)
      <ul>
            @foreach($services['services'] as @service)
            <li>
                {{$service}}
            </li> 
            @endforeach
      </ul>
    @endif
    
    {{$services['title']}} --}}
        
      
@endsection
