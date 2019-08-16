<?php

namespace Canvas\Http\Controllers;

use Canvas\Tag;
use Ramsey\Uuid\Uuid;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class TagController extends Controller
{
    /**
     * Show the tags index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::orderByDesc('created_at')
            ->withCount('posts')
            ->get();

        return view('canvas::tags.index', compact('tags'));
    }

    /**
     * Show the page to create a new tag.
     *
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function create()
    {
        $tag_id = Uuid::uuid4();

        return view('canvas::tags.create', compact('tag_id'));
    }

    /**
     * Show the page to edit a given tag.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);

        return view('canvas::tags.edit', compact('tag'));
    }

    /**
     * Save a new tag.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = [
            'id'   => request('id'),
            'name' => request('name'),
            'slug' => request('slug'),
        ];

        $messages = [
            'required' => __('canvas::validation.required'),
            'unique'   => __('canvas::validation.unique'),
        ];

        validator($data, [
            'name' => 'required',
            'slug' => 'required|'.Rule::unique('canvas_tags', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ], $messages)->validate();

        $tag = new Tag(['id' => request('id')]);
        $tag->fill($data);
        $tag->save();

        return redirect(route('canvas.tag.edit', $tag->id))->with('notify', __('canvas::nav.notify.success'));
    }

    /**
     * Save a given tag.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $id)
    {
        $tag = Tag::findOrFail($id);

        $data = [
            'id'   => request('id'),
            'name' => request('name'),
            'slug' => request('slug'),
        ];

        $messages = [
            'required' => __('canvas::validation.required'),
            'unique'   => __('canvas::validation.unique'),
        ];

        validator($data, [
            'name' => 'required',
            'slug' => 'required|'.Rule::unique('canvas_tags', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ], $messages)->validate();

        $tag->fill($data);
        $tag->save();

        return redirect(route('canvas.tag.edit', $tag->id))->with('notify', __('canvas::nav.notify.success'));
    }

    /**
     * Delete a given tag.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        return redirect(route('canvas.tag.index'));
    }
}
