<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Inputs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2 class="mb-4">Form Inputs</h2>
        <form action="{{ route('user_table.update',  $data->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- تحديد طريقة HTTP كـ PUT -->
            <fieldset class="border p-4 mb-4">
                <legend class="float-none w-auto px-2">Basic Information</legend>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $data->id }}" placeholder="Enter ID" hidden>
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter Name">
                    </div>
                    <div class="col-md-6">
                        <label for="is_twoilo" class="form-label">Is Twoilo</label>
                        <input type="number" class="form-control" id="is_twoilo" name="is_twoilo" value="{{ $data->is_twoilo }}" placeholder="Enter 1 or 0">
                    </div>
                    <div class="col-md-6">
                        <label for="twoilo_code" class="form-label">Twoilo Code</label>
                        <input type="text" class="form-control" id="twoilo_code" name="twoilo_code" value="{{ $data->twoilo_code }}" placeholder="Enter Twoilo Code">
                    </div>
                <div class="col-md-6">
                    <label for="is_valid" class="form-label">Is Valid</label>
                    <input type="text" class="form-control" id="is_valid" name="is_valid" value="{{ $data->is_valid }}" placeholder="Enter Is Valid">
                </div>
            </div>
        </fieldset>

        <!-- Section 2 -->
        <fieldset class="border p-4 mb-4">
            <legend class="float-none w-auto px-2">Email Information</legend>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" placeholder="Enter Email">
                </div>
                <div class="col-md-6">
                    <label for="EmailNumber" class="form-label">Email Number</label>
                    <input type="text" class="form-control" id="EmailNumber" name="EmailNumber" value="{{ $data->EmailNumber }}" placeholder="Enter Email Number">
                </div>
                <div class="col-md-6">
                    <label for="EmailToken" class="form-label">Email Token</label>
                    <input type="text" class="form-control" id="EmailToken" name="EmailToken" value="{{ $data->EmailToken }}" placeholder="Enter Email Token">
                </div>
                <div class="col-md-6">
                    <label for="EmailTo" class="form-label">Email To</label>
                    <input type="text" class="form-control" id="EmailTo" name="EmailTo" value="{{ $data->EmailTo }}" placeholder="Enter Email To">
                </div>
                <div class="col-md-6">
                    <label for="EmailFrom" class="form-label">Email From</label>
                    <input type="text" class="form-control" id="EmailFrom" name="EmailFrom" value="{{ $data->EmailFrom }}" placeholder="Enter Email From">
                </div>
                <div class="col-md-6">
                    <label for="EmailMassege" class="form-label">Email Message</label>
                    <input type="text" class="form-control" id="EmailMassege" name="EmailMassege" value="{{ $data->EmailMassege }}" placeholder="Enter Email Message">
                </div>
            </div>
        </fieldset>

        <!-- Section 3 -->
        <fieldset class="border p-4 mb-4">
            <legend class="float-none w-auto px-2">WhatsApp Information</legend>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="whatsAppNumber" class="form-label">WhatsApp Number</label>
                    <input type="text" class="form-control" id="whatsAppNumber" name="whatsAppNumber" value="{{ $data->whatsAppNumber }}" placeholder="Enter WhatsApp Number">
                </div>
                <div class="col-md-6">
                    <label for="whatsAppToken" class="form-label">WhatsApp Token</label>
                    <input type="text" class="form-control" id="whatsAppToken" name="whatsAppToken" value="{{ $data->whatsAppToken }}" placeholder="Enter WhatsApp Token">
                </div>
                <div class="col-md-6">
                    <label for="whatsAppTo" class="form-label">WhatsApp To</label>
                    <input type="text" class="form-control" id="whatsAppTo" name="whatsAppTo" value="{{ $data->whatsAppTo }}" placeholder="Enter WhatsApp To">
                </div>
                <div class="col-md-6">
                    <label for="whatsAppFrom" class="form-label">WhatsApp From</label>
                    <input type="text" class="form-control" id="whatsAppFrom" name="whatsAppFrom" value="{{ $data->whatsAppFrom }}" placeholder="Enter WhatsApp From">
                </div>
                <div class="col-md-6">
                    <label for="whatsAppMassege" class="form-label">WhatsApp Message</label>
                    <input type="text" class="form-control" id="whatsAppMassege" name="whatsAppMassege" value="{{ $data->whatsAppMassege }}" placeholder="Enter WhatsApp Message">
                </div>
            </div>
        </fieldset>

        <!-- Section 4 -->
        <fieldset class="border p-4 mb-4">
            <legend class="float-none w-auto px-2">SMS Information</legend>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="smsNumber" class="form-label">SMS Number</label>
                    <input type="text" class="form-control" id="smsNumber" name="smsNumber" value="{{ $data->smsNumber }}" placeholder="Enter SMS Number">
                </div>
                <div class="col-md-6">
                    <label for="smsToken" class="form-label">SMS Token</label>
                    <input type="text" class="form-control" id="smsToken" name="smsToken" value="{{ $data->smsToken }}" placeholder="Enter SMS Token">
                </div>
                <div class="col-md-6">
                    <label for="smsFrom" class="form-label">SMS From</label>
                    <input type="text" class="form-control" id="smsFrom" name="smsFrom" value="{{ $data->smsFrom }}" placeholder="Enter SMS From">
                </div>
                <div class="col-md-6">
                    <label for="smsTo" class="form-label">SMS To</label>
                    <input type="text" class="form-control" id="smsTo" name="smsTo" value="{{ $data->smsTo }}" placeholder="Enter SMS To">
                </div>
                <div class="col-md-6">
                    <label for="smsMassege" class="form-label">SMS Message</label>
                    <input type="text" class="form-control" id="smsMassege" name="smsMassege" value="{{ $data->smsMassege }}" placeholder="Enter SMS Message">
                </div>
            </div>
        </fieldset>

        <!-- Section 5 -->
        <fieldset class="border p-4 mb-4">
            <legend class="float-none w-auto px-2">Authentication</legend>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="email_verified_at" class="form-label">Email Verified At</label>
                    <input type="datetime-local" class="form-control" id="email_verified_at" name="email_verified_at" value="{{ $data->email_verified_at }}">
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $data->password }}" placeholder="Enter Password">
                </div>
            </div>
        </fieldset>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</body>
</html>
