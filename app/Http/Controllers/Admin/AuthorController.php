<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Authors\StoreOrUpdateAuthorAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\View\ViewModels\Admin\Authors\CreateViewModel;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::select('id', 'user_id', 'avatar')
            ->with('user:id,email,name')->paginate();
        return view('admin.authors.index', compact('authors'));
    }

    public function create(CreateViewModel $viewModel): View
    {
        return view('admin.authors.create', $viewModel->toArray());
    }


    public function store(StoreAuthorRequest $request)
    {
        $author = StoreOrUpdateAuthorAction::execute($request->validated());

        dd($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
