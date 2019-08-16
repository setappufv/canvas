<?php

namespace Canvas\Http\Controllers;

use Canvas\Topic;
use Ramsey\Uuid\Uuid;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class TopicController extends Controller
{
    /**
     * Show the topics index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $topics = Topic::orderByDesc('created_at')
            ->withCount('posts')
            ->get();

        return view('canvas::topics.index', compact('topics'));
    }

    /**
     * Show the page to create a new topic.
     *
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function create()
    {
        $topic_id = Uuid::uuid4();

        return view('canvas::topics.create', compact('topic_id'));
    }

    /**
     * Show the page to edit a given topic.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $topic = Topic::findOrFail($id);

        return view('canvas::topics.edit', compact('topic'));
    }

    /**
     * Save a new topic.
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
            'slug' => 'required|'.Rule::unique('canvas_topics', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ], $messages)->validate();

        $topic = new Topic(['id' => request('id')]);
        $topic->fill($data);
        $topic->save();

        return redirect(route('canvas.topic.edit', $topic->id))->with('notify', __('canvas::nav.notify.success'));
    }

    /**
     * Save a given topic.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $id)
    {
        $topic = Topic::findOrFail($id);

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
            'slug' => 'required|'.Rule::unique('canvas_topics', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ], $messages)->validate();

        $topic->fill($data);
        $topic->save();

        return redirect(route('canvas.topic.edit', $topic->id))->with('notify', __('canvas::nav.notify.success'));
    }

    /**
     * Delete a given topic.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);

        $topic->delete();

        return redirect(route('canvas.topic.index'));
    }
}
