@extends('layouts.admin')


@section('content')
    @include('admin.includes.breadcrumb')



    {!! Form::open(array('route' => 'product.store', 'method'=>'POST', 'enctype' => "multipart/form-data")) !!}

    <div class="row" id="myTabContent">
        <div class="leng-cont tab-content col-md-6">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="am-tab" data-toggle="tab" href="#am" role="tab" aria-controls="am" aria-selected="true">Armenia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="false">Russia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">English</a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="am" role="tabpanel" aria-labelledby="am-tab">
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Անվանում *</label>
                        {!! Form::text('lang[am][title]', null , array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Մեկնաբանություն *</label>
                        {!! Form::textarea('lang[am][content]', null , array('class' => 'form-control no-resize', 'placeholder' => 'մեկնաբանություն', 'rows' => 5, 'required' )) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru-tab">
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Имя</label>
                        {!! Form::text('lang[ru][title]', null , array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Комментарий</label>
                        {!! Form::textarea('lang[ru][content]', null , array('class' => 'form-control no-resize', 'placeholder' => 'комментарий', 'rows' => 5 )) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Name</label>
                        {!! Form::text('lang[en][title]', null , array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Comment</label>
                        {!! Form::textarea('lang[en][content]', null , array('class' => 'form-control no-resize', 'placeholder' => 'comment', 'rows' => 5 )) !!}
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center"><input type="checkbox" name="fake" id="fake" class="mr-2"> <label for="fake" class="mb-0"> is fake</label></div>
        </div>

        <div class="img-cont col-md-6">
            <div class="img-group col-xs-12 col-sm-12 col-md-12 d-flex">
                <div>
                    <strong>Images:</strong>
                    <div class="form-group ">
                        <div class="each">
                            <button class="btn  btn-secondary add-img-inp">
                                Change
                            </button>
                            <input type="file" class="btn-input btn-resize" name="crtImg1" required accept="image/*">
                            <div class="change-img">
                                <img class="" src="{{ asset('/uploads/products/jewellery-default.png'  )}}" >
                            </div>

                        </div>
                        <div class="each">
                            <button class="btn  btn-secondary add-img-inp">
                                Change
                            </button>
                            <input type="file" class="d-none btn-input btn-resize" name="crtImg2" accept="image/*">
                            <div class="change-img">
                                <img class="" src="{{ asset('/uploads/products/jewellery-default.png'  )}}">
                            </div>

                        </div>
                        <div class="each">
                            <button class="btn  btn-secondary add-img-inp">
                                Change
                            </button>
                            <input type="file" class="d-none btn-input btn-resize" name="crtImg3" accept="image/*">
                            <div class="change-img">
                                <img class="" src="{{ asset('/uploads/products/jewellery-default.png'  )}}">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="ml-5">
                    <strong> 3D Images:</strong>
                    <div class="form-group ">
                        <div class="each">
                            <button class="btn  btn-secondary add-img-inp">
                                Change
                            </button>
                            <input type="file" class="btn-input btn-input-3D" name="crtImg3D[]" required accept="image/*" multiple>
                            <div class="change-img">
                                <img class="" src="{{ asset('/uploads/products/jewellery-default.png'  )}}" >
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <img class="w-25" id="idf" src="" alt="">
            <div class="uploaded-img"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Video URL:</strong>
                <input type="text" id="yt-input" class="form-control" placeholder="https://youtu.be/bWNmJqgri4Q">
                <input type="hidden" id="videoURL" class="form-control" name="prod[videoURL]">
                <iframe id="yt-iframe" width="260" height="115" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="row d-create for-fake">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.CATEGORY') !!}: *</strong>

                {!! Form::select('published', [0 => Lang::get('lang.SELECT_CATEGORY'), 1 => Lang::get('lang.JEWELERY'),/* 2 => Lang::get('lang.TABLEWARE'), 3 => Lang::get('lang.BOX'),*/ 4 => Lang::get('lang.WATCH')  ], null , array('class' => 'form-control', 'id' => 'selectCategory', 'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group" id="metalTypeDiv">
                <strong>{!! Lang::get('lang.METAL') !!}: *</strong>
                <select class="form-control" name="prod[metal_id]" required id="metalType" >

                    @if (count($all_data['metals']))

                        <option value="0" >{{ Lang::get('lang.SELECT_CATEGORY')  }}</option>
                        @foreach($all_data['metals'] as $key=>$metal)
                            <option value="{{ $key }}" >{{ Lang::get('lang.'.$metal)  }}</option>
                        @endforeach
                    @endif

                </select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3" id="forWhom">
            <div class="form-group">
                <strong>{!! Lang::get('lang.FOR_WHOM') !!}: *</strong>
                {!! Form::select('prod[m_w_c]', [ 0 => Lang::get('lang.FOR_WHOM'),1 => Lang::get('lang.WOMEN') , 2 => Lang::get('lang.MEN') ,  3 => Lang::get('lang.CHILDREN')], null , array('class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group" id="d-type" >
                <strong>{!! Lang::get('lang.TYPE') !!}: <span class="req-span">*</span></strong>
                <select class="form-control" name="prod[product_types]"  id="productType" disabled>

                    @if (count($all_data['productType']))
                        <option value="0"  typeCategory="-1">{{ Lang::get('lang.SELECT_CATEGORY')  }}</option>

                        @foreach($all_data['productType'] as $prType)
                            <option value="{{ $prType->id }}" typeCategory="{{ $prType->product_global_type }}" forWhom="{{ $prType->product_permission }}">{{ Lang::get('lang.'.$prType->name)  }}</option>
                        @endforeach
                    @endif

                </select>
            </div>
            {{--Watch--}}
            <div class="form-group req-span" id="d-gear" >
                <strong>{!! Lang::get('lang.GEAR') !!}: <span class="req-span">*</span></strong>
                <select class="form-control" name="prod[product_type_id]" required id="productGear">

                    @if (count($all_data['productType']))
                        <option value=""  typeCategory="-1">{{ Lang::get('lang.SELECT_GEAR')  }}</option>

                        @foreach($all_data['productType'] as $prType)
                            <option value="{{ $prType->id }}" typeCategory="{{ $prType->product_global_type }}" forWhom="{{ $prType->product_permission }}">{{ Lang::get('lang.'.$prType->name)  }}</option>
                        @endforeach
                    @endif

                </select>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group" id="rateDiv">
                <strong>{!! Lang::get('lang.FINENESS') !!}: <span class="req-span">*</span></strong>
                <select class="form-control" name="prod[rate_id]" required  id="metalRate" disabled>
                    @if (count($all_data['rates']))
                        <option value="0" >{{ Lang::get('lang.SELECT_FINENESS')  }}</option>
                        @foreach($all_data['rates'] as $key=>$rate)
                            <option value="{{ $rate->id }}" >{{ Lang::get('lang.'.$all_data['metals'][$rate->metal_id]).' | '.$rate->purity  }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 req-span">

            {{--Watch--}}
            <div class="form-group " id="w-belt">
                <strong>{!! Lang::get('lang.BELT') !!}: <span class="req-span">*</span></strong>
                {!! Form::select('prod[belt_type]', [ 1 => Lang::get('lang.GOLD'), 2 => Lang::get('lang.SILVER'), 6 => Lang::get('lang.LEATHER'), 4 => Lang::get('lang.OTHER') ], null , array('class' => 'form-control','id'=>"WatchBelt")) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{{Lang::get('lang.COLOR')}}:</strong>
                {!! Form::select('prod[color]', [ 'yellow' => Lang::get('lang.yellow'), 'white' => Lang::get('lang.white'), 'red' => Lang::get('lang.red') ], null , array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{{Lang::get('lang.USED')}}:</strong>
                {!! Form::select('prod[used]', [ 1 => Lang::get('lang.YES'), 0 => Lang::get('lang.NO') ], null , array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{{Lang::get('lang.PRODUCT_PUBLISH')}}:</strong>
                {!! Form::select('prod[published]', [ 1 => Lang::get('lang.PRODUCT_STATUS_ENABLE'), 0 => Lang::get('lang.PRODUCT_STATUS_DISABLE') ], null , array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{{Lang::get('lang.PRODUCT_WHENCE')}}:</strong>
                {!! Form::select('prod[loc_glob]', [ 1 => Lang::get('lang.PRODUCT_ARMENIAN') , 2 => Lang::get('lang.PRODUCT_IMPORTED'), ], null , array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.PRODUCT_PRICE') !!}: *</strong>
                {!! Form::text('prod[price]', null, array('placeholder' => Lang::get('lang.PRODUCT_PRICE') , 'id' => 'inPrice' , 'class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.PRODUCT_WEIGHT') !!}: *</strong>
                {!! Form::number('prod[weight]', null, array('placeholder' => Lang::get('lang.PRODUCT_WEIGHT') , 'id' => 'inWeight', 'class' => 'form-control', 'required', 'step'=>'any')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.PRODUCT_CODE') !!}: *</strong>
                {!! Form::text('prod[code]', null, array('placeholder' => Lang::get('lang.PRODUCT_CODE'), 'id' => 'inCode', 'class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <strong>{!! Lang::get('lang.ADDRESS') !!}:</strong>
                {!! Form::select('prod[addresses][]', [ 'address' => $all_data['info']['address'], 'optional_address' => $all_data['info']['optional_address'] ], null , array('class' => 'form-control', 'multiple' => 'multiple', 'required')) !!}
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

                    </tbody>
                </table>
            </div>
            <div class="hidden-stone d-none">
                <table class="col-stone">
                    <tr>
                        <td class="number"></td>
                        <td>{!! Form::select('stone[name][]', [ 'diamond' => Lang::get('lang.diamond')], null , array('class' => 'form-control', 'readonly' => true)) !!}</td>
                        <td><input class="form-control" name="stone[carat][]" value="1" min="0.1" step="0.1" type="number"></td>
                        <td><input class="form-control" name="stone[pcs][]" value="1" min="0" step="1"  type="number"></td>
                        <td>
                            {!! Form::select('stone[color][]', [ 'not selected' => 'not selected', 'D' => 'D' , 'E' => 'E', 'F' => 'F' , 'G' => 'G',
                                                                'H' => 'H' , 'I' => 'I', 'J' => 'J' , 'K' => 'K' ],
                                                                null , array('class' => 'form-control')) !!}
                        </td>
                        <td>
                            {!! Form::select('stone[clarity][]', [ 'not selected' => 'not selected', 'IF' => 'IF' , 'VVS1' => 'VVS1', 'VVS2' => 'VVS2' ,
                                                                   'VS1' => 'VS1', 'VS2' => 'VS2' , 'Sl1' => 'Sl1',
                                                                   'Sl2' => 'Sl2' , 'Sl3' => 'Sl3' ],
                                                                    null , array('class' => 'form-control')) !!}
                        </td>
                        <td>
                            {!! Form::select('stone[cut][]', ['not selected' => 'not selected',  'baguette_straight' => Lang::get('lang.baguette_straight') ,
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
                        <td ><input type="button" class="remove-attr btn btn-danger" value="delete"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="actions text-right mt-2 text-right"><input type="button" id="add-stone" class="btn btn-success" value="add stone"></div>




    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" id="create-prod" class="btn btn-primary">{!! Lang::get('lang.CREATE') !!}</button>
    </div>
    {!! Form::close() !!}
@append
@section('attribute-js')
    @include( 'layouts.include.attr-js')


@endsection
