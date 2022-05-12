@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="container detailMargin oShadow">
                    <div class="row">
                        <div class="col">
                            <div class="row" style="height: 100%">
                                <div class="col" style="position: relative">
                                <h2>{{ $prod['products']['name'] }}</h2>
                                <p>{{ $prod['products']['description'] }}</p>
                                    <div class="textBotl">
                                        <h3 >{{ $prod['products']['price'] }} Kr.</h3>
                                        <h6>{{ $prod['products']['discount'] }}% Discount</h6>
                                    </div>
                                </div>
                                <div class="col" style="position: relative">
                                    <div class="textBotr">
                                        <p>{{ $prod['products']['stock'] }} Stk.</p>
                                        <p>From {{ $prod['products']['brand'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <img class="mx-auto d-block" src="{{ $prod['products']['image'] }}" style="height: 400px" >
                        </div>
                    </div>
                </div>



            @if( auth()->check() )



        <div class="container detailMargin oShadow">
        <h1>Add to cart</h1>
            <form method="POST" action="/product/cart">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="no_items">Cart</label>
            <input type="text" class="form-control" id="no_items" name="no_items">
        </div>
        @error('no_items')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror


        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

     </form>
        </div>

     <!--  REVIEW  -->
        <div class="container detailMargin oShadow">
     <h2>Review</h2>
     <form method="POST" action="/product/review">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="review">Review</label>
            <input type="text" class="form-control" id="review" name="review">
        </div>
        @error('review')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
             <input type="hidden" class="form-control"  value="{{auth()->user()->username}}" id="username" name="username" >
        </div>

        <div class="form-group">
             <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{$id}}">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

     </form>
        </div>
       @endif

                <div class="container detailMargin oShadow" style="overflow-y:scroll; height:300px;">
       <h2>Reviews</h2>
                  @if ($prod['reviews'])
                  @foreach($prod['reviews'] as $produc)
                    <div class="pizza-item" >
                    <h4>{{ $produc['username'] }}</h4>
                    <p>{{ $produc['review'] }}</p>


                  </div>
                 @endforeach
                 @else
                 <div class="pizza-item">
                  <p>No review yet</p>
                  </div>
         @endif
                </div>

            <div class="container detailMargin oShadow">
            <h2>Related product</h2>


                    <div class="content" id="productGrid">


                        @if (is_array($cato) || is_object($cato))
                            @foreach($cato['catogories'] as $produc)
                                <div class="card oShadow" id="productMargin" style="width: 22rem;">
                                    <a href="/product/{{ $produc['id'] }}" style="color: black; text-decoration: none;">
                                        <img class="card-img-top" src="{{ $produc['image'] }}" style="height: 280px; object-fit: cover;" >
                                        <div class="card-body" id="productDesc">
                                            <h4>{{ $produc['name'] }}</h4>
                                            <h4>{{ $produc['description'] }}</h4>
                                            <h4>{{ $produc['price'] }} Kr.</h4>
                                        </div>

                                    </a>
                                </div>
                                    @endforeach
                                    @endif

                    </div>

            </div>
        </div>

        @endsection

