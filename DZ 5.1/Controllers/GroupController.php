<?php


class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $data['groups'] = $groups;
        self::CreateView('GroupIndexView', $data);
    }

    public function create()
    {
        $authors = Author::all();
        $data['authors'] = $authors;
        self::CreateView('GroupAddView', $data);
    }


    public function store($request)
    {
        Group::save($request['rid'], $request['grpname'],$request['grpinfo'],$request['grptype'], $request['members']);
        $this->index();
    }

    public function edit($req)
    {
        $authors = Author::all();
        $group = Group::find($req['gid']);
        $data['authors'] = $authors;
        $data['group'] = $group;
        self::CreateView('GroupEditView', $data);
    }


    public function update($request)
    {

        Group::update($request['gid'],$request['rid'], $request['grpname'],$request['grpinfo'],$request['grptype'], $request['members']);

        $this->edit(['gid' => $request['gid']]);
    }

    public function delete($request)
    {
        Group::delete($request['gid']);
        $this->index();
    }
}