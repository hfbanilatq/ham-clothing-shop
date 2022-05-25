@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', $viewData['subtitle'])

@section('content')

    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img @if ($storage_type === 'gcp') src="{{ $viewData['product']->getImage() }}"
                    @else
                    src="{{ asset('/storage/' . $viewData['product']->getImage()) }}" @endif
                        class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $viewData['product']->getName() }} (${{ $viewData['product']->getPrice() }})
                            </h5>
                            <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                            <p class="card-text">
                            <form method="POST" action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                                <div class="row">
                                    @csrf
                                    <div class="col-auto">
                                        <div class="input-group col-auto">
                                            <div class="input-group-text">{{ __('home.quantity') }}</div>
                                            <input type="number" min="1" max="10" class="form-control quantity-input"
                                                name="quantity" value="1">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn bg-primary text-white"
                                            type="submit">{{ __('home.add.cart') }}</button>
                                    </div>
                                </div>
                            </form>
                            </p>
                        </div>
                    </div>
                    <div style="margin: 5px;">
                        @if (count($viewData['product']->getPublications()) > 0)

                            <div class="container-carousel">
                                <section class="carousel" aria-label="Gallery">
                                    <ol class="carousel__viewport">

                                        @foreach ($viewData['product']->getPublications() as $publication)
                                            <li id="{{ 'carousel__slide' . $loop->index }}" tabindex="0"
                                                class="carousel__slide">
                                                <div class="carousel__snapper">
                                                    <div>
                                                        <img class="carousel-img"
                                                            @if ($storage_type === 'gcp') src="{{ $publication->getImage() }}"
                                                        @else
                                                        src="{{ asset('/storage/' . $publication->getImage()) }}" @endif
                                                            alt="" class="img-responsive">
                                                    </div>
                                                    @if ($loop->index === 0)
                                                        <a href="{{ '#carousel__slide' . (count($viewData['product']->getPublications()) - 1) }}"
                                                            class="carousel__prev">{{ __('go-last') }}</a>
                                                        <a href="{{ '#carousel__slide' . ($loop->index + 1) }}"
                                                            class="carousel__next">{{ __('go-next') }}</a>
                                                    @else
                                                        @if ($loop->index === count($viewData['product']->getPublications()) - 1)
                                                            <a href="{{ '#carousel__slide' . ($loop->index - 1) }}"
                                                                class="carousel__prev">{{ __('go-previous') }}</a>
                                                            <a href="#carousel__slide0"
                                                                class="carousel__next">{{ __('go-first') }}</a>
                                                        @else
                                                            <a href="{{ '#carousel__slide' . ($loop->index - 1) }}"
                                                                class="carousel__prev">{{ __('go-previous') }}</a>
                                                            <a href="{{ '#carousel__slide' . ($loop->index + 1) }}"
                                                                class="carousel__next">{{ __('go-next') }}</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </section>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
