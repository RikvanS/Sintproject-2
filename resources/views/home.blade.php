@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Geen verlanglijst zonder rijmpje</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <p>Ja bij elke nieuwe rage
                Wil jij hebben wat je ziet
                Maar zelfs nog bij Pippi Langkous
                Kreeg jij ontslag, en wel subiet!

                Voorzien van twee maal linker handen
                Koekenbakker, brekebeen!
                Vlekken, gaten, builen, scherven
                of de 'down the drain'

                Zit de Sint je nou te plagen?
                Of zijn het echt flaters bij de vleet?
                Je mag het aan de Pieten vragen...
                Voor jou een vraag voor hen een weet...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
