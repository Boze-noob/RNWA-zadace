<?php


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $data['posts'] = $posts;
        self::CreateView('PostIndexView', $data);
    }

    public function create()
    {
        $authors = Author::all();
        $data['authors'] = $authors;
        self::CreateView('PostAddView', $data);
    }


    public function store($request)
    {
        Post::save($request['rid'], $request['pcontent']);
        $this->index();
    }

    public function edit($req)
    {
        $authors = Author::all();
        $post = Post::find($req['post_id']);
        $data['authors'] = $authors;
        $data['post'] = $post;
        self::CreateView('PostEditView', $data);
    }


    public function update($request)
    {

        Post::update($request['pid'], $request['rid'], $request['pcontent']);

        $this->edit(['post_id' => $request['pid']]);
    }

    public function delete($request)
    {
        Post::delete($request['post_id']);
        $this->index();
    }
}