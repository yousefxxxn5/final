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
<!-- زر لفتح المودال -->
<button type="button" class="btn btn-success" wire:click="add_user_whatsapp">
    اضافة مستخدم واتساب
</button>

<!-- نافذة المودال -->
<div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content text-end">

      <!-- العنوان -->
      <div class="modal-header">
        <h5 class="modal-title" id="whatsappModalLabel">تسجيل الدخول إلى واتساب</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
      </div>

      <!-- المحتوى -->
      <div class="modal-body text-center">
        <p>📱 امسح الرمز لتسجيل الدخول من هاتفك</p>

        <!-- صورة QR -->
        {!! DNS2D::getBarcodeHTML($whatsurl, "QRCODE") !!}
        <p>أو قم بتسجيل الدخول باستخدام هذا الرابط</p>
        <p>{{ $whatsurl }}</p>

        <!-- مربع الكود -->
        <div class="input-group mb-3 w-75 mx-auto">
            <input type="text" class="form-control text-center" id="whatsappCode" value="{{ $whatsurl }}" readonly>
            <button class="btn btn-outline-success" type="button" onclick="copyWhatsappCode()">📋 نسخ</button>
        </div>
      </div>

      <!-- الأزرار -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" onclick="window.open('{{ $whatsurl }}', '_blank'); var modal = bootstrap.Modal.getInstance(document.getElementById('whatsappModal')); modal.hide();">
            تسجيل على هذا الجهاز
        </button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">❌ إغلاق</button>
      </div>

    </div>
  </div>
</div>

<script>
    window.addEventListener('open-whatsapp-modal', () => {
      const modal = new bootstrap.Modal(document.getElementById('whatsappModal'));
      modal.show();
    });

    function copyWhatsappCode() {
      const input = document.getElementById("whatsappCode");
      input.select();
      input.setSelectionRange(0, 99999); // للهواتف
      document.execCommand("copy");
      alert("✅ تم نسخ الرابط: " + input.value);
    }
</script>

</div>
