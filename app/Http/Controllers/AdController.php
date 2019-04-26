<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdRequest;
use Illuminate\Http\Request;

class AdController extends Controller
{

    /**
     * Display the Ad.
     *
     * @param Ad|null $ad
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function show(Ad $ad = null)
    {
        return view('ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the Ad.
     *
     * @param Ad|null $ad
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function edit(Ad $ad = null)
    {
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the Ad in storage.
     *
     * @param AdRequest|Request $request
     * @param Ad $ad
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(AdRequest $request, Ad $ad = null)
    {
        if (empty($ad)) {
            $ad = new Ad;
            $ad->title = $request->title;
            $ad->description = $request->description;
            $ad->user_id = auth()->user()->id;
            $ad->created_at = date('Y-m-d H:i:s');
            $ad->save();
            $request->session()->flash('message', "New ad was created.");
        } else {
            $ad->title = $request->title;
            $ad->description = $request->description;
            $ad->save();
            $request->session()->flash('message', "Ad was edited.");
        }

        return redirect()->route('ad.show', ['ad' => $ad]);
    }

    /**
     * Remove the Ad from storage.
     *
     * @param Ad $ad
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Request $request
     * @internal param int $id
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('index')->with('message', 'Ad was deleted.');
    }
}
