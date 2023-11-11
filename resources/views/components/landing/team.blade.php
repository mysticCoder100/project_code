@props([
    'teams' => [
        [
            'name' => 'Musa Aliu',
            'img' => 'male1.jpg',
        ],
        [
            'name' => 'Susan Blessing',
            'img' => 'female2.jpg',
        ],
        [
            'name' => 'Abdullah Muhammad',
            'img' => 'male2.jpg',
        ],
    ],
])

<div class="teams">
    @foreach ($teams as $team)
        <div class="card">
            <img class="card-img-top" src="{{ asset("/assets/images/{$team['img']}") }}" alt="Title">
            <div class="card-body">
                <p class="user">
                    <span>{{ $team['name'] }}</span>
                    <span class="position">Director</span>
                </p>
                <p class="text-muted">
                    There are many of lorem ipsum available but the have in some form.
                </p>

                <div>
                    <a href="#" class="btn btn-majesty">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-majesty">
                        <i class="fab fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-majesty">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
