<div wire:poll.5s>
    <ul>
        @foreach ($notif as $notification)
            <li @if ($notification->see) style="background: lightblue;" @endif>
                <div class="timeline-panel">
                    <div class="media me-2 media-info">
                        {{ $notification->type }}
                    </div>
                    <div class="media-body">
                        <h5 class="mb-1">{{ $notification->body }}</h5>
                        <small class="d-block">{{ $notification->created_at }}</small>
                    </div>
                </div>
                <button wire:click="markAsSeen({{ $notification->id }})" class="btn btn-sm btn-primary mt-2">
                    Mark as Seen
                </button>
            </li>
        @endforeach
    </ul>
</div>
