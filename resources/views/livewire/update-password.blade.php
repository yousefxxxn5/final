<div>
    <div>
        <h4 class="mb-4">تغيير الاسم</h4>
        <form wire:submit.prevent="updateName" class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="name" class="col-form-label">الاسم الجديد</label>
            </div>
            <div class="col-auto">
                <input type="text" id="name" wire:model.defer="name" class="form-control"
                    placeholder="أدخل الاسم الجديد">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">تغيير</button>
            </div>

            @if (session()->has('message'))
                <div class="col-12 text-success mt-2">
                    {{ session('message') }}
                </div>
            @endif
        </form>
        <br>
        <br>

    </div>
    <h4 class="mb-4">تغيير كلمة المرور</h4>
    <form wire:submit.prevent="updatePassword" class="row gy-2 gx-3 align-items-center">

        <!-- كلمة المرور الحالية -->
        <div class="col-auto">
            <label for="currentPassword" class="form-label">كلمة المرور الحالية</label>
            <input type="password" wire:model.defer="currentPassword" class="form-control" id="currentPassword"
                placeholder="كلمة المرور الحالية">
            @error('currentPassword') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- زر التحقق -->
        <div class="col-auto align-self-end">
            <button type="button" class="btn btn-secondary mt-2" wire:click="checkCurrentPassword">تحقق</button>
        </div>

        <!-- كلمة المرور الجديدة -->
        <div class="col-auto">
            <label for="newPassword" class="form-label" {{ $canChange ? '' : 'hidden' }}>كلمة المرور الجديدة</label>
            <input type="password" wire:model.defer="newPassword" class="form-control" id="newPassword"
                placeholder="كلمة المرور الجديدة" {{ $canChange ? '' : 'hidden' }}>
            @error('newPassword') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- تأكيد كلمة المرور -->
        <div class="col-auto">
            <label for="confirmPassword" class="form-label" {{ $canChange ? '' : 'hidden' }}>تأكيد كلمة المرور</label>
            <input type="password" wire:model.defer="confirmPassword" class="form-control" id="confirmPassword"
                placeholder="تأكيد كلمة المرور" {{ $canChange ? '' : 'hidden' }}>
            @error('confirmPassword') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- زر الحفظ -->
        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary mt-2" {{ $canChange ? '' : 'hidden' }}>تغيير</button>
        </div>

        @if ($successMessage)
        <div class="col-12 text-success mt-2">
            {{ $successMessage}}
        </div>
        @endif

    </form>

</div>