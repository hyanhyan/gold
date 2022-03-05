@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')
    <input type="hidden" id="prodDeletePhoto" value="{{ route("ajaxDeletePhoto") }}">




    {!! Form::model($product, ['method' => 'PATCH', 'enctype' => "multipart/form-data",'route' => ['product.update', $product->id]]) !!}


    <div class="row" id="myTabContent">
        <div class="tab-content col-md-6" id="myTabContent">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="am-tab" data-toggle="tab" href="#am" role="tab" aria-controls="am"
                       aria-selected="true">Armenia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru"
                       aria-selected="false">Russia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en"
                       aria-selected="false">English</a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="am" role="tabpanel" aria-labelledby="am-tab">
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">{{Lang::get('lang.PRODUCT_NAME')}}</label>
                        {!! Form::text('lang[am][title]', $products['am']->title ?? "" , array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">{{Lang::get('lang.PRODUCT_TITLE')}}</label>
                        {!! Form::textarea('lang[am][content]', $products['am']->content ?? ""  , array('class' => 'form-control no-resize', 'placeholder' => 'մեկնաբանություն', 'rows' => 5, 'required')) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru-tab">
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">{{Lang::get('lang.PRODUCT_NAME')}}</label>
                        {!! Form::text('lang[ru][title]', $products['ru']->title ?? ""  , array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">{{Lang::get('lang.PRODUCT_TITLE')}}</label>
                        {!! Form::textarea('lang[ru][content]', $products['ru']->content ?? ""  , array('class' => 'form-control no-resize', 'placeholder' => 'комментарий', 'rows' => 5 )) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">{{Lang::get('lang.PRODUCT_NAME')}}</label>
                        {!! Form::text('lang[en][title]', $products['en']->title ?? ""  , array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">{{Lang::get('lang.PRODUCT_TITLE')}}</label>
                        {!! Form::textarea('lang[en][content]', $products['en']->content ?? "" , array('class' => 'form-control no-resize', 'placeholder' => 'comment', 'rows' => 5 )) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="img-cont col-md-6">
            <div class="img-group col-xs-12 col-sm-12 col-md-12 d-flex">
                <div>
                    <strong>Images:</strong>
                    <div class="form-group align-items-center">
                        <?php $count = 0;?>
                        @foreach ($product->pictures as $key => $picture)
                            <?php ++$count ?>
                            <div class="each">
                                <button class="btn  btn-secondary add-img-inp">
                                    Change
                                </button>
                                <input type="file" class="d-none btn-input" name="crtImg{{$key + 1}}" accept="image/*">
                                <input type="hidden" class="delete-hidden" name="dltImg[]" value="-1">
                                <div class="change-img">
                                    <img class="" src="{{ asset('/uploads/products/' . $picture->img_name )}}"
                                         alt="{{ $picture->img_name }}">
                                </div>

                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="ml-5">
                    <strong> 3D Images:</strong>
                    <div class="form-group ">
                        <div class="each">
                            <button class="btn  btn-secondary add-img-inp">
                                Change
                            </button>
                            <input type="file" class="btn-input btn-input-3D" name="crtImg3D[]" required
                                   accept="image/*" multiple>
                            <div class="change-img">
                                <img class="" src="{{ asset('/uploads/products/jewellery-default.png'  )}}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Video URL:</strong>
                <input type="text" id="yt-input" class="form-control" value="{{$product->videoEmbed}}"
                       placeholder="https://youtu.be/bWNmJqgri4Q">
                <input type="hidden" id="videoURL" class="form-control" value="{{$product->videoURL}}"
                       name="prod[videoURL]">
                <iframe id="yt-iframe" width="260" height="115" src="{{$product->videoEmbed}}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>




    <div class="row prod-edit">

        @if($product->fake !== 1)

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{!! Lang::get('lang.CATEGORY') !!}:</strong>

                    {!! Form::select('prd[category]', [ 1 => Lang::get('lang.JEWELERY'), 4 => Lang::get('lang.WATCH') ], $product->product_global_type , array('class' => 'form-control', 'disabled' => true, 'id' => 'selectCategory')) !!}
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group" id="metalTypeDiv">
                    <strong>{!! Lang::get('lang.METAL') !!}:</strong>
                    <select class="form-control" name="prod[metal_id]" id="metalType"
                            required {{$product->product_global_type == 2 ? 'disabled': ''}}>
                        <option value="0">{{ Lang::get('lang.SELECT_CATEGORY')  }}</option>
                        @if ( $product->product_global_type!= 2 && count($all_data['metals']))
                            @foreach($all_data['metals'] as $key=>$metal)
                                <option
                                    value="{{ $key }}" {{ $product->metal_id == $key ? 'selected=selected' : '' }}>{{ Lang::get('lang.'.$metal)  }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3" id="forWhom">
                <div class="form-group">
                    <strong>{!! Lang::get('lang.FOR_WHOM') !!}:</strong>
                    {!! Form::select('prod[m_w_c]',[ 0 => Lang::get('lang.FOR_WHOM'), 1 => Lang::get('lang.MEN') , 2 => Lang::get('lang.WOMEN') , 3 => Lang::get('lang.CHILDREN') ], $product->product_global_type != 2 ? $product->m_w_c : 0, array('class' => 'form-control', $product->product_global_type == 2 ? 'disabled': '', 'required')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                @if(1 === $product->product_global_type)
                    <div class="form-group">
                        <strong>{!! Lang::get('lang.TYPE') !!}:</strong>
                        <select class="form-control" name="prod[product_type_id]" required>

                            @if (count($all_data['productType']))

                                @foreach($all_data['productType'] as $key=>$prType)
                                    <option
                                        value="{{ $key }}" {{ $product->product_type_id == $key ? 'selected=selected' : '' }}>{{ Lang::get('lang.'.$prType)  }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    {{--watch--}}
                @else
                    <div class="form-group" id="d-gear">
                        <strong>{!! Lang::get('lang.GEAR') !!}:</strong>
                        <select class="form-control" name="prod[product_type_id]" required>

                            @if (count($all_data['productType']))

                                @foreach($all_data['productType'] as $key=>$prType)
                                    <option
                                        value="{{ $key }}" {{ $product->product_type_id == $key ? 'selected=selected' : '' }}>{{ Lang::get('lang.'.$prType)  }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                @endif
            </div>



            <div class="col-xs-12 col-sm-12 col-md-3">
                @if(1 === $product->product_global_type)
                    <div class="form-group" id="rateDiv">
                        <strong>{!! Lang::get('lang.FINENESS') !!}:</strong>
                        <select class="form-control" name="prod[rate_id]" required id="metalRate">
                            <option value="0">{{ Lang::get('lang.SELECT_FINENESS')  }}</option>
                            @if ($product->product_global_type!= 2 && count($all_data['rates']))
                                @foreach($all_data['rates'] as $key=>$rate)
                                    <option value="{{ $rate->id }}"
                                            {{ $product->rate_id == $rate->id ? 'selected=selected' : '' }}
                                            style="display: {{ $product->metal_id != $rate->metal_id ? 'none' : 'block' }}">{{ Lang::get('lang.'.$all_data['metals'][$rate->metal_id]).' | '.$rate->purity  }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                @else
                    {{--Watch--}}
                    <div class="form-group" id="w-belt">
                        <strong>{!! Lang::get('lang.BELT') !!}:</strong>
                        {!! Form::select('prod[belt_type]', [ 1 => Lang::get('lang.GOLD'), 2 => Lang::get('lang.SILVER'), 3 => Lang::get('lang.LEATHER'), 4 => Lang::get('lang.OTHER') ], $product->belt_type , array('class' => 'form-control','id'=>"WatchBelt", 'required')) !!}
                    </div>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{{Lang::get('lang.COLOR')}}:</strong>
                    {!! Form::select('prod[color]', [ 'yellow' => Lang::get('lang.yellow'), 'white' => Lang::get('lang.white'), 'red' => Lang::get('lang.red') ], $product->color , array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{{Lang::get('lang.USED')}}:</strong>
                    {!! Form::select('prod[used]', [ 1 => Lang::get('lang.YES'), 0 => Lang::get('lang.NO') ], $product->used , array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{{Lang::get('lang.PRODUCT_PUBLISH')}}:</strong>
                    {!! Form::select('prod[published]', [ 0 => Lang::get('lang.PRODUCT_STATUS_DISABLE'), 1 => Lang::get('lang.PRODUCT_STATUS_ENABLE') ], $product->published , array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{{Lang::get('lang.PRODUCT_WHENCE')}}:</strong>
                    {!! Form::select('prod[loc_glob]', [ 1 => Lang::get('lang.PRODUCT_ARMENIAN') , 2 => Lang::get('lang.PRODUCT_IMPORTED'), ], $product->loc_glob , array('class' => 'form-control')) !!}
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{!! Lang::get('lang.PRODUCT_PRICE') !!}:</strong>
                    {!! Form::text('prod[price]', $product->price, array('placeholder' => Lang::get('lang.PRODUCT_PRICE') ,'class' => 'form-control', 'required')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{!! Lang::get('lang.PRODUCT_WEIGHT') !!}:</strong>
                    {!! Form::number('prod[weight]', $product->weight, array('placeholder' => Lang::get('lang.PRODUCT_WEIGHT') ,'class' => 'form-control', 'required', 'step'=>'any')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{!! Lang::get('lang.PRODUCT_CODE') !!}:</strong>
                    {!! Form::text('prod[code]', $product->code, array('placeholder' => Lang::get('lang.PRODUCT_CODE'),'class' => 'form-control', 'required')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <strong>{!! Lang::get('lang.ADDRESS') !!}:</strong>
                    {!! Form::select('prod[addresses][]', [ $all_data['info']['address'] => $all_data['info']['address'], $all_data['info']['optional_address'] => $all_data['info']['optional_address'] ], $product->addresses , array('class' => 'form-control', 'multiple' => 'multiple', 'required')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <hr class="hr-text" data-content="Stones Attributes">
            </div>
            <div class="stones-attributes col-xs-12 col-sm-12 col-md-12">
                <div class="add-stones">
                    <table
                        id="table"
                        data-mobile-responsive="true"
                        class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Stone</th>
                            <th scope="col">Carat</th>
                            <th scope="col">Pcs</th>
                            <th scope="col">Color</th>
                            <th scope="col">Clarity</th>
                            <th scope="col">Cut</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody id="t-body">
                        @if (count($all_data['stones']))

                            {{--                             --}}
                            {{--                             <?php $i=0?>--}}
                            @foreach($all_data['stones'] as $key=>$stone)
                                <tr>
                                    <td class="number"></td>
                                    <td>{!! Form::select('stone[name][]', [ 'diamond' => Lang::get('lang.diamond')], $stone['stone_name'] , array('class' => 'form-control', 'readonly' => true)) !!}</td>
                                    <td><input class="form-control" name="stone[carat][]" min="0.1" step="0.1"
                                               type="number" value="{{ $stone['carat']}}"></td>
                                    <td><input class="form-control" name="stone[pcs][]" min="1" step="1" type="number"
                                               value="{{ $stone['pcs']}}"></td>
                                    <td>
                                        {!! Form::select('stone[color][]', [ 'D' => 'D' , 'E' => 'E', 'F' => 'F' , 'G' => 'G',
                                                                            'H' => 'H' , 'I' => 'I', 'J' => 'J' , 'K' => 'K' ],
                                                                             $stone['color'], array('class' => 'form-control')) !!}
                                    </td>
                                    <td>
                                        {!! Form::select('stone[clarity][]', [ 'IF' => 'IF' , 'VVS1' => 'VVS1', 'VVS2' => 'VVS2' ,
                                                                               'VS1' => 'VS1', 'VS2' => 'VS2' , 'Sl1' => 'Sl1',
                                                                               'Sl2' => 'Sl2' , 'Sl3' => 'Sl3' ],
                                                                                $stone['clarity'], array('class' => 'form-control')) !!}
                                    </td>
                                    <td>
                                        {!! Form::select('stone[cut][]', [ 'baguette_straight' => Lang::get('lang.baguette_straight') ,
                                                                               'half_moon' => Lang::get('lang.half_moon'),
                                                                               'calf' =>  Lang::get('lang.calf') ,
                                                                               'trillion_curved' =>  Lang::get('lang.trillion_curved'),
                                                                               'triangle' =>  Lang::get('lang.triangle') ,
                                                                               'trillion_straight' =>  Lang::get('lang.trillion_straight'),
                                                                               'heart' =>  Lang::get('lang.heart'),
                                                                               'radiant_square' =>  Lang::get('lang.radiant_square'),
                                                                               'radiant' =>  Lang::get('lang.radiant'),
                                                                               'emerald' =>  Lang::get('lang.emerald'),
                                                                               'octagon' =>  Lang::get('lang.octagon'),
                                                                               'emerald_square' =>  Lang::get('lang.emerald_square'),
                                                                               'marquise' =>  Lang::get('lang.marquise'),
                                                                               'pear' =>  Lang::get('lang.pear'),
                                                                               'princess' =>  Lang::get('lang.princess'),
                                                                               'oval' =>  Lang::get('lang.oval'),
                                                                               'cushion' =>  Lang::get('lang.cushion'),
                                                                               'cushion_square' =>  Lang::get('lang.cushion_square'),
                                                                               'round' =>  Lang::get('lang.round')
                                                                               ],
                                                                                $stone['cut'] , array('class' => 'form-control')) !!}
                                    </td>
                                    <td><input type="button" class="remove-attr btn btn-danger" value="delete"></td>
                                </tr>

                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                <div class="hidden-stone d-none">
                    <table class="col-stone">
                        <tr>
                            <td class="number"></td>
                            <td>{!! Form::select('stone[name][]', [ 'diamond' => Lang::get('lang.diamond')], null , array('class' => 'form-control', 'readonly' => true)) !!}</td>
                            <td><input class="form-control" name="stone[carat][]" value="1" min="0.1" step="0.1"
                                       type="number"></td>
                            <td><input class="form-control" name="stone[pcs][]" value="1" min="1" step="1"
                                       type="number"></td>
                            <td>
                                {!! Form::select('stone[color][]', [ 'D' => 'D' , 'E' => 'E', 'F' => 'F' , 'G' => 'G',
                                                                    'H' => 'H' , 'I' => 'I', 'J' => 'J' , 'K' => 'K' ],
                                                                    null , array('class' => 'form-control')) !!}
                            </td>
                            <td>
                                {!! Form::select('stone[clarity][]', [ 'IF' => 'IF' , 'VVS1' => 'VVS1', 'VVS2' => 'VVS2' ,
                                                                       'VS1' => 'VS1', 'VS2' => 'VS2' , 'Sl1' => 'Sl1',
                                                                       'Sl2' => 'Sl2' , 'Sl3' => 'Sl3' ],
                                                                        null , array('class' => 'form-control')) !!}
                            </td>
                            <td>
                                {!! Form::select('stone[cut][]', [ 'baguette_straight' => Lang::get('lang.baguette_straight') ,
                                                                       'half_moon' => Lang::get('lang.half_moon'),
                                                                       'calf' =>  Lang::get('lang.calf') ,
                                                                       'trillion_curved' =>  Lang::get('lang.trillion_curved'),
                                                                       'triangle' =>  Lang::get('lang.triangle') ,
                                                                       'trillion_straight' =>  Lang::get('lang.trillion_straight'),
                                                                       'heart' =>  Lang::get('lang.heart'),
                                                                       'radiant_square' =>  Lang::get('lang.radiant_square'),
                                                                       'radiant' =>  Lang::get('lang.radiant'),
                                                                       'emerald' =>  Lang::get('lang.emerald'),
                                                                       'octagon' =>  Lang::get('lang.octagon'),
                                                                       'emerald_square' =>  Lang::get('lang.emerald_square'),
                                                                       'marquise' =>  Lang::get('lang.marquise'),
                                                                       'pear' =>  Lang::get('lang.pear'),
                                                                       'princess' =>  Lang::get('lang.princess'),
                                                                       'oval' =>  Lang::get('lang.oval'),
                                                                       'cushion' =>  Lang::get('lang.cushion'),
                                                                       'cushion_square' =>  Lang::get('lang.cushion_square'),
                                                                       'round' =>  Lang::get('lang.round')
                                                                       ],
                                                                        null , array('class' => 'form-control')) !!}
                            </td>
                            <td><input type="button" class="remove-attr btn btn-danger" value="delete"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="actions text-right mt-2 text-right"><input type="button" id="add-stone" class="btn btn-success"
                                                                   value="add stone"></div>



        @endif

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="update-prod" class="btn btn-primary">{!! Lang::get('lang.UPDATE') !!}</button>
        </div>
    </div>
    {!! Form::close() !!}
@append
@section('attribute-js')
    @include( 'layouts.include.attr-js')


@endsection
