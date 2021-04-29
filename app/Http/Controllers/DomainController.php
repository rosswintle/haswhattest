<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('domains.index',
            [
                'domains' => Auth::user()->domains,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $domain = new Domain();
        $domain->domain = $request->input('domain');
        $domain->name = $request->input('name');
        $domain->status = false;
        $domain->user_id = Auth::id();
        $domain->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show( $domainName = "haswhat" )
    {
        $domain = Domain::currentDomain()->firstOrFail();

        return view('domains.show', [ 'domain' => $domain ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }

    public function toggleStatus( $name ) {
        $domain = Domain::currentDomain()->firstOrFail();

        $domain->toggleStatus();

        return redirect()->to( '//' . $domain->domain . '.' . env('APP_DOMAIN') );
    }
}
