<div class="dashboard-cards">
    @foreach ($contents as $content)
        <div class="card">
            <div class="icon">
                <i class="{{ $content['icon'] }}"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $content['title'] }}</h5>
                <p class="card-text">{{ number_format($content['count']) }}</p>
            </div>
        </div>
    @endforeach
</div>
