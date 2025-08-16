<div class="container mt-5">
    <h3 class="mb-4 text-center">إدخال البيانات</h3>

    <!-- عرض الرسالة -->
    @if (session()->has('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- النموذج -->
    <form wire:submit.prevent="updateSettings">
        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="sw1" class="form-label fs-5">أين وضعت المفتاح (sw1)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="sw1" wire:model.defer="sw1">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="sw2" class="form-label fs-5">أين وضعت المفتاح (sw2)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="sw2" wire:model.defer="sw2">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="sw3" class="form-label fs-5">أين وضعت المفتاح (sw3)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="sw3" wire:model.defer="sw3">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="sw4" class="form-label fs-5">أين وضعت المفتاح (sw4)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="sw4" wire:model.defer="sw4">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="sw5" class="form-label fs-5">أين وضعت المفتاح (sw5)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="sw5" wire:model.defer="sw5">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="ir1" class="form-label fs-5">أين وضعت جهاز الاستشعار (ir1)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="ir1" wire:model.defer="ir1">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="ir2" class="form-label fs-5">أين وضعت جهاز الاستشعار (ir2)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="ir2" wire:model.defer="ir2">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="ir3" class="form-label fs-5">أين وضعت جهاز الاستشعار (ir3)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="ir3" wire:model.defer="ir3">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="ir4" class="form-label fs-5">أين وضعت جهاز الاستشعار (ir4)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="ir4" wire:model.defer="ir4">
            </div>
        </div>
        
        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="ir4" class="form-label fs-5">أين وضعت جهاز الاستشعار (fire1)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="ir4" wire:model.defer="fire1">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="ir4" class="form-label fs-5">أين وضعت جهاز الاستشعار (fire2)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="ir4" wire:model.defer="fire2">
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-md-4 text-end">
                <label for="ir4" class="form-label fs-5">أين وضعت جهاز الاستشعار (fire3)؟</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="ir4" wire:model.defer="fire3">
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg">إرسال</button>
            </div>
        </div>
    </form>
</div>
