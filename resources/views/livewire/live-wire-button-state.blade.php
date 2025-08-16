<div wire:poll.5000ms>

    @if (session()->has('on'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('on') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- تنبيه الخطأ -->
    @if (session()->has('off'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('off') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
        <!-- تنبيه النجاح -->

        <!-- الأزرار -->
        @if ($buttonState)
            <button wire:click="on_d" wire:loading.attr="disabled" class="btn btn-outline-danger btn-lg px-5 py-3 my-3">
                إطفاء
            </button>
        @else
            <button wire:click="on_d" wire:loading.attr="disabled"
                class="btn btn-outline-success btn-lg px-5 py-3 my-3">
                تشغيل
            </button>
        @endif
    </div>
</div>
