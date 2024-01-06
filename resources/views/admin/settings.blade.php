@extends('base/admin_root')
@section('main')
    <x-admin.adminHeader page="Settings" />
    <main class="my-container-admin settings-main">
        <section class="settings">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="accountSettingControl" data-bs-toggle="tab"
                        data-bs-target="#accountSetting"
                        type="button" role="tab" aria-controls="accountSetting" aria-selected="true">Account
                        Setting</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="resetPasswordControl" data-bs-toggle="tab"
                        data-bs-target="#resetPassword" type="button" role="tab" aria-controls="resetPassword"
                        aria-selected="false">Reset Password</button>
                </li>
            </ul>

            <div class="tab-content settings_form-wrapper">

                <form action="" class="tab-pane active" id="accountSetting" role="tabpanel"
                    aria-labelledby="accountSettingControl">
                    @csrf
                    @foreach ($accountFields as $field)
                        <x-generic.input :$field />
                    @endforeach
                    <button class="btn btn-majesty w-100" type="submit">Save</button>
                </form>

                <form action="" class="tab-pane" id="resetPassword" role="tabpanel"
                    aria-labelledby="resetPasswordControl">
                    @csrf
                    @foreach ($passwordResetFields as $field)
                        <x-generic.input :$field />
                    @endforeach
                    <button class="btn btn-majesty w-100" type="submit">Save</button>
                </form>

            </div>
        </section>

    </main>
@endsection
