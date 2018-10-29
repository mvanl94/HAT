@extends( 'theme::layouts.default' )

@section('htmlheader_title')
    {{ $module['title'] }}
@endsection

@section('sub_nav')
    @include( 'theme::account.profile.menu' )
@endsection

@section('content')

    <div class="row">
        <div class="col-sm order-sm-1">
            <h3 class="float-left">Gegevens betaler</h3>
        </div>
    </div>

    @if ($enrollments->count() == 0)
        {!! create_message('info', 'Geen actieve inschrijvingen die door iemand anders betaald worden.') !!}
    @else
        <div class="row">
            <div class="col">
                <p>Voor welke inschrijving wil je de gegevens van de betaler aanpassen?</p>
                <ul>
                @foreach ($enrollments as $enrollment)
                <li><a href="{{ route('profile.company', ['oisCode' => $enrollment->oisCode]) }}">{{ $enrollment->description }}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    @endif

@endsection