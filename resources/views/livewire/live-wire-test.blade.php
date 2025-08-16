<div>
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex align-items-center gap-2">

        <span>Test Button</span>

        <button wire:click="testAction" wire:loading.attr="disabled" class="btn text-white"
            style="background-color: #7f6dcf; border-radius: 50px;">
            Test
        </button>

        <button wire:click="alart" wire:loading.attr="disabled" class="btn text-white"
            style="background-color: #7f6dcf; border-radius: 50px;">
            Alert
        </button>

        <button wire:click="bagAlart" wire:loading.attr="disabled" class="btn text-white"
            style="background-color: #7f6dcf; border-radius: 50px;">
            Bag Alert
        </button>

        <button wire:click="testTelegram" wire:loading.attr="disabled" class="btn text-white"
            style="background-color: #7f6dcf; border-radius: 50px;">
            Test Telegram
        </button>

        <button wire:click="testWhatsapp" wire:loading.attr="disabled" class="btn text-white"
            style="background-color: #7f6dcf; border-radius: 50px;">
            Test WhatsApp
        </button>

        <button wire:click="testSms" wire:loading.attr="disabled" class="btn text-white"
            style="background-color: #7f6dcf; border-radius: 50px;">
            Test SMS
        </button>
    </div>

</div>