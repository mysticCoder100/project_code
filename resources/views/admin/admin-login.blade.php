@extends('base/base')
@section('body')

    <body data-role="landing">
        <main class="admin-login">
            <section>
                <div class="logo">
                    <img src="{{ asset('assets/images/futa_logo.png') }}" alt="">
                </div>
                <form action="" id="" method="post">
                    @csrf
                    <h3 class="mb-4 text-center">Admin Login</h3>
                    @error('invalid')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ $message }}
                        </div>
                    @enderror
                    @foreach ($fields as $loginField)
                        <x-generic.input :field="$loginField" />
                    @endforeach
                    <div class="foot">
                        <button class="btn btn-majesty w-100" type="submit">Login</button>
                    </div>
                </form>
                <div class="tail">
                    <p class="m-0"> &copy; {{ (new DateTime())->format('Y') }} FUTA Wildlife Park</p>
                </div>
            </section>
        </main>
    </body>
@endsection
