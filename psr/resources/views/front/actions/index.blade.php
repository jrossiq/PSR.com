@extends('front.layouts.interna')

@section('content')
<div class="coordinadores">

<h2>PSR EN LAS PROVINCIAS</h2>


  @forelse($provinces->where('active', 1) as $province)
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-{{ $province->id }}">
          <h1 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $province->id }}" aria-controls="collapse-{{ $province->id }}">
              {{ $province->name }}
          </h1>

        </div>
      </div>

        <div id="collapse-{{ $province->id }}" class="panel-collapse collapse body-coordinadores" role="tabpanel" aria-labelledby="heading-{{ $province->id }}">
          <div class="panel-body">
            <h4><a href="{{ $province->facebook }}" target="blank"><img class="social-coordinadores" src="/img/social/facebook_25.jpg" />Facebook PSR {{ $province->name }}</a></h4>
            <h4 class="coordinadores">Coordinadores Zonales:</h4>
            <ul>
              @forelse($province->users->where('active', 1) as $user)
                <li>
                  <h4>{{ $user->zone }}</h4>
                  <p class="nombre-coordinador"><b>{{ $user->name }}</b></p>
                  <p><img class="social-coordinadores" src="/img/social/whatsapp.png" /> {{ $user->telephone }}</p>
                  <p><img class="social-coordinadores" src="/img/social/email.png" /> {{ $user->email }}</p>
                  <p><img class="social-coordinadores" src="/img/social/facebook_25.jpg" /> <a href="{{ $user->facebook }}" target="blank">Facebook Personal</a></p>
                </li>

              @empty

              @endforelse
            </ul>

          </div>
        </div>
    </div>
    @empty

    @endforelse
</div>
@endsection
