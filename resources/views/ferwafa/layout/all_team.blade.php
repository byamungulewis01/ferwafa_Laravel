<div class="card card-body mailbox">
    <h5 class="card-title">All Teams</h5>
    <div class="message-center" style="height: 420px !important;">
            @foreach ($teams as $team)
        <a href="team/{{ $team->id }}">
            <span class="round" style="background:white;"><img src="{{ asset('storage/'.$team->logo.'') }}" alt="user" width="50"
                    height="50"></span>
            <div class="mail-contnet">
                <h6 class="text-dark font-medium mb-0">{{ $team->name }}</h6>
                <span class="mail-desc">{{ $team->stadium }}</span>
            </div>
        </a>
        @endforeach
    </div>
</div>