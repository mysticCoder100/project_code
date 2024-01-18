@extends('base/landing_root')
@section('main')
    <main class="landing-history">
        <x-landing.hero page="My History" />

        <section class="my-container">

            @if (count($records) <= 0)
                <div class="no-record">
                    <h4 class="text-danger">No History Found !!!</h4>
                </div>
            @else
                <h4 class="counter"> <span>Total Number of Vistation:</span> {{ count($records) }}</h4>
                <div class="history-card__wrapper">
                    @foreach ($records as $record)
                        <div class="card text-start">
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ (new DateTime($record->visitation_created_at))->format('F, jS Y') }}
                                    <span class="">Visitation</span>
                                </h4>
                                <div class="history-card__body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Number of Visitor(s):
                                            <span>{{ $record->visitor_number }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            Proposed Visitation Date:
                                            <span>{{ $record->visitation_date }}</span>
                                        </li>
                                        @if ($record->want_accomodation == 'true')
                                            <li class="list-group-item">
                                                Accomodation Type:
                                                <span>{{ $record->accomodation_name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                Number of Room(s):
                                                <span>{{ $record->accomodation_count }}</span>
                                            </li>
                                        @endif
                                        <li class="list-group-item">
                                            Total Cost:
                                            <span>{{ $record->amount }}</span>
                                        </li>
                                    </ul>

                                    <p class="mt-3 m-0">Payment Status:
                                        {{ $record->payment_status == 1 ? 'paid' : 'unpaid' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </section>

    </main>
@endsection
