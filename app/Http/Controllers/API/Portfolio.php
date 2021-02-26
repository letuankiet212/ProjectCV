<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PortfolioCollection;
use App\Models\Portfolio as PortfolioModel;

class Portfolio extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = PortfolioModel::get();
        return PortfolioCollection::collection($portfolio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        PortfolioModel::create(['img' => 'abc', 'name' => $request->name, 'category' => $request->category, 'domain' => $request->domain, 'company' => $request->company, 'date' => $request->date, 'updated_at' => new \DateTime()]);

        $portfolio = PortfolioModel::get();
        return PortfolioCollection::collection($portfolio);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        PortfolioModel::where('id', $id)->update(['img' => $request->img, 'name' => $request->name, 'category' => $request->category, 'domain' => $request->domain, 'company' => $request->company, 'date' => $request->date, 'updated_at' => new \DateTime()]);
        $portfolio = PortfolioModel::get();
        return PortfolioCollection::collection($portfolio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PortfolioModel::where('id', $id)->delete();
        $portfolio = PortfolioModel::get();
        return PortfolioCollection::collection($portfolio);
    }
}
