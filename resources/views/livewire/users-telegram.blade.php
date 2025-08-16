<div >
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>الاسم</th>
                <th>الرقم</th>
                <th>الصلاحيات</th>
                <th>الخيارات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr wire:click="selectRow({{ $user->id }})"
                class="{{ $user->state == 1 ? 'table-success' : 'table-danger' }}"
                style="cursor: pointer;">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->id_user }}</td>
                    <td>
                        <select wire:change="updateRole({{ $user->id }}, $event.target.value)" class="form-select form-select-sm" wire:click.stop>
                            <option value="Admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                        </select>
                    </td>
                    <td>
                        <button type="button"
                            wire:click.stop="delete({{ $user->id }})"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('هل تريد حذف هذا المستخدم؟')"
                        >
                            حذف
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

   <!-- رابط Bootstrap (CSS + JS) -->

<!-- زر لفتح المودال -->
<button type="button" class="btn btn-primary" wire:click="add_user_telegram">
    اضافة مستخدم تيليجرام
  </button>

<!-- نافذة المودال -->
<div class="modal fade" id="telegramModal" tabindex="-1" aria-labelledby="telegramModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content text-end">

      <!-- العنوان -->
      <div class="modal-header">
        <h5 class="modal-title" id="telegramModalLabel">تسجيل الدخول إلى تيليجرام</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
      </div>

      <!-- المحتوى -->
      <div class="modal-body text-center">
        <p>📱 مسح الرمز لتسجيل على هاتف آخر</p>

        <!-- صورة QR -->
        {{-- <img src="" alt="QR Code" class="img-fluid mb-3"> --}}
        {!! DNS2D::getBarcodeHTML($teleurl, "QRCODE") !!}
        <p>أو قم بتسجيل عبر نسخ الكود وإرساله</p>
        <p>{{ $teleurl }}</p>

        <!-- مربع الكود -->
        <div class="input-group mb-3 w-75 mx-auto">
            <input type="text" class="form-control text-center" id="telegramCode" value="{{ $teleurl }}" readonly>
            <button class="btn btn-outline-primary" type="button" onclick="copyTelegramCode()">📋 نسخ</button>
          </div>
      </div>
      <!-- الأزرار -->
      <div class="modal-footer justify-content-between">

        <button type="button" class="btn btn-success" onclick="window.open('{{ $teleurl }}', '_blank'); var modal = bootstrap.Modal.getInstance(document.getElementById('telegramModal')); modal.hide();">
            تسجيل على هذا الجهاز
        </button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">❌ إغلاق</button>
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
