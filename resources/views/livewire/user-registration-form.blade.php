<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('x'))
        <div class="alert alert-success">
            {{ session('x') }}
        </div>
    @endif

    <form wire:submit.prevent="register">
        <!-- Full Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your full name" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" wire:model="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone Number -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" wire:model="phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter a password"
                wire:model="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Telegram Bot Button -->
        @if (!$state)
            <div class="mb-3 text-center">
                <label for="bot-link" class="form-label">Register via Telegram Bot</label><br>
                {{-- <a href="https://t.me/yamin77846_bot?start={{ urlencode($number_test) }}" target="_blank"
                    class="btn btn-outline-success"> --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#telegramModal"  >
                        اضافة مستخدم تيليجرام
                    </button>
                    <!-- نافذة المودال -->
                    <div class="modal fade" id="telegramModal" tabindex="-1" aria-labelledby="telegramModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content text-end">

                                <!-- العنوان -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="telegramModalLabel">تسجيل الدخول إلى تيليجرام</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="إغلاق"></button>
                                </div>

                                <!-- المحتوى -->
                                <div class="modal-body text-center">
                                    <p>📱 مسح الرمز لتسجيل على هاتف آخر</p>

                                    <!-- صورة QR -->
                                    {{-- <img src="" alt="QR Code" class="img-fluid mb-3"> --}}
                                    {!! DNS2D::getBarcodeHTML($teleurl, 'QRCODE') !!}
                                    <p>أو قم بتسجيل عبر نسخ الكود وإرساله</p>
                                    <p>{{ $teleurl }}</p>

                                    <!-- مربع الكود -->
                                    <div class="input-group mb-3 w-75 mx-auto">
                                        <input type="text" class="form-control text-center" id="telegramCode"
                                            value="{{ $teleurl }}" readonly>
                                        <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button"
                                            onclick="copyTelegramCode()">📋
                                            نسخ</button>
                                    </div>
                                </div>
                                <!-- الأزرار -->
                                <div class="modal-footer justify-content-between">

                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                                        onclick="window.open('{{ $teleurl }}', '_blank'); var modal = bootstrap.Modal.getInstance(document.getElementById('telegramModal')); modal.hide();">
                                        تسجيل على هذا الجهاز
                                    </button>
                                    <button class="btn btn-secondary" onmouseenter="@this.call('fetchQrCode')" data-bs-dismiss="modal"  >❌ إغلاق</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <script>
                        window.addEventListener('open-telegram-modal', () => {
                            const modal = new bootstrap.Modal(document.getElementById('telegramModal'));
                            modal.show();
                        });
                    </script>

                    <script>
                        function copyTelegramCode() {
                            const input = document.getElementById("telegramCode");
                            input.select();
                            input.setSelectionRange(0, 99999); // للهواتف
                            document.execCommand("copy");
                            alert("✅ تم نسخ الكود: " + input.value);
                        }

                        function registerThisDevice() {
                            alert("🟢 جارٍ تسجيل هذا الجهاز...");
                            // هنا يمكنك استدعاء AJAX أو دالة أخرى
                        }
                    </script>


            </div>
        @endif
        <div class="mb-3 text-center">
            <label for="bot-link" class="form-label">Register via whatsaap Bot</label><br>

            <a href="http://wa.me/+14155238886?text={{ urlencode($number_test) }}" target="_blank"
                class="btn btn-outline-success">

                <i class="bi bi-telegram"></i> Open whatsapp Bot
            </a>
        </div>


        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </div>
    </form>
</div>