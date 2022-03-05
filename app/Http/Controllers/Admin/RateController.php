<?php

    namespace App\Http\Controllers\Admin;

    use App\Metal;
    use App\RateHistory;
    use App\UserInfo;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Rate;
    use Illuminate\Support\Facades\DB;

    class RateController extends MainController
    {
        /**
         * Display a listing of the resource.
         *
         * @param Request $request
         * @param RateHistory $history
         * @return \Illuminate\Http\Response
         */
        public function index (Request $request, RateHistory $history)
        {
            $page = 20;
            $data = Rate::orderBy('id', 'DESC')->paginate($page);

            $metals = Metal::pluck('name','id')->all();

            $breadcrumb = [
                [
                    'name' => 'Rate',
                ]
            ];

            /*$metal = Metal::find();
            return view('rate', compact('metal'));*/
            $rateTime = date_format($data[0]['created_at'],"s");

            $info = $this->info;

            return view('admin.rate.index', compact('data', 'breadcrumb','metals', 'rateTime','info'))
                ->with('i', ($request->input('page', 1) - 1) * $page);
        }

        public function create ()
        {
            $page = 20;
            $data = Rate::orderBy('id', 'DESC')->paginate($page);

            $metals = Metal::pluck('name','id')->all();

            $breadcrumb = [
                [
                    'name' => 'Rate',
                    'url' => route('rate.index')
                ],
                [
                    'name' => 'Update'
                ]
            ];
            $info = $this->info;
//            dd($data);
            return view('admin.rate.create', compact('data', 'metals','breadcrumb','info'))->with('i', 0);
        }

        public function store (Request $request, Rate $model)
        {
            $pars = $request->all();

            foreach ($pars as $id => $par) {
                if($id=="_token")
                    continue;
                $history = new RateHistory();
                $history->fill(['rate_id' => $id, 'buy' => $par['buy'], 'sell' => $par['sell']])->save();
                $model->findOrFail($id)->fill(['buy' => 0, 'sell' => 0])->save();
                $model->findOrFail($id)->fill(['buy' => $par['buy'], 'sell' => $par['sell']])->save();
            }



            return redirect()->route('rate.index')
                ->with('success', 'Rate update successfully');
        }


        /**
         * Update the specified resource in storage.
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @param Rate $model
         * @param RateHistory $history
         * @return \Illuminate\Http\Response
         * @throws \Illuminate\Validation\ValidationException
         */
        public function update (Request $request, $id, Rate $model, RateHistory $history)
        {
            $this->validate($request, [
                'buy' => 'required',
                'sell' => 'required'
            ]);


            $history->fill(['rate_id' => $id, 'buy' => $request->get('buy'), 'sell' => $request->get('sell')])->save();


            $model->findOrFail($id)->fill(['buy' => $request->get('buy'), 'sell' => $request->get('sell')])->save();

            return redirect()->route('rate.index')
                ->with('success', 'Rate updated successfully');
        }



        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit ($id)
        {


//            $sub = DB::table('rates')
//                ->orderByDesc('id')
//                ->limit(1844674407370955161);
//
//            //dd($sub);
//
//            $data = DB::table(DB::raw("({$sub->toSql()}) as sub"))
//                ->groupBy('metal_id','purity')
//                ->select('*')->get();

            $rate = Rate::findOrFail($id);

            $metals = Metal::orderBy('id', 'ASC')->pluck('name','id')->all();

            $breadcrumb = [
                [
                    'name' => 'Rate',
                    'url' => route('rate.index')
                ],
                [
                    'name' => 'Edit'
                ]
            ];

            return view('admin.rate.edit', compact(/*'data',*/'metals','rate', 'breadcrumb'));
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show ($id)
        {
            $rate = Rate::find($id);

            $breadcrumb = [
                [
                    'name' => 'Rate',
                    'url' => route('rate.index')
                ],
                [
                    'name' => 'Show'
                ]
            ];

            return view('admin.rate.show', compact('rate', 'breadcrumb'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy ($id)
        {
            Rate::find($id)->delete();
            return redirect()->route('rate.index')
                ->with('success', 'Rate deleted successfully');
        }

        public function actionTime($id){
            $type = 0;
            if($id === '00'){
                $type = 1;
            }
            DB::table('rates')->where('id','>',0)->update(['created_at'=>$type]);
            return redirect('admin/rate');
        }

    }
