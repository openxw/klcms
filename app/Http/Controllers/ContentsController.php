<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;

class ContentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$contents = Content::with('user', 'category')->paginate(10);
		return view('contents.index', compact('contents'));
	}

    public function show(Content $content)
    {
        return view('contents.show', compact('content'));
    }

	public function create(Content $content)
	{
		return view('contents.create_and_edit', compact('content'));
	}

	public function store(ContentRequest $request)
	{
		$content = Content::create($request->all());
		return redirect()->route('contents.show', $content->id)->with('message', 'Created successfully.');
	}

	public function edit(Content $content)
	{
        $this->authorize('update', $content);
		return view('contents.create_and_edit', compact('content'));
	}

	public function update(ContentRequest $request, Content $content)
	{
		$this->authorize('update', $content);
		$content->update($request->all());

		return redirect()->route('contents.show', $content->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Content $content)
	{
		$this->authorize('destroy', $content);
		$content->delete();

		return redirect()->route('contents.index')->with('message', 'Deleted successfully.');
	}
}
